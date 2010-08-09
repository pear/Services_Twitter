--TEST--
lists-statuses
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/statuses');
    $response = $twitter->lists->statuses(array('user' => $config['user'], 'list_id' => $config['list_slug']));
    var_dump(is_array($response));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
