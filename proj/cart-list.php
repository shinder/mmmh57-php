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
                <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                <td><img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt=""></td>
                <td><?= $item['bookname'] ?></td>
                <td class="price" data-price="<?= $item['price'] ?>"></td>
                <td>
                    <select class="form-control quantity" data-qty="<?= $item['quantity'] ?>">
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
    </div>

</div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
function changeQty(event){
    let qty = $(event.target).val();
    let tr = $(event.target).closest('tr');
    let sid = tr.attr('data-sid');
    let price = tr.find('.price').text();

    console.log({sid, qty, price});
    $.get('add-to-cart-api.php', {sid, qty}, function(data){
        tr.find('.sub-total').text(price*qty);

        countCartObj(data);
    }, 'json');

}

function calPrices() {
    const p_items = $('.p-item');
    p_items.each(function(i, el){
        console.log( $(this).attr('data-sid') );


    })



}
calPrices();

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>