<?php
//抽象工厂模式：为创建一组相关或相互依赖的对象提供一个接口，可以创建多个产品的对象

//抽象蔬菜类
abstract class vegetables{
	abstract function sow();
	abstract function grow();
	abstract function fruit();
}


//根菜蔬菜
class rootvegetables extends vegetables{
	public function sow(){
		echo 'sowrootvegetables';
	}

	public function grow(){
		echo 'growrootvegetables';
	}

	public function fruit(){
		echo 'fruitrootvegetables';
	}
}

//茎菜蔬菜
class stemvegetables extends vegetables{
	public function sow(){
		echo 'stemsowvegetables';
	}

	public function grow(){
		echo 'growstemvegetables';
	}

	public function fruit(){
		echo 'fruitstemvegetables';
	}	
}

//抽象工厂
abstract class factory{
	abstract public function createRootObject();
	abstract public function createStemObject(); 
}


class TransgeneFactory extends factory{
	public function createRootObject(){
		return new rootvegetables();
	}

	public function createStemObject(){
		return new stemsowvegetables();
	}
}



?>