<?php
//中介者模式
//处理具有类似属性并且属性需要保持同步的非耦合对象时，最佳的做法是基于中介者模式的对象

class CD{
	public $name;
	protected $_mediator;
	public function __construct($mediator = null){
		$this->_mediator = $mediator;
	}

	public function save(){
		echo 'cd<br/>';
		var_dump($this);
	}

	public function setName($newName){
		echo 'cd setname<br/>';
		if(!is_null($this->_mediator)){
			$this->_mediator->changName($this,array('name' => $newName));
		}
		die;
		$this->name = $newName;
		$this->save();
	}
}

class MP3Archive{	
	public $name;
	protected $_mediator;
	public function __construct($mediator = null){
		$this->_mediator = $mediator;
	}

	public function save(){
		var_dump($this);
	}

	public function setName($newName){
		if(!is_null($this->_mediator)){
			$this->_mediator->changName($this,array('name' => $newName));
		}
		$this->name = $newName;
		$this->save();
	}
}

class Mediator{
	protected $_container = array();
	public function __construct(){
		$this->_container[] = 'MP3Archive';
		$this->_container[] = 'CD';
	}

	public function changName($object,$array){
		echo 'Mediator';
		if(empty($this->_container)){
			return false;
		}
		$name = $object->name;
		foreach ($this->_container as $key => $value) {
			if(!($object instanceof $value)){
				$newobject = new $value;
				foreach($array as  $k => $v){
					$newobject->$k = $v;
				}
				$newobject->save();
			}
		}
	}
}


$name = 'first';
$cd = new CD(new Mediator());
$cd->setName($name);

?>