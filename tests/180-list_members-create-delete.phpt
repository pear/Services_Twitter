--TEST--
list_members-create-delete
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('list_members/create');
    $user    = $twitter->list_members->create(array('user' => $config['user'], 'list_id' => $config['list_slug'], 'id' => 6253282));
    var_dump($user instanceof stdclass && is_int($user->id));
    $twitter = Services_Twitter_factory('list_members/delete');
    $delete  = $twitter->list_members->delete(array('user' => $config['user'], 'list_id' => $config['list_slug'], 'id' => 6253282));
    var_dump($delete instanceof stdclass && is_int($delete->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
bool(true)
