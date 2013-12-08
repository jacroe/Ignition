<?php

function ign_pages_getBySlug($slug)
{
	if(file_exists(IGN_PATH."data/pages/$slug.md"))
	{
		$rawPageData = file_get_contents(IGN_PATH."data/pages/$slug.md");
		$explodedPage = explode("\n\n", $rawPageData);
		$page = ign_posts_parseHeaders($explodedPage[0]);
		unset($explodedPage[0]);
		$rawPage = implode("\n\n", $explodedPage);

		$page["article"] = ign_posts_parsePost($rawPage);
		$page["rawArticle"] = $rawPage;

		return $page;
	}
	else
		return false;
}