<?php
//状态模式
//行为型：允许一个对象在内部状态改变时改变它的行为，状态模式的变化位置在于其状态
interface State{
	public function handle(Context $context);
}

class StateA implements State{
	private static $_instance = null;
	private function __construct(){

	}
	static public function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new StateA();
		}
		return self::$_instance;
	}
	public function handle(Context $context){
		$context->setHandle(StateB::getInstance());
	}
}

class StateB implements State{
	private static $_instance = null;
	private function __construct(){

	}
	static public function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new StateB();
		}
		return self::$_instance;
	}
	public function handle(Context $context){
		$context->setHandle(StateA::getInstance());
	}
}

class Context{
	public $state;
	public function __construct($state){
		$this->state = $state;
	}

	public function setHandle($state){
		$this->state = $state;
	}

	public function request(){
		$this->state->handle($this);
	}
}


$context = new Context(StateA::getInstance());
var_dump($context);
$context->request();
var_dump($context);

?>