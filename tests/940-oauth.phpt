--TEST--
oauth
--SKIPIF--
<?php if(!@include_once 'HTTP/OAuth.php') echo 'skip HTTP_OAuth is not installed'; ?>
--FILE--
<?php

require_once 'Services/Twitter.php';
require_once 'HTTP/Request2.php';
require_once 'HTTP/Request2/Adapter/Mock.php';
require_once 'HTTP/OAuth/Consumer.php';

$responseClass = new stdClass;
$responseClass->result = 'SUCCESS';
$response ="HTTP/1.1 200 OK
Content-Type: text/json

" . json_encode($responseClass);


$twitter = new Services_Twitter();
$oauth   = new HTTP_OAuth_Consumer('key', 'secret', 'token', 'tokenSecret');
$http    = new HTTP_Request2();


$mock = new HTTP_Request2_Adapter_Mock();
$mock->addResponse($response);
$http->setAdapter($mock);
$twitter->setRequest($http);
$twitter->setOAuth($oauth);
print_r($twitter->account->update_profile_image(__FILE__)->result . "\n");
?>
--EXPECT--
SUCCESS

