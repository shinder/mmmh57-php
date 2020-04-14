<?php
require __DIR__ . '/__connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';


//echo "$page, $keyword";
//exit;

if(empty($keyword)){
// 取得總筆數
    $totalRows = $pdo->query("SELECT COUNT(1) FROM `address_book`")
        ->fetch(PDO::FETCH_NUM)[0];

// 算總頁數
    $totalPages = ceil($totalRows / $perPage);

    ($page<1) ? ($page=1) : false;
    ($page>$totalPages) ? ($page=$totalPages) : false;

    $sql = sprintf("SELECT * FROM `address_book` ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $stmt = $pdo->query($sql);
} else {
// 取得總筆數

    $k = $pdo->quote("%${keyword}%"); // 跳脫

//    echo "SELECT COUNT(1) FROM `address_book` WHERE `name` LIKE $k ";
//    exit;

    $totalRows = $pdo->query("SELECT COUNT(1) FROM `address_book` WHERE `name` LIKE $k ")
        ->fetch(PDO::FETCH_NUM)[0];

// 算總頁數
    $totalPages = ceil($totalRows / $perPage);

    ($page<1) ? ($page=1) : false;
    ($page>$totalPages) ? ($page=$totalPages) : false;

    $sql = "SELECT * FROM `address_book`  WHERE `name` LIKE $k ORDER BY `sid` DESC LIMIT ".($page - 1) * $perPage. "," .$perPage;

    $stmt = $pdo->query($sql);
}




$output = [
    'page' => $page,
    'perPage' => $perPage,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $stmt->fetchAll(),
];
header('Content-Type: application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
