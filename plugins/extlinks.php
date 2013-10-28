<?php
function ign_extlinks_js()
{
	return <<<RETURN
<script>
// Selecting external links thanks to
// http://jquery-howto.blogspot.com/2009/06/find-select-all-external-links-with.html
$.expr[':'].external = function(obj)
{
	return !obj.href.match(/^mailto\:/) && (obj.hostname != location.hostname);
};

$('a').each(function()
{
	var link = $(this).attr("href");
	if(link.match("youtube.com"))
		$(this).addClass("extlink ext-youtube");

	if(link.match("wikipedia.org"))
		$(this).addClass("extlink ext-wikipedia");

	if(link.match("twitter.com"))
		$(this).addClass("extlink ext-twitter");

	if(link.match("wolframalpha.com"))
		$(this).addClass("extlink ext-wolfram");

	if(link.match(".pdf"))
		$(this).addClass("filelink file-pdf");

	$('a:external').attr("target", "_blank");
});
</script>

RETURN;
}

function ign_extlinks_css()
{
	return <<<RETURN
<style>
a.bloglink, a.extlink, a.filelink {background-repeat:no-repeat; background-position:0 center; padding:0 0 0 18px;}

a.extlink {background-image:url()}
a.ext-youtube {background-image:url("https://s.ytimg.com/yts/img/favicon-vfldLzJxy.ico")}
a.ext-wikipedia {background-image:url("../images/icons/wp.png");}
a.ext-twitter {background-image:url("https://abs.twimg.com/favicons/favicon.ico");}
a.ext-wolfram {background-image:url("http://www.wolframcdn.com/alphaFav.ico");}

a.filelink {background-image:url();}
a.file-pdf {background-image:url("../images/icons/pdf.png");}
</style>
RETURN;
}

ign_action_add("display-footer", "ign_extlinks_js");
ign_action_add("display-header", "ign_extlinks_css");