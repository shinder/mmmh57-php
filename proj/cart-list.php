<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dict

if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
    $rows = $pdo->query($sql)->fetchAll();

    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
    }
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<div class="container">
<div class="row">
    <div class="col">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col">封面</th>
                <th scope="col">書名</th>
                <th scope="col">價格</th>
                <th scope="col">數量</th>
                <th scope="col">小計</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($_SESSION['cart'] as $sid=>$qty):
                $item = $data_ar[$sid];
                ?>
            <tr class="p-item" data-sid="<?= $sid ?>">
                <td><a href="#" onclick="removeProductItem(event)"><i class="fas fa-trash-alt"></i></a></td>
                <td><img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt=""></td>
                <td><?= $item['bookname'] ?></td>
                <td class="price" data-price="<?= $item['price'] ?>"></td>
                <td>
                    <select class="form-control quantity" data-qty="<?= $item['quantity'] ?>" onchange="changeQty(event)">
                        <?php for($i=1; $i<=20; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td class="sub-total"></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="alert alert-primary" role="alert">
           總計: <span id="totalAmount"></span>
        </div>
        <?php if(isset($_SESSION['loginUser'])): ?>
            <a href="save-orders.php" class="btn btn-success">結帳</a>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                請先登入會員再結帳
            </div>
        <?php endif; ?>
    </div>

</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>

const dallorCommas = function(n){
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
};

function removeProductItem(event){
    event.preventDefault(); // 避免 <a> 的連結
    const tr = $(event.target).closest('tr.p-item')
    const sid = tr.attr('data-sid');

    $.get('add-to-cart-api.php', {sid}, function(data){
        tr.remove();
        countCartObj(data);
        calPrices();
    }, 'json');
}

function changeQty(event){
    let qty = $(event.target).val();
    let tr = $(event.target).closest('tr');
    let sid = tr.attr('data-sid');

    $.get('add-to-cart-api.php', {sid, qty}, function(data){
        countCartObj(data);
        calPrices();
    }, 'json');

}

function calPrices() {
    const p_items = $('.p-item');
    let total = 0;
    if(! p_items.length){
        alert('請先將商品加入購物車');
        location.href = 'product-list.php';
        return;
    }

    p_items.each(function(i, el){
        console.log( $(el).attr('data-sid') );
        // let price = parseInt( $(el).find('.price').attr('data-price') );
        // let price = $(el).find('.price').attr('data-price') * 1;

        const $price = $(el).find('.price'); // 價格的 <td>
        $price.text( '$ ' + $price.attr('data-price') );

        const $qty =  $(el).find('.quantity'); // <select> combo box
        // 如果有的話才設定
        if($qty.attr('data-qty')){
            $qty.val( $qty.attr('data-qty') );
        }
        $qty.removeAttr('data-qty'); // 設定完就移除

        const $sub_total = $(el).find('.sub-total');

        $sub_total.text('$ ' + dallorCommas($price.attr('data-price') * $qty.val()));
        total += $price.attr('data-price') * $qty.val();
    });

    $('#totalAmount').text( '$ ' + dallorCommas(total));

}
calPrices();

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>