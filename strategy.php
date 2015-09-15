<?php
//策略模式，帮助构建的对象不必自身包含逻辑，而是能够根据需要利用其他对象中的算法
class CD{
	public $_title;
	public $_band;
	protected $_strategy;
	public function __construct($title,$band){
		$this->_title = $title;
		$this->_band = $band;
	}

	public function setStrategy($strategy){
		$this->_strategy = $strategy;
	}

	public function get(){
		$this->_strategy->get($this);
	}
}

interface strategy{
	public function get(CD $cd);
}

class BuyStrategy implements strategy{
	public function get(CD $cd){
		echo $cd->_title.'Buy';
	}	
}

class SellStrategy implements strategy{
	public function get(CD $cd){
		echo $cd->_title.'Sell';
	}
}

$cd = new CD('aaa','xxx');
$cd->setStrategy(new BuyStrategy());
$cd->get();

//此结构中CD类不包含逻辑，调用buyStrategy对象来实现需求
?>