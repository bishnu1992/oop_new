<?php
abstract class a
{

	protected abstract function af1();
}
interface i
{
	public function if1();
}
interface i2
{
	public function if1();
}
class y
{
	protected static $var = 'parent var';
	public function f1()
	{
		return static::$var;
	}	
}
class x extends y 
{
	protected static $var = 'child var';
	public function f1()
	{
		return static::$var;
	}	
	
}
class z extends x 
{
	protected static $var = 'grand child var';
	use test;
}
trait test
{
	public function f1()
	{
		echo 'trait function';
	}
	public function f2()
	{
		echo 'trait function two';
	}

}
trait test2
{
	public function f1()
	{
		echo 'trait2 function';
	}
}
trait test3
{
	private function f1()
	{
		echo 'trait3 function';
	}
	public function f3()
	{
		return $this->f1();
	}
}
class m
{
	use test,test2,test3{
		test3::f1 insteadof test2,test;
		// test3::f1 as public f3;
	}
}
class n
{
	public function f1()
	{
		echo 'f1';
		return $this;
	}
	public function f2()
	{
		echo 'f2';
		return $this;
	}
}
$class = new n;
$class->f1()->f2();
