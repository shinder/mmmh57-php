<?php
$uploads = __DIR__. '/uploads/';

print_r($_FILES['myfiles']);

// 搬移檔案
move_uploaded_file($_FILES['myfiles']['tmp_name'], $uploads. $_FILES['myfiles']['name']);
