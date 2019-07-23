<?php
require_once 'regclass.php';
//set your own parameters
$Reg = new Register(array('user' => '', 'pass' => '', 'db' => '', 'charset' => ''));
$Reg->random_str(); 
echo "Сгенерированный пароль: ";
echo $Reg->done_pass;
echo "<br>";
$Reg->reg_user();
