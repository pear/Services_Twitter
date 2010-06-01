<?php

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'ignore'            => array(
        'runTests.php',
        'tests/tests-config.php',
        'generatePackage.php',
        'coverage/'
    ),
    'dir_roles' => array(
        'tests'     => 'test',
        'data'      => 'data',
        'examples'  => 'doc'
    ),
));

$packagexml->setPackage('Services_Twitter');
$packagexml->setSummary('PHP interface to Twitter\'s API');
$packagexml->setDescription(
    'An interface for communicating with Twitter\'s public API. Send status updates, fetch information, add friends, etc.'
);

$packagexml->setChannel('pear.php.net');
$packagexml->setAPIVersion('0.6.0');
$packagexml->setReleaseVersion('0.6.0');

$packagexml->setReleaseStability('beta');

$packagexml->setAPIStability('beta');

$packagexml->setNotes('
* Updated statuses/update method : added lat, long, place_id and display_coordinates parameters (closes feature request #17421)
* Added lists and trends support from http://blog.cheki.net/archives/1618
* Added generatePackage.php for easy package.xml management
');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'shupp@php.net');

$packagexml->addMaintainer('lead',
                           'izi',
                           'David Jean Louis',
                           'izi@php.net');

$packagexml->addMaintainer('lead',
                           'jstump',
                           'Joe Stump',
                           'joe@joestump.net');

$packagexml->setLicense('New BSD License',
                        'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->setPhpDep('5.2.0');
$packagexml->setPearinstallerDep('1.4.0b1');
$packagexml->addPackageDepWithChannel('required', 'PEAR', 'pear.php.net', '1.4.0');
$packagexml->addPackageDepWithChannel('required', 'HTTP_Request2', 'pear.php.net');
$packagexml->addPackageDepWithChannel('optional', 'HTTP_OAuth', 'pear.php.net', '0.1.7');
$packagexml->addExtensionDep('required', 'json'); 
$packagexml->addExtensionDep('required', 'mbstring'); 
$packagexml->addExtensionDep('required', 'simplexml'); 

$packagexml->addReplacement('Services/Twitter.php', 'pear-config', '@data_dir@', 'data_dir'); 
$packagexml->addReplacement('Services/Twitter.php', 'package-info', '@package_version@', 'version'); 
$packagexml->addReplacement('Services/Twitter/Exception.php', 'package-info', '@package_version@', 'version'); 
$packagexml->addReplacement('tests/AllTests.php', 'package-info', '@package_version@', 'version'); 

$packagexml->generateContents();
$packagexml->writePackageFile();

?>
