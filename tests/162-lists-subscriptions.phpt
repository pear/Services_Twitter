--TEST--
lists-subscriptions
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/subscriptions');
    $response = $twitter->lists->subscriptions(array('user' => $config['user']));
    var_dump($response instanceof stdclass && is_array($response->lists));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
