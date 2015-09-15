<?php
//观察者模式
//行为型模式：能够便利的查看目标对象状态的对象，并且提供与核心对象非耦合的指定功能性
//可观察类,一个CD站点首页CD的最近出售情况，在CD被出售的情况下去发出指令去更新CD最近出售情况
class CD{
	public $title = '';
	public $band = '';
	private $_observers = array();

	public function __construct($title,$band){
		$this->title = $title;
		$this->band = $band;
	}

	public function addObserver($type,$observer){
		array_push($this->_observers[$type],$observer);
	}

	public function notifyObserver($type){
		if(isset($this->_observers[$type])){
			if(is_array($this->_observers) && !empty($this->_observers)){
				foreach ($this->_observers as $key => $value) {
					$value->update($this);
				}
			}
		}
	}

	public function buy(){
		$this->notifyObserver('purchased');
	}
}

class buyCDNotifyStreamObserver{
	public function update(CD $cd){
		echo $this->title.'_'.$this->band.'_'.'is_already_purchased'.'剩余xxx张';
	}
}

//当CD被购买的时候，通知用户已买还剩余多少张
//当一个类的核心属性创建时候，如果存在可观察状态的变化，最佳的做法是基于观察者模式创建与目标对象交互的其他类
?>