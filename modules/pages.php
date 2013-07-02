<?php

function ign_pages_getBySlug($slug)
{
	if(file_exists(IGN_PATH."data/pages/$slug.json"))
	{
		$jsonPage = json_decode(file_get_contents(IGN_PATH."data/pages/$slug.json"));
		return array("title"=>$jsonPage->title, "author"=>$jsonPage->author, "article"=>$jsonPage->article);
	}
	else
		return false;
}