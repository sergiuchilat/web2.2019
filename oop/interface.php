<?
require_once "models/interface/PhoneAbstract.php";
require_once "models/interface/SuperPhone.php";

require_once "models/interface/PhoneInterface.php";
require_once "models/interface/SimplePhone.php";

$phone = new SuperPhone();
$phone->run();

$phone2 = new SimplePhone();
$phone2->run();