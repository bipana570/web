<?php
namespace aitsydney;
class Database{
    protected $connection;
    protected function _construct(){
        $this -> connection = mysqli_connect('localhost','website','password','data2');
    }
}
?>