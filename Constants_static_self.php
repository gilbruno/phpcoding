<?php

/**
 * Just a little reminder to show the difference between "static" call and "self" call
 * when you want to overwrite a constant in a child class
 */

 class A {
	const MY_CONST = 'false';

	public function myConstSelf() {
		return self::MY_CONST;
	}
	public function myConstStatic() {
		return static::MY_CONST;
	}
}

class B extends A {
	const MY_CONST = 'true';
}

$b = new B();

$test1 = $b->myConstSelf(); //returns false
$test2 = $b->myConstStatic(); //returns true

echo $test1;
echo PHP_EOL;
echo $test2;
