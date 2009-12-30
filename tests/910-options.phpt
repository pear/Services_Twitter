--TEST--
options
--FILE--
<?php

require_once 'Services/Twitter.php';
$twitter = new Services_Twitter(null, null, array('validate' => true));

$twitter->setOption('source', 'MyRegisteredTwitterSource');
$twitter->setOptions(array(
    'format'     => 'xml',
    'raw_format' => true
));
var_dump($twitter->getOption('source'));
var_dump($twitter->getOption('foo'));
var_dump($twitter->getOptions());

class MyTwitter extends Services_Twitter {
    public function _setFooBar($value) {
        echo 'FooBar says: ' . $value . "\n";
    }
}
$twitter = new MyTwitter('foo', 'bar', array('fooBar' => 'hey!'));
$twitter->setOption('fooBar', 'ho, let\'s go!');


$twitter = new Services_Twitter();

require_once dirname(__FILE__) . '/setup.php';
$twitter = Services_Twitter_factory('options', true, array(
    'format'     => 'xml',
    'raw_format' => 'true',
));
$status = $twitter->statuses->update('foo');
echo $status;

?>
--EXPECTF--
string(25) "MyRegisteredTwitterSource"
NULL
array(5) {
  ["format"]=>
  string(3) "xml"
  ["raw_format"]=>
  bool(true)
  ["source"]=>
  string(25) "MyRegisteredTwitterSource"
  ["use_ssl"]=>
  bool(false)
  ["validate"]=>
  bool(true)
}
FooBar says: hey!
FooBar says: ho, let's go!
<?xml version="1.0" encoding="UTF-8"?>
<status>
  %s
  <source>&lt;a href=%shttp://pear.php.net/package/Services_Twitter%s&gt;PEAR Services_Twitter&lt;/a&gt;</source>
  %s
</status>
