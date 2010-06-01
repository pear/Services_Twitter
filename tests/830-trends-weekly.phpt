--TEST--
trends-weekly
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter  = Services_Twitter_factory('trends/weekly');
    $response = $twitter->trends->daily(array('date' => 1251284045));
    var_dump($response instanceof stdclass);
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
