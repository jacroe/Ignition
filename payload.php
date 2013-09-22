<?php
// This is a payload function that supports writing with Draft's WebHook feature @ draftin.com/publishers
require_once("ignition.php");
if(!$_POST["payload"])
die("YOU SHALL NOT PASS");
$jsonDraft = json_decode($_POST["payload"], true);
$strSlug = ign_posts_publish($jsonDraft["name"], USER_NAME, date("r", strtotime($jsonDraft["updated_at"])), "Hattiesburg, MS", "", $jsonDraft["content"]);
header("Location: ".IGN_URL."?id=$strSlug");