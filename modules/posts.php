<?php

function ign_posts_get($num = -1, $year = null, $month = null)
{
	if($month)
	{
		if ($month < 10)
			$searchString = "$year-0$month*";
		else
			$searchString = "$year-$month*";
	}
	elseif($year)
		$searchString = "$year*";
	else
		$searchString = "*";

	foreach (array_reverse(glob(IGN_PATH."data/posts/$searchString.json")) as $post)
	{
		$jsonPost = json_decode(file_get_contents($post));
		$slug = str_replace(IGN_PATH."data/posts/", "", str_replace(".json", "", $post));
		$posts[] = ign_posts_getPostData($jsonPost, $slug);
		if (count($posts) >= $num && $num != -1) break;
	}

	return $posts;
}

function ign_posts_getBySlug($slug)
{
	if(file_exists(IGN_PATH."data/posts/$slug.json"))
	{
		$jsonPost = json_decode(file_get_contents(IGN_PATH."data/posts/$slug.json"));
		return ign_posts_getPostData($jsonPost, $slug);
	}
	else
		return false;
}

function ign_posts_parsePost($article)
{
	$article = Parsedown::instance()->parse($article);

	/**************************************************************
	 * Converts footnotes from a text to those
	 * similar to PHP Markdown Extra
	 * Gleefully stolen and modified from Michelle Steigerwalt
	 * http://msteigerwalt.com/articles/2008/08/17/Footnotes
	 **************************************************************/
	$pattern = "/\(\((.*?)\)\)/i"; # Footnote pattern: ((<message>))
	preg_match_all($pattern, $article, $matches);
	$notes = Array();
	$i = 1;
	foreach ($matches[0] as $footnote)
	{
		$notes[$i] = $matches[1][$i-1];
		$newText = "<sup id=\"fnref-$i\"><a href=\"#fn-$i\">$i</a></sup>";
		$article = str_replace($footnote, $newText, $article);
		$i++;
	}
	foreach ($notes as $i=>$note)
		$footnotes .= '<li id="fn-'.$i.'"><p>'.$note.' <a href="#fnref-'.$i.'">&#8617;</a></p></li>'."\n";
	if ($footnotes)
		$article .= "\n<hr />\n<ol>\n$footnotes</ol>";

	return $article;
}

function ign_posts_getPostData($jsonPost, $slug)
{
	return array("title"=>$jsonPost->title, "author"=>$jsonPost->author, "slug"=>$slug, "date"=>$jsonPost->date, "html5Date"=>ign_html5Time($jsonPost->date), "timeAgo"=>ign_timeAgo($jsonPost->date), "loc"=>$jsonPost->loc, "excerpt"=>$jsonPost->excerpt, "article"=>ign_posts_parsePost($jsonPost->article), "rawArticle"=>$jsonPost->article, "type"=>$jsonPost->type, "tags"=>$jsonPost->tags, "link"=>$jsonPost->link, "photo"=>$jsonPost->photo);
}

function ign_posts_publish($title, $author, $publishDate, $loc, $excerpt, $article, $type = "post", $tags = "", $link = "", $photo = "")
{
	$jsonNewPost = array("title"=>$title, "author"=>$author, "loc"=>$loc, "excerpt"=>$excerpt, "article"=>$article, "type"=>$type, "tags"=>$tags, "link"=>$link, "photo"=>$photo);
	$strSlug = strtolower(str_replace(array(" ", ".", ",", "!", "\"", "'"), array("-", "", "", "", "", ""), $title));
	if(time() >= strtotime($publishDate))
	{
		$jsonNewPost["date"] = date("r", strtotime($publishDate));
		$strSlug = date("Y-m-d-Hi_", strtotime($publishDate)).$strSlug;
		file_put_contents(IGN_PATH."data/posts/$strSlug.json", json_format(json_encode($jsonNewPost)));
		ign_action_run("publish-post", array($strSlug));
	}
	else
	{
		$jsonNewPost["publish"] = $publishDate;
		file_put_contents(IGN_PATH."data/drafts/$strSlug.json", json_format(json_encode($jsonNewPost)));
	}
	return $strSlug;
}

function ign_posts_publishDrafts()
{
	foreach (array_reverse(glob(IGN_PATH."data/drafts/*.json")) as $post)
	{
		$jsonPost = json_decode(file_get_contents($post), true);
		$slug = str_replace(array(IGN_PATH."data/drafts/", ".json"), "", $post);
		if(time() >= strtotime($jsonPost["publish"]))
		{
			$jsonPost["date"] = date("r", strtotime($jsonPost["publish"]));
			unset($jsonPost["publish"]);
			file_put_contents($post, json_format(json_encode($jsonPost)));
			$newSlug = date("Y-m-d-Hi_", strtotime($jsonPost["date"])).$slug;
			rename(IGN_PATH."data/drafts/$slug.json", IGN_PATH."data/posts/$newSlug.json");
			ign_action_run("publish-post", array($newSlug));
		}
	}
}

ign_action_add("init", "ign_posts_publishDrafts");