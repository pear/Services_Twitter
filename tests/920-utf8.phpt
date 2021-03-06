--TEST--
utf8
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

$twitter  = Services_Twitter_factory('utf8', true, array(
    'format'     => 'xml',
    'raw_format' => true
));
$utf8str = 'une chaîne unicode qui sera transformée lors du second test';
echo $twitter->statuses->update($utf8str) . "\n";

$twitter  = Services_Twitter_factory('utf8', true, array(
    'format'     => 'xml',
    'raw_format' => true
));
$isoStr = utf8_decode($utf8str);
echo $twitter->statuses->update($isoStr);

?>
--EXPECTF--
<?xml version="1.0" encoding="UTF-8"?>
<status>
  <created_at>Sun Jan 04 20:20:39 +0000 2009</created_at>
  <id>1095675794</id>
  <text>une cha&#238;ne unicode qui sera transform&#233;e lors du second test</text>
  <source>web</source>
  <truncated>false</truncated>
  <in_reply_to_status_id></in_reply_to_status_id>
  <in_reply_to_user_id></in_reply_to_user_id>
  <favorited>false</favorited>
  <in_reply_to_screen_name></in_reply_to_screen_name>
  <user>
    <id>14406432</id>
    <name>izimobil2</name>
    <screen_name>izimobil2</screen_name>
    <location>somewhere in the moon...</location>
    <description></description>
    <profile_image_url>http://static.twitter.com/images/default_profile_normal.png</profile_image_url>
    <url></url>
    <protected>false</protected>
    <followers_count>0</followers_count>
  </user>
</status>

<?xml version="1.0" encoding="UTF-8"?>
<status>
  <created_at>Sun Jan 04 20:20:39 +0000 2009</created_at>
  <id>1095675794</id>
  <text>une cha&#238;ne unicode qui sera transform&#233;e lors du second test</text>
  <source>web</source>
  <truncated>false</truncated>
  <in_reply_to_status_id></in_reply_to_status_id>
  <in_reply_to_user_id></in_reply_to_user_id>
  <favorited>false</favorited>
  <in_reply_to_screen_name></in_reply_to_screen_name>
  <user>
    <id>14406432</id>
    <name>izimobil2</name>
    <screen_name>izimobil2</screen_name>
    <location>somewhere in the moon...</location>
    <description></description>
    <profile_image_url>http://static.twitter.com/images/default_profile_normal.png</profile_image_url>
    <url></url>
    <protected>false</protected>
    <followers_count>0</followers_count>
  </user>
</status>
