--TEST--
trends-location
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('trends/location');
    $response  = $twitter->trends->location(array('woeid' => 1));
    var_dump(is_array($response));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
