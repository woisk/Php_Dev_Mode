<?php
//结构型
//享元模式：减少大量细粒对象的产生
class human{
	private $car;
	private $house;

	public function setCar($car){
		$this->car = $car;
	}

	public function setHouse($house){
		$this->house = $house;
	}

	public function getCar(){
		return $this->car;
	}

	public function getHouse(){
		return $this->house;
	}
}

class car{
	protected $name;
	public function __construct($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}
}

class carFactory{
	protected $carList = array();
	public function getCar($name){
		if(isset($this->carList[$name])){
			return $this->carList[$name];
		}else{
			array_push($this->carList,new car($name));
			return $this->carList[$name];
		}
	}
}

$carfactory = new carFactory();
$humanone = new human();
$humanone->setCar($carfactory->getCar('Land Rover'));
$humantwo = new human();
$humantwo->setCar($carfactory->getCar('jili'));
$humanthree = new human();
$humanthree->setCar($carfactory->getCar('jili'));


//享元模式在carFactory中build了多个car的对象，在car工厂中多次引用build好的对象，减少了大量细粒对象的产生
?>