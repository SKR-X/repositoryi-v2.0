<?php
require_once 'regclass.php';
//set your own parameters
$Reg = new Register(array('user' => '', 'pass' => '', 'db' => '', 'charset' => '')); 
$Reg->reg_user();
$Reg->random_str();
echo "<br>"."Сгенерированный пароль: ";
echo $Reg->done_pass;
