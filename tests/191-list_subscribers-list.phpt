--TEST--
list_subscribers-list
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_subscribers/list');
    $list    = $twitter->list_subscribers->list(array('user' => 'twitterapi', 'list_id' => 'team'));
    var_dump($list instanceof stdclass && is_array($list->users));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
