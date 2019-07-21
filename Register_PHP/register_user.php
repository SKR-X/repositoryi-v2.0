<?php
require_once 'regclass.php';
//set your parameters
$Reg = new Register(array('user' => '', 'pass' => '', 'db' => '', 'charset' => ''));
$Reg->random_str(); 
echo "Сгенерированный пароль: ";
echo $Reg->done_pass;
echo "<br>";
$Reg->check_user();
$Reg->reg_user();
