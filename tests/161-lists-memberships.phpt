--TEST--
lists-memberships
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/memberships');
    $response = $twitter->lists->memberships(array('user' => $config['user'], 'list_id' => $config['list_slug']));
    var_dump($response instanceof stdclass && is_array($response->lists));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
