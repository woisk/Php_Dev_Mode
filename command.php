<?php
//命令模式
//行为型：将一个请求封装成一个对象，将命令的发送者和命令的执行者分离开来，委派给不同的对象
//请求的一方发出请求，执行一个操作，接收的一方收到请求，并执行操作，命令模式将请求的一方和接收的一方分离开来，请求的一方不知道接收方怎么操作，更加不知道请求是怎么被接收，执行
interface Command{
	public function execute(); // 执行方法
}	

class ConcreteCommand implements Command{
	private $_receiver;
	public function __construct($receiver){
		$this->_receiver = $receiver;
	}

	public function execute(){
		$this->_receiver->action();
	}
}

class Invoker{
	private $_command;
	public function __construct($command){
		$this->_command = $command;
	}

	public function request(){
		$this->_command->execute();
	}
}

class Receiver{
	private $_name;
	public function __construct($name){
		$this->_name = $name;
	}

	public function action(){
		echo $this->_name;
	}
}


$receiver = new Receiver('xxxx');
$command = new ConcreteCommand($receiver);
$invoker = new Invoker($command);
$invoker->request();

?>