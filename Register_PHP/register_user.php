<?php
require_once 'regclass.php';
//set your own parameters
$Reg = new Register(array('user' => '', 'pass' => '', 'db' => '', 'charset' => ''));
$Reg->random_str(); 
$Reg->reg_user();
echo "<br>"."Сгенерированный пароль: ";
echo $Reg->done_pass;
