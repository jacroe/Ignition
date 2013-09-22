<?php
function ign_notifyNewPosts($postSlug)
{
	$jsonPost = ign_posts_getBySlug($postSlug);
	ign_email_send(USER_NAME, USER_EMAIL, "{$jsonPost['title']} has been posted.", "We just posted \"{$jsonPost['title']}\". You can read it <a href=\"".IGN_URL."?id=$postSlug\"> here</a>.");
}

ign_action_add("publish-post", "ign_notifyNewPosts");