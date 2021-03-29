<?php

require_once './vendor/autoload.php';


interface i {
    function func();
    function getFromClass();
}

abstract class A implements i{
    function func() {
        echo $this->getFromClass();
    }
}

class B extends A {
    public function func()
    {
        parent::func();
    }

    public function getFromClass()
    {
        return "B";
    }
}

(new B())->func();
