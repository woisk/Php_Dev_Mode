<?php
//备忘录模式
//行为型：备忘录模式是一种行为型模式，它在不破坏封装性的前提下，捕获一个对象的内部状态，并且将该对象之外保存这个状态，这样就可以让该对象回复到之前的状态
//发起人
class Promoter{
	private $_state;
	public function __construct($state){
		$this->_state = $state;
	}

	public function createMemento(){
		$memento = new Memento();
		$memento->setState($this->_state);
		return $memento;
	}

	public function restoreMemento(Memento $memento){
		$this->_state = $memento->getState();
	}

	public function getState(){
		return $this->_state;
	}

	public function setState($state){
		$this->_state = $state;
	}

}

//备忘录
class Memento{
	private $_state;
	public function getState(){
		return $this->_state;
	}

	public function setState($state){
		$this->_state = $state;
	}
}

//负责人
class Head{
	private $_memento;
	public function setMemento($memento){
		$this->_memento = $memento;
	}

	public function getMemento(){
		return $this->_memento;
	}
}

$promoter = new Promoter('i am zhuji');
echo $promoter->getState();
echo "<br/>";
$promoter->setState('I am hangzhou');
echo $promoter->getState();
echo "<br/>";

$head = new Head();
$head->setMemento($promoter->createMemento());

$promoter->setState('I am shanghai');
echo $promoter->getState();
echo "<br/>";
$promoter->restoreMemento($head->getMemento());
echo $promoter->getState();
echo "<br/>";


?>