--TEST--
list_subscribers-show
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_subscribers/show');
    $user    = $twitter->list_subscribers->show(array('user' => 'twitterapi', 'list_id' => 'team', 'id' => 13348));
    var_dump($user instanceof stdclass && is_int($user->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
