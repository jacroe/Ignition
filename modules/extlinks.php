<?php
function ign_extlinks_footer()
{
	return <<<RETURN
<script type="text/javascript">
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

	$('a:external').attr("target", "_BLANK");
});
</script>

RETURN;
}