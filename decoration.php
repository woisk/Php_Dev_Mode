<?php
//装饰器模式
//对原有的对象的部分内容或功能性内容发生改变，但是不需要修改原来对象的结构
abstract class Tile{
	abstract public function getWeather();
}

class Plain extends Tile{
	private $weatherFactor = 2;
	public function getWeather(){
		return $this->weatherFactor;
	}
}

//装饰器基类
abstract class TileDecorator extends Tile{
	protected $tile;
	public function __construct(Tile $tile){
		$this->tile = $tile;
	}
}

class PlainDecorator extends TileDecorator{
	public function __construct(Tile $tile){
		parent::__construct($tile);
	}

	public function getWeather(){
		return $this->tile->getWeather() + 2;
	}
}

$plain = new PlainDecorator(new Plain());
echo $plain->getWeather();

//当然可以采用继承来以上的实现，但是继承过多的子类来完成这样的需求，防止子类的爆棚式增长

?>