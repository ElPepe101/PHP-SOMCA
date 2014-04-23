<?php

require ('ObjectApply.php');
//use \PPMFWK;

/**
 * This file handles the retrieval and serving of news articles
 */
class Example {
	
	private $_Registry;

	function __construct() {

		$this->_Registry = new stdClass();
	}
	
// ////////////////////////////////////////////////////
// ////////////////////////////////////////////////////
// THINK ILL BE BETTER TO USE TRAITS FROM THIS PART	ON

	/**
	 * Obtain Controller created vars
	 *
	 */
	public function __get($varName) {
	
		return $this->_Registry->$varName;
	}

	/**
	 * Multiple Chained Actions (Ruby style)
	 *
	 * This is where the magic happens:
	 * 	the idea is to create a SOLID convention param 
	 * 	with an instance of the ObjectApply Library,
	 *  save it to the Controller registry and make use 
	 * 	of singleton to generate a global-in-local history
	 * 	for control of the qty of requests.
	 *
	 * 	All vars in Controller must use the same principle.
	 *
	 * @usage $this->new_var = 'some string';
	 */
	public function __set($varName, $value) {
	
		$this->_Registry->$varName = new ObjectApply($value);
	}

}

// YOU REALLY NEED TO TRY THIS OUT
$foo = new Example();
$foo->algo = 'algodón';
echo '<br />1 algo: '.$foo->algo->value();
echo '<br />2 is_string: '.$foo->algo->is_string()->value();
echo '<br />3 is_string: '.$foo->algo->is_string()->value();
echo '<br />4 is_string: '.$foo->algo->is_string()->value();
echo '<br />5 is_string: '.$foo->algo->is_string()->value();
echo '<br />6 is_string: '.$foo->algo->is_string()->value();
echo '<br />7 sha1: '.$foo->algo->sha1()->value();
echo '<br />8 sha1: '.$foo->algo->sha1()->value();
echo '<br />9 sha1,strpos: '.$foo->algo->sha1()->strpos('ff26b')->value();
echo '<br />10 sha1,sha1: '.$foo->algo->sha1()->sha1()->value();
echo '<br />11 sha1,sha1: '.$foo->algo->sha1()->sha1()->value();
echo '<br />12 sha1,strpos: '.$foo->algo->sha1()->sha1()->strpos('df7859937')->value();
echo '<br />13 sha1: '.$foo->algo->sha1()->value();
echo '<br />14 sha1: '.$foo->algo->sha1()->value();
echo '<br />15 sha1: '.$foo->algo->sha1()->value();
echo '<br />sha1,strpos: '.$foo->algo->sha1()->strpos('afbf5941')->value();
echo '<br />sha1,strpos: '.$foo->algo->sha1()->strpos('30888')->value();

if($foo->algo->is_string()->value()){
    echo '<br />is string: '. $foo->algo->value();
}

if($foo->algo->sha1()->is_sha1()){
    echo '<br />is sha: '.$foo->algo->sha1()->value();
}

echo '<br />';
print_r($foo->algo->sha1());

echo '<br />strpos: '.$foo->algo->sha1()->strpos('9a2f44')->value();

