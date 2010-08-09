--TEST--
search
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter  = Services_Twitter_factory('search/search');
    $response = $twitter->search(array('q' => 'twitterapi OR twitter'));
    var_dump(is_array($response->results) && count($response->results) == 15);
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
