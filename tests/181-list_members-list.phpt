--TEST--
list_members-list
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_members/list');
    $list    = $twitter->list_members->list(array('user' => $config['user'], 'list_id' => $config['list_slug']));
    var_dump($list instanceof stdclass && is_array($list->users));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
