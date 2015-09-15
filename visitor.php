<?php
//访问者模式
//行为型：访问者表示一个作用于某对象结构中各元素的操作，它可以在不修改各元素类的情况下，定义作用于这些元素的新操作，即动态的添加访问者角色
interface visitor{
	public function visitConcreteElementA(ConcreteElementA $concreteElementA);
	public function visitConcreteElementB(ConcreteElementB $concreteElementB);
}

interface Element{
	public function accept(visitor $visitor);
}

class ConcreteElementA implements Element{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function accept(visitor $visitor){
		$visitor->visitConcreteElementA($this);
	}
}

class ConcreteElementB implements Element{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function accept(visitor $visitor){
		$visitor->visitConcreteElementB($this);
	}
}

class visitorA implements visitor{
	public function visitConcreteElementA(ConcreteElementA $concreteElementA){
		echo '1';
	}

	public function visitConcreteElementB(ConcreteElementB $concreteElementB){
		echo '2';
	}	
}

class visitorB implements visitor{
	public function visitConcreteElementA(ConcreteElementA $concreteElementA){
		echo '3';
	}
	public function visitConcreteElementB(ConcreteElementB $concreteElementB){
		echo '4';
	}
}

class ObjectStructure{
	private $_elements = array();
	public function __construct(){

	}

	public function attach($element){
		array_push($this->_elements,$element);
	}

	public function detach($element){
		$index = array_search($element, $this->_elements);
		if(false !== $index){
			unset($this->_elements[$index]);
			return true;
		}
		return false;
	}

	public function accept($visitor){
		foreach ($this->_elements as $key => $value) {
			$value->accept($visitor);
		}
	}
}

$structure = new ObjectStructure();
$concreteElementA = new ConcreteElementA('A');
$concreteElementB = new ConcreteElementB('B');
$concreteElementB2 = new ConcreteElementB('B2');

$visitorA = new visitorA();
$visitorB = new visitorB();

$structure->attach($concreteElementA);
$structure->attach($concreteElementB);
$structure->attach($concreteElementB2);
$structure->detach($concreteElementB2);

$structure->accept($visitorA);
$structure->accept($visitorB);
 
?>