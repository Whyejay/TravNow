<?php

class MySQLDatabase
{
    private $host = 'infs3202-c25wl.zones.eait.uq.edu.au';
    private $db_username = 'travnow';
    private $db_password = 'KhoaUQ95';
    private $db_name = 'travnow';
    var $link;

    function connect()
    {
        $this->link = new mysqli($this->host, $this->db_username, $this->db_password, $this->db_name);
        if ($this->link->connect_error) {
            die('Connect Error (' . $this->link->connect_errno . ') '
                . $this->link->connect_error);
        }
        return $this->link;
    }

    function disconnect()
    {
        mysqli_close($this->link);
    }


}

?>
