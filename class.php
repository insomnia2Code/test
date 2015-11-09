<?php
class father{

    function __construct(){

        $this->test();
    }

    function test(){
        echo 2;
    }

}

class son extends father{
    function __construct(){
        parent::__construct();
    }

    function test(){
        echo 1;
    }
}


$a = new son();