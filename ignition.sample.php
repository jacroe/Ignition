<?php

error_reporting(E_ERROR | E_PARSE);

define("IGN_TITLE", "An Ignition Blog");
define("IGN_SUBTITLE", "A flat-file blogging system");
define("IGN_TIMEZONE", "America/Chicago");
define("IGN_URL", "http://localhost/ignition/");
define("IGN_PATH", "/home/jacob/www/ignition-v2/");

foreach (glob(IGN_PATH."modules/*.php") as $includes) require_once($includes);
require_once(IGN_PATH."lib/smarty/Smarty.class.php");
$smarty = new Smarty;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';
$smarty->setTemplateDir(IGN_PATH."inc/templates/");
$smarty->setCompileDir(IGN_PATH."inc/templates_c/");