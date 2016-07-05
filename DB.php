<?php

/**
 * @author Wojciech Brüggemann <wojtek77@o2.pl>
 */
class DB extends mysqli
{
    public function __construct()
    {
        parent::__construct('localhost', 'root', '', 'test');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }
    
    public function __destruct()
    {
        if (!mysqli_connect_errno()) {
            $this->close();
        }
    }
}
