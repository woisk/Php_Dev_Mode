<?php
//结构型
//组合模式:将对象组合成树形结构，“部分-整体”的层次结构，用户可以统一使用组合结构中的所有对象
interface Component{
	//返回自己的实例
	public function getComposite();
	//示例方法
	public function operation();
}


//树枝组件
class Composite implements Component{
	protected $composites = array();

	public function add(Component $c){
		array_push($this->composites, $c);
	}

	public function remove(Component $c){
		if(is_array($this->composites) && !empty($this->composites)){
			foreach ($this->composites as $key => $value) {
				if($value === $c){
					unset($this->composites[$key]);
				}
			}
		}
	}

	//返回自己的实例
	public function getComposite(){
		return $this;
	}

	//示例方法
	public function operation(){
		echo 'Composite begin';
		if(is_array($this->composites) && !empty($this->composites)){
			foreach ($this->composites as $key => $value) {
				$value->operation();
			}
		}
		echo 'Composite end||';
	}

	public function getChilds(){
		return $this->composites;
	}
}

//树叶组件
class Leaf implements Component{
	private $name;
	public function __construct($name){
		$this->name = $name;
	}

	public function getComposite(){
		return $this;
	}

	public function operation(){
		echo $this->name;
	}
}

$leafA = new Leaf('leafA');
$leafB = new Leaf('leafB');
$Composite = new Composite();
$Composite->add($leafA);
$Composite->add($leafB);
$Composite->operation();
$Composite->remove($leafB);
$Composite->operation();
?>