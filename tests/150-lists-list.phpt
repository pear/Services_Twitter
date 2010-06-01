--TEST--
lists-list
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/list');
    $list    = $twitter->lists->list(array('user' => $config['user']));
    var_dump($list instanceof stdclass && is_array($list->lists));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
