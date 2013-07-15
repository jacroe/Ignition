<?php
# Publish drafts
foreach (array_reverse(glob(IGN_PATH."data/drafts/*.json")) as $post)
{
	$jsonPost = json_decode(file_get_contents($post), true);
	$slug = str_replace(array(IGN_PATH."data/drafts/", ".json"), "", $post);
	if(time() >= strtotime($jsonPost["publish"]))
	{
		$jsonPost["date"] = date("r", strtotime($jsonPost["publish"]));
		unset($jsonPost["publish"]);
		file_put_contents($post, json_format(json_encode($jsonPost)));
		$newSlug = date("Y-m-d_", strtotime($jsonPost["date"])).$slug;
		rename(IGN_PATH."data/drafts/$slug.json", IGN_PATH."data/posts/$newSlug.json");
		ign_email_send(USER_NAME, USER_EMAIL, "{$jsonPost['title']} has been posted.", "We just posted \"{$jsonPost['title']}\". You can read it <a href=\"".IGN_URL."?id=$newSlug\"> here</a>.");
	}
}