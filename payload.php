<?php
// This is a payload function that supports writing with Draft's WebHook feature @ draftin.com/publishers
require_once("ignition.php");
if(!$_POST["payload"])
die("YOU SHALL NOT PASS");
$jsonDraft = json_decode($_POST["payload"], true);
$jsonNewPost = array("author"=>USER_NAME, "date"=>date("r", strtotime($jsonDraft["updated_at"])), "loc"=>"Hattiesburg, MS", "title"=>$jsonDraft["name"], "excerpt"=>"", "type"=>"post", "article"=>$jsonDraft["content"]);
$strSlug = strtolower(str_replace(array(" ", ".", ",", "!", "\"", "'"), array("-", "", "", "", "", ""), $jsonDraft["name"]));
$strSlug = date("Y-m-d-Hi_", strtotime($jsonDraft["updated_at"])).$strSlug;

file_put_contents(IGN_PATH."data/posts/$strSlug.json", json_format(json_encode($jsonNewPost)));
header("Location: ".IGN_URL."?id=$strSlug");