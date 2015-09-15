<?php
//结构型
//桥梁模式，减少抽象与实现的耦合，可以提高可扩充性

//抽象化角色，保存一个对其他对象积累的一个聚合，抽象类做一个桥梁的作用，夹在子类实例化与聚合类的中间
abstract class road{
	protected $car;

	public function operation(){
		$this->car->run();
	}
}

abstract class car{
	abstract public function run();
}

class LandRover extends car{
	public function run(){
		echo 'LandRover run';
	}

	public function name(){
		echo 'LandRover name';
	}
}

class Jaguar extends car{
	public function run(){
		echo 'Jaguar run';
	}

	public function name(){
		echo 'Jaguar name';
	}
}

//扩展抽象化角色，改变和修正父类对抽象化的定义
class highroad extends road{
	public function __construct($car){
		$this->car = $car;
	}

	public function operation(){
		echo "highroad\n";
		echo $this->car->run();
	}
}

$road = new highroad(new Jaguar());
echo $road->operation();

?>