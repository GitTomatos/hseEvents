<?php

use HseEvents\Model\Student;

////chdir('/srv/www/hse_events');
//echo getcwd ();
//include '../config/config.php';
//include '../bootstrap.php';

include __DIR__ . '/../config/config.php';
include __DIR__ . '/../bootstrap.php';
//
//
////
dump(Student::findBy(["email"=>"log"]));



//class A {
//    public static function foo() {
//        static::who();
//    }
//
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//
//class B extends A {
//    public static function test() {
//        A::foo();
//        parent::foo();
//        self::foo();
//    }
//
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//class C extends B {
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//
//C::test();