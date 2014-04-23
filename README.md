PHP-SOMCA
=========

Work In progress.
---------

~~Improved~~ (I believe it's just a flavor) syntax for PHPs Object's Multiple Chained Actions (Ruby style)

This is part of a library for my personal micro-framework/template https://github.com/ElPepe101/Template so I'm trying to support both the most time I can... though I think It's pretty cool, dunno if It's really functional to anyone.

Intended to use with all the PHP internal functions for any (or respective) data type; I haven't had the time to improve the method, test performance or testing all PHP functions (It's really annoying the lack of consistency on the position syntax of params around all the functions, I'm trying to make it more simple to workaround)

I prefer to use it within a class to set any inexistents properties.

a Registry Class example:

```PHP
use \PPMFWK
... 
public function __set($varName, $value) {
   $this->_Registry->$varName = new libraries\ObjectApply($value);
...
}
```
Instance of the Registry class example:

```PHP
// Instead of doing this:
$foo = 'var';                                     // set a value
is_string($foo);                                  // check if is a string
echo $foo;                                        // get the value (will echo 'var')
$enc_val = sha1($foo);                            // encrypt the value & save it
echo $foo;                                        // again, get the value (will echo 'var')
echo $enc_val;                                    // get the encrypted value (will echo something XD)
$foo = 10;                                        // changed the data type and value
echo $twice_enc_val = sha1(sha1($foo));           // will echo the twice encrypted value of 10
$foo_arr = array();                               // this is just an array
// //////////////////////////////////
// You can do this (It's equivalent):
$foo = new Registry();
$foo->inexistent_property = 'var';                // set a value
$foo->inexistent_property->is_string();           // check if is a string
echo $foo->inexistent_property->value();          // get the value (will echo 'var')
$foo->sha1();                                     // encrypt the value & save it
echo $foo->inexistent_property->value();          // again, it gets the original value (echo 'var')
echo $foo->inexistent_property->sha1()->value();  // get the encrypted value
$foo->inexistent_property = 10;                   // changed the data type and value
echo $foo->inexistent_property->sha1()->sha1()->value(); // will echo the twice encrypted value of 10
$foo->inexistent_property2 = array();             // now with arrays
```

It really clear things out in the example files.

Really hope It helps someone to code faster or stylish in PHP.
