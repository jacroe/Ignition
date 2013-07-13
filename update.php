<?php
require "ignition.php";

# Publish drafts
foreach (array_reverse(glob(IGN_PATH."data/drafts/*.json")) as $post)
{
	$jsonPost = json_decode(file_get_contents($post), true);
	$slug = str_replace(IGN_PATH."data/drafts/", "", str_replace(".json", "", $post));
	if(time() > strtotime($jsonPost["publish"]))
	{
		$jsonPost["date"] = date("r", strtotime($jsonPost["publish"]));
		unset($jsonPost["publish"]);
		file_put_contents($post, json_format(json_encode($jsonPost)));
		rename(IGN_PATH."data/drafts/$slug.json", IGN_PATH."data/posts/".date("Y-m-d_", strtotime($jsonPost["date"]))."$slug.json");
		echo "{$jsonPost['title']} Published";
	}
}