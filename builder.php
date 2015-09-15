<?php
//建造者模式定义了处理其他对象的复杂构建的对象设计
//应用环境：当创建一个对象的构造有一定的复杂性，在某个对象的构造和配置方法改变时候可以尽可能的减少重复更改代码
class product{
	protected $_type = '';
	protected $_size = '';
	protected $_color = '';

	public function setType($type){
		$this->_type = $type;
	}

	public function setSize($size){
		$this->_size = $size;
	}

	public function setColor($color){
		$this->_color = $color;
	}
}

class ProductBulider{
	protected $product;
	protected $config;

	public function __construct($config){
		$this->product = new product();
		$this->config = $config;
	}

	public function build(){
		$this->product->setType($this->config['type']);
		$this->product->setSize($this->config['size']);
		$this->product->setColor($this->config['color']);
	}

	public function getInstance(){
		return $this->product;
	}
}

?>