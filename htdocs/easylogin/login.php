<?php

require_once 'h.php';

header('X-FRAME-OPTIONS: SAMEORIGIN');

session_start();

$userid[] = 'admin';
$username[] = '管理者';


$hash[] = '$2y$10$MeurUlzg8gzCHKYkDMrz/.9/3eq2qxI.GyBFy65F8BFym2/YS67dq';


$userid[] = 'test';
$username[] = 'テスト';


$hash[] = '$2y$10$Jb/beQEUPERIYRyzsZUcT.9U9qsLqQLOXQXaKJrjlIQwRreTkKns6';


$error = '';


if(isset($_SESSION['auth'])){
    $_SESSION['auth'] = false;
}

if(isset($_POST['userid']) && isset($_POST['password'])) {
    foreach ($userid as $key => $value) {
        if($_POST['userid'] === $userid['key'] &&
        password_verify($_POST['password'], $hash[$key])){

            session_regenerate_id(true);
            $_SESSION['username'] = $username[$key];
        }
    }


if ($_SESSION['auth'] === false) {
    $error = 'ユーザーidかパスワードに誤りがあります';
    }
}

if($_SESSION['auth'] !== true){
    ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>簡単なログインフォームを作成</title>
    <style>
        .container {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="login">
            <h1>認証フォーム</h1>
            <?php
            if($error) {
                echo '<p style="color:red;">'.h($error).'</p>';

            }
            ?>

            <form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
                <dl>
                    <dt><label for="userid">ユーザーID:</label></dt>
                    <dd><input type="text" name="userid" value=""></dd>
                </dl>
                <dl>
                    <dt><label for="password">パスワード</label></dt>
                    <dd><input type="password" name="password" id="password" value=""></dd>
                </dl>
                <input type="submit" name="submit" value="ログイン">
            </form>
        </div>
    </div>
</body>          
</html>
<?php
exit();      
       
}

