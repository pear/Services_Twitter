--TEST--
list_members-show
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_members/show');
    $user    = $twitter->list_members->show(array('user' => $config['user'], 'list_id' => $config['list_slug'], 'id' => $config['list_user']));
    var_dump($user instanceof stdclass && is_int($user->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
