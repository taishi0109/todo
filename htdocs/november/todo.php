
<?php
$FILE = 'data.txt';
$DATA = [];
$BOARD= [];
 
if(file_exists($FILE)) {
    $BOARD = file('data.txt', FILE_IGNORE_NEW_LINES);
}else{
    $FILE = fopen('data.txt', 'w');
    fclose($FILE);
}
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    if(!empty($_POST['txt'])){
        $text = $_POST['txt'];
        $fp = fopen("data.txt", 'a');
        fwrite($fp, $text."\n");
        fclose($fp);
    }
 
    if(isset($_POST['del'])){
        $fp = fopen("data.txt", 'w');
        foreach($BOARD as $key => $NEWBOARD){
            if($key != $_POST['del']){
                fwrite($fp, $NEWBOARD."\n");
            }
        }
        fclose($fp);
    }
    header('Location: '.$_SERVER['SCRIPT_NAME']);
    exit;
}
 
?>
 
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="todo.css">
<html lang= "ja">
 
<body>
 <h1>TODO LIST<h1>
 <p>出来る事から書こう</p>
<table>
<?php foreach($BOARD as $key => $DATA): ?>
<div class="contents">
<tr>
    <td><?php echo $DATA; ?></td>
    <td>
    <form action="" method= "post">
        <input type="hidden" name="del" value="<?php echo $key; ?>">
        <input type="submit" value="削除">
    </form> 
    </td>
</tr>
</div>
<?php endforeach; ?>
</table>
 
<hr>
<form action="" method= "post">
    <input type= "text" name= "txt">
    <input type= "submit" value= "投稿">
</form>    
 
</body>
</html>