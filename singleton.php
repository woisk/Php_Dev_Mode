# Design-patterns
<?php
class Singleton{
    private static $instance;
    private function __construct(){

    }

    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function getOut(){
        echo 'i am Singleton';
    }
}


$Singleton = Singleton::getInstance();
echo $Singleton->getOut();

//单例模式中，通过将构造函数私有化，在调用getIntance的时候，生成一个自身的对象赋值给类中静态属性实现。
//单例模式该类通过自身实例化，仅有一个。
?>
