<?php
try{
    $pdo = new
PDO('mysql:host=localhost;dbname=AJAX_PHP;charset=utf8',
'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $e) {
    echo $e->getMessage();
}
?>