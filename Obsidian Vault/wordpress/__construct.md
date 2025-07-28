

The `__construct` function is automatically called when a new instance of the class is initialized using the `new $class´ keyword.


If both the parent and child class have a `__construct()` function, make sure to call the parent construct inside the child contstruct. 

```
class Parent
{
	public $TestVar
	function __contruct(){
		$this->ThisVar = 'Test';
	}
}

class Child extends Parent
{
	function __construct() {
		Parent::__construct();
	}
}

```