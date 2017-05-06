<?php
class MySQLDatabase{
    var $link;
    function connect(){
//        $this->link = mysqli_connect('infs3202-c25wl.uqcloud.net', 'travnow', '5BSdoEzBmHYLsStS');
//        if(!$this->link){
//            die('Not connected: ' . $this->link->error);
//        }
//        $db = mysqli_select_db($this->link, 'travnow');
//        if(!$db){
//            die('Cannot use: ' . $this->link->error);
//        }
        $this->link = new mysqli('infs3202-c25wl.uqcloud.net', 'travnow', '5BSdoEzBmHYLsStS', 'travnow');
        if ($this->link->connect_error) {
            die('Connect Error (' . $this->link->connect_errno . ') '
                . $this->link->connect_error);
        }
        return $this->link;
    }
    function disconnect(){
        mysqli_close($this->link);
    }


}
?>
