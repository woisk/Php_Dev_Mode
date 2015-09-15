<?php
//模板模式
//结构型：模板模式创建了一个实施一组方法和功能的抽象对象，子类通常将这个对象作为模板用于自己的设计
//针对与超市中商品的销售价格而已，有些需要交税，比如说香烟，有些需要收取额外的加工费
abstract class ItemTemplate{
	public $name;
	public $price = 0;
	//设计为实现子类中特定的功能性方法
	public final function getPrice(){
		$this->price += $this->getTaxation();
		return $this->price;
	}

	abstract public function getTaxation();
}

class Cigarettes extends ItemTemplate{
	public function __construct($name,$price){
		$this->name = $name;
		$this->price = $price;
	}

	public function getTaxation(){
		return round($this->price * 0.1,2);
	}
}

class Watermelon extends ItemTemplate{
	public function __construct($name,$price){
		$this->name = $name;
		$this->price = $price;
	}

	public function getTaxation(){
		return 0;
	}
}


//每个不同的对象实现了对模板的不同实现，并且在外部以相同的方式执行，每个不同的对象以自己的方式实现了这些方法内部的逻辑
//在模板模式中，基类定好了规则
$cigarettes = new Cigarettes('a',2);
echo $cigarettes->getPrice();

?>