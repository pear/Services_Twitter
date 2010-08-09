--TEST--
trends-daily
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter  = Services_Twitter_factory('trends/daily');
    $response = $twitter->trends->daily(array('date' => '2009-08-26'));
    var_dump($response instanceof stdclass);
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
