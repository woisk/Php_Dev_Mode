<?php
//结构性
//外观模式:可以为复杂的系统提供一个简单、清晰的接口，有利于进行分层，解耦，用于创建封装过程式代码快的对象封装器

class ProductFacade{
	private $products = array();

	public function __constuct($file){
		$this->file = $file;
		$this->compile();
	}

	public function compile(){
		$lines = getProductFileLines( $this->file );
		foreach ($lines as $key => $value) {
			$id = getIDFromLine( $line );
			$name = getNameFromLine( $line );
			$this->products[$id] = getProductObjectFromID( $id,$name );
		}
	}

	public function getProducts(){
		return $this->products;
	}

	public function getProduct($id){
		return $this->products[$id];
	}
}

//一个ProductFacade的模式将一系列操作过程封装到一个对象封装器中
$facade = new ProductFacade('2.txt');
$product = $facade->getProduct(123);

?>