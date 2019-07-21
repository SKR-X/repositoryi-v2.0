<?php
//https://github.com/colshrapnel/safemysql/blob/master/safemysql.class.php
require_once "../../github/safemysql.php";
class Register extends SafeMySql {
    //введите таблицу с пользователями
    private $table = " ";
    public $done_pass;
    private $length=15;
    private $keyspace='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private $pieces;
    private $i;
    private $max;
    public $in = array();
    function __construct($options = array()) {
        SafeMySql::__construct($options);
        $this->in = array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'fio' => $_POST['fio'],
            'country' => $_POST['country'],
            'region' => $_POST['region'],
            'city' => $_POST['city'],
            'password' => ""
        );
    }
    public function check_user(){
        if(empty($this->getAll("SELECT * FROM $this->table WHERE username = ?s OR email = ?s",
        $this->in['username'],$this->in['email']))){
        echo "all is ok.";
    }else{
        echo "This account already exists!";
        exit();
        }
    }
    public function reg_user(){
        $this->in['password'] = $this->done_pass;
        if ($this->query("INSERT INTO $this->table SET ?u", $this->in)){
            echo "success!";
          } else {
            echo "error, could not insert to db!";
          }  
    }
    public function random_str()
    {
        $this->pieces = [];
        $this->max = mb_strlen($this->keyspace, '8bit') - 1;
        for ($this->i = 0; $this->i < $this->length; $this->i=$this->i+1) {
            $this->pieces []= $this->keyspace[random_int(0, $this->max)];
        }
        $this->done_pass = implode('', $this->pieces);
    }
}   
?>
