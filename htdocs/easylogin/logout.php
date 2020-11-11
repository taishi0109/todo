<?php

session_start();

$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <style>
        .container {
            width: 100%;
            text-alogn: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>ログアウトしました</p>
        <p><a href="content.php">戻る</p>
    </div>
</body>
</html>