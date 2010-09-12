--TEST--
list_subscribers-create-delete
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_subscribers/create');
    $user    = $twitter->list_subscribers->create(array('user' => 'twitterapi', 'list_id' => 'team'));
    var_dump($user instanceof stdclass && is_int($user->id));
    $twitter = Services_Twitter_factory('list_subscribers/delete');
    $delete  = $twitter->list_subscribers->delete(array('user' => 'twitterapi', 'list_id' => 'team'));
    var_dump($delete instanceof stdclass && is_int($delete->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
bool(true)
