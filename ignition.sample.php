<?php

error_reporting(E_ERROR | E_PARSE);

define("IGN_TITLE", "An Ignition Blog");
define("IGN_SUBTITLE", "A flat-file blogging system");
define("IGN_TIMEZONE", "America/Chicago");
define("IGN_URL", "http://localhost/ignition/");
define("IGN_PATH", "/home/jacob/www/ignition/");

foreach (glob(IGN_PATH."modules/*.php") as $includes)
{
	$module = str_replace(IGN_PATH."modules/", "", str_replace(".php", "", $includes));
	require_once(IGN_PATH."modules/$module.php");

	if(function_exists("ign_{$module}_header"))
	{
		$header .= call_user_func("ign_{$module}_header");
	}
	if(function_exists("ign_{$module}_footer"))
	{
		$footer .= call_user_func("ign_{$module}_footer");
	}
}
require_once(IGN_PATH."lib/smarty/Smarty.class.php");
$smarty = new Smarty;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';
$smarty->setTemplateDir(IGN_PATH."inc/templates/");
$smarty->setCompileDir(IGN_PATH."inc/templates_c/");