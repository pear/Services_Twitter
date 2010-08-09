--TEST--
lists-show
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/show');
    $list    = $twitter->lists->show(array('user' => $config['user'], 'id' => $config['list_slug']));
    var_dump($list instanceof stdclass && is_int($list->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
