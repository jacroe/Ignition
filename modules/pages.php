<?php

function ign_pages_getBySlug($slug)
{
	if(file_exists(IGN_PATH."pages/$slug.json"))
		return json_decode(file_get_contents(IGN_PATH."pages/$slug.json"));
	else
		return false;
}