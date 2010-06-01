--TEST--
lists-create-delete
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('lists/create');
    $list    = $twitter->lists->create(array('user' => $config['user'], 'name' => $config['list_name']));
    var_dump($list instanceof stdclass && is_int($list->id));
    $twitter = Services_Twitter_factory('lists/delete');
    $delete  = $twitter->lists->delete(array('user' => $config['user'], 'id' => $list->id));
    var_dump($delete instanceof stdclass && is_int($delete->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
bool(true)
