<?php
require_once 'regclass.php';
$Reg = new Register(array('user' => 'root', 'pass' => '', 'db' => 'spec_db', 'charset' => 'utf8'));
$Reg->random_str(); 
echo "Сгенерированный пароль: ";
echo $Reg->done_pass;
echo "<br>";
$Reg->check_user();
$Reg->reg_user();