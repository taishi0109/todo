<?php

require_once './login.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>簡単なログインフォームを作成したい</title>
    <style>
        .container {
            width: 100%;
            text-align: center;
        }
    </style>
</haed>
<body>
    <div>
        <p><?php echo h($_SESSION['username']); ?>さんいらっしゃい</p>    
        <p>ログインした方のみ閲覧出来ます！</p>
        <p><a href="logout.php">ログアウトする</p>
    </div>
</body>
</html>