<?php
// читать json файл
$json = file_get_contents('../goods.json');
$json = json_decode($json, true);

//письмо
$message = '';
$message .= '<h1>Ваш товар хотят купить!</h1>';

$cart = $_POST['cart'];
$sum = 0;
foreach ($cart as $id=>$count) {
    $message .=$json[$id]['name'].' (';
    $message .=$count*$json[$id]['cost'];
    $message .=' руб)';
}

$message .='<p>Покупатель: '.$_POST['ename'].'</p>';
$message .='<p>Телефон: '.$_POST['ephone'].'</p>';
$message .='<p>Почта: '.$_POST['email'].'</p>';
$message .='<p>Комментарий: '.$_POST['ecomment'].'</p>';

//print_r($message);

$to = 'sergievichdima123@gmail.com'.','; //не забудь поменять!
$to .=$_POST['email'];
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ', $spectext.$message.'</body></html>', $headers);

if ($m) {echo 1;} else {echo 0;}

