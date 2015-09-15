<?php
//抽象商品

abstract class CD{
	public $title;
	abstract public function detail();
	abstract public function sing();
}

//具体标准商品
class standardCD extends CD{
	public function detail(){
		echo 'standardCDDetail';
	}

	public function sing(){
		echo 'standradCDSing';
	}
}

//加强版商品
class enhancedCD extends CD{
	public function detail(){
		echo 'enhancedCDDetail';
	}

	public function sing(){
		echo 'enhancedCDSing';
	}
}


//抽象工厂
interface factory{
	static public function createObject($type);
}

//实际工厂
class ModifyFactory implements factory{
	static public function createObject($type){
		$className = $type."CD";
		return new $className;
	}
}

$product = ModifyFactory::createObject('standard');
echo $product->detail();
echo $product->sing();

//工厂类中实例化对象非常方便，如果实例化的对象有所改变，不用去修改之前的代码逻辑，只需要在实例化对象时，修改new的对象即可

?>