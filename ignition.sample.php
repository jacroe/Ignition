<?php

error_reporting(E_ERROR | E_PARSE);

define("IGN_TITLE", "An Ignition Blog");
define("IGN_SUBTITLE", "A flat-file blogging system");
define("IGN_TIMEZONE", "America/Chicago");
define("IGN_URL", "http://localhost/ignition/");
define("IGN_PATH", "/home/jacob/www/ignition/");
define("LANG", "en");

define("USER_NAME", "Alice");
define("USER_EMAIL", "alice@example.com");
define("USER_LOCATION", "The Internet");

/* MODULE: Email */
define("SMTP_SERVER", "mail.bob.com");
define("SMTP_PORT", 465);
define("SMTP_USER", "bob");
define("SMTP_PASS", "bobandalice");
define("SMTP_FROM", "alice@bob.com");

date_default_timezone_set(IGN_TIMEZONE);

require_once(IGN_PATH."inc/lang/".LANG.".php");

foreach (glob(IGN_PATH."modules/_*.php") as $includes) require_once $includes;
foreach (glob(IGN_PATH."modules/*.php") as $includes) require_once $includes;
foreach (glob(IGN_PATH."plugins/*.php") as $includes) require_once $includes;
ign_action_run("init");

require_once(IGN_PATH."lib/smarty/Smarty.class.php");
$smarty = new Smarty;
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';
$smarty->setTemplateDir(IGN_PATH."inc/templates/");
$smarty->setCompileDir(IGN_PATH."inc/templates_c/");
$smarty->assign("headerCode", ign_action_run("display-header"));
$smarty->assign("footerCode", ign_action_run("display-footer"));

require_once(IGN_PATH."lib/Parsedown/Parsedown.php");