<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list2';

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    tbody tr i.fa-trash-alt {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--
                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page="></a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                    -->
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody class="data-tbody">
                <!--
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
/*
    運作的流程 steps
    1. 取得資料 (包成 function
    2. 生頁碼列的按鈕
    3. 生資料表格

 */
const pagination = $('.pagination'),
    tbody = $('.data-tbody')


const paginationTpl = o=>{
    // {active:true, page:2}
    return `
        <li class="page-item ${o.active ? 'active' : ''}">
            <a class="page-link" href="javascript:getDataByPage(${o.page})">${o.page}</a>
        </li>
    `;
};

function getDataByPage(page=1){
    $.get('data-list2-api.php', {page:page}, function(data){
        console.log(data);
        let pStr = '';
        for(let i=1; i<=data.totalPages; i++){
            pStr += paginationTpl({
                active: page===i,
                page: i
            })
        }
        pagination.html(pStr);

    }, 'json');
}

getDataByPage();

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>