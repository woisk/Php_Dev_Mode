<?php
//责任链模式
//行为型模式：设定责任链，如果当前对象能够获取知道是否能够完成任务，如果能够完成任务则完成，不能完成任务则到下一个对象来完成任务
abstract class Responsibility{
	public $next;

	public function setNexter(Responsibility $responsibility){
		$this->next = $responsibility;
		return $this->next;
	}

	abstract public function operate();
}

class ResponsibilityA extends Responsibility{
	public function operate(){
		if(!is_null($this->next)){
			$this->next->operate();
		}
	}
}

class ResponsibilityB extends Responsibility{
	public function operate(){
		echo 'ResponsibilityB';
	}
}

$responsibilityA = new ResponsibilityA();
$responsibilityB = new ResponsibilityB();
$responsibilityA->setNexter($responsibilityB);
$responsibilityA->operate();
 
?>