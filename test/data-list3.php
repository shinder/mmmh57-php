<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list3';

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
            <form class="form-inline my-2 my-lg-0" onsubmit="return false;">
                <input id="searchInput" onkeyup="goPage(1)"
                        class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<!--
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="goPage(1)">Search</button>
                -->
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
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
            <a class="page-link" href="javascript:goPage(${o.page})">${o.page}</a>
        </li>
    `;
};
const escapeTag = str=>{
  return str
      .split('&').join('&amp;')
      .split('<').join('&lt;')
      .split('>').join('&gt;');
};

const itemTpl = o => {
    return `
    <tr>
        <td>${o.sid}</td>
        <td>${escapeTag(o.name)}</td>
        <td>${escapeTag(o.mobile)}</td>
        <td>${escapeTag(o.email)}</td>
        <td>${escapeTag(o.birthday)}</td>
        <td>${escapeTag(o.address)}</td>
    </tr>
    `;

};

function getDataByPage(page=1, keyword=''){
    $.get('data-list3-api.php', {page:page, keyword:keyword}, function(data){
        console.log(data);
        // 頁碼 ---
        let pStr = '';
        for(let i=1; i<=data.totalPages; i++){
            pStr += paginationTpl({
                active: page===i,
                page: i
            })
        }
        pagination.html(pStr);

        // 資料表格 ---
        let tStr = '';
        for(let i=0; i<data.rows.length; i++){
            let item = data.rows[i];
            tStr += itemTpl(item);
        }
        tbody.html(tStr);

    }, 'json');
}

function whenHashChange(){
    let hashStr = location.hash.slice(1); // 去掉 #
    console.log('hashStr:', hashStr);
    console.log('hashStr2:', decodeURIComponent(hashStr));
    hashStr = decodeURIComponent(hashStr); // url decode
    let obj = {};

    try{
        obj = JSON.parse(hashStr);
    } catch(ex){
        console.log(ex);
    }
    console.log('obj:', obj);
    let page = obj.page;
    const keyword = obj.keyword;

    // 由 hash 設定到搜尋欄
    if(keyword !== $('#searchInput').val()){
        $('#searchInput').val(keyword);
	}

    if(page){
        getDataByPage(page, keyword);
    } else {
        getDataByPage(1, keyword);
    }
}

window.addEventListener('hashchange', whenHashChange);

whenHashChange();

function goPage(page=1){
    location.href = '#' + JSON.stringify({
        page: page,
        keyword: $('#searchInput').val()
    });
}
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>