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

	foreach (array_reverse(glob(IGN_PATH."data/posts/$searchString.md")) as $post)
	{
		$slug = str_replace(IGN_PATH."data/posts/", "", str_replace(".md", "", $post));
		$posts[] = ign_posts_getPostData($slug);
		if (count($posts) >= $num && $num != -1) break;
	}

	return $posts;
}

function ign_posts_getBySlug($slug)
{
	if(file_exists(IGN_PATH."data/posts/$slug.md"))
	{
		return ign_posts_getPostData($slug);
	}
	else
		return false;
}

function ign_posts_getByTag($tag)
{
	$allPosts = ign_posts_get();
	foreach($allPosts as $post)
	{
		if (in_array($tag, $post["tags"]))
			$taggedPosts[] = $post;
	}

	return $taggedPosts;
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
		$newText = "<sup id=\"fnref-$i\"><a href=\"#fn-$i\" rel=\"footnote\">$i</a></sup>";
		$article = str_replace($footnote, $newText, $article);
		$i++;
	}
	foreach ($notes as $i=>$note)
		$footnotes .= '<li id="fn-'.$i.'"><p>'.$note.' <a href="#fnref-'.$i.'" rev="footnote">&#8617;</a></p></li>'."\n";
	if ($footnotes)
		$article .= "\n<hr />\n<ol>\n$footnotes</ol>";

	return $article;
}

function ign_posts_parseHeaders($rawHeaders)
{
	$x = explode("\n", $rawHeaders);
	$processedHeaders["title"] =$x[0];
	unset($x[0]);
	foreach($x as $header)
	{
		$y = explode(": ", $header);
		$y[0] = strtolower($y[0]);
		$y[1] = trim($y[1]);
		if ($y[0] == "tags")
		{
			$y[1] = str_replace(", ", ",", $y[1]);
			$y[1] = explode(",", $y[1]);
		}
		
		$processedHeaders[strtolower($y[0])] = $y[1];
	}
	return $processedHeaders;
}

function ign_posts_getPostData($slug)
{
	$file = IGN_PATH."data/posts/$slug.md";
	$rawPostData = file_get_contents($file);
	$explodedPost = explode("\n\n", $rawPostData);
	$post = ign_posts_parseHeaders($explodedPost[0]);
	unset($explodedPost[0]);
	$rawPost = implode("\n\n", $explodedPost);

	$post["article"] = ign_posts_parsePost($rawPost);
	$post["rawArticle"] = $rawPost;
	if (isset($post["published"]))
	{
		$post["html5Date"] = ign_html5Time($post["published"]);
		$post["timeAgo"] = ign_timeAgo($post["published"]);
		$post["date"] = $post["published"];
	}
	$post["slug"] = $slug;
	return $post;
}

function ign_posts_publish($title, $author, $publishDate, $loc, $excerpt, $article, $type = "post", $tags = "", $link = "", $photo = "")
{
	$newPost = "$title\n";
	$newPost .= "Author: $author\n";
	$newPost .= "Location: $loc\n";
	$newPost .= "Excerpt: $excerpt\n";
	$newPost .= "Type: $type\n";
	if ($tags)
		$newPost .= "Tags: $tags\n";
	if ($link)
		$newPost .= "Link: $link\n";
	if ($photo)
		$newPost .= "Photo: $photo\n";

	$strSlug = strtolower(str_replace(array(" ", ".", ",", "!", "\"", "'"), array("-", "", "", "", "", ""), $title));
	if(time() >= strtotime($publishDate))
	{
		$newPost .= "Published: ".date("r", strtotime($publishDate))."\n";
		$newPost .= "\n$article";

		$strSlug = date("Y-m-d-Hi_", strtotime($publishDate)).$strSlug;
		file_put_contents(IGN_PATH."data/posts/$strSlug.md", $newPost);
		ign_action_run("publish-post", array($strSlug));
	}
	else
	{
		$newPost .= "Publish-on: $publishDate\n";
		$newPost .= "\n$article";
		file_put_contents(IGN_PATH."data/drafts/$strSlug.md", $newPost);
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

#ign_action_add("init", "ign_posts_publishDrafts");