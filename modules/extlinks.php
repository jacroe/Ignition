<?php
function ign_extlinks_footer()
{
	return <<<RETURN
<script type="text/javascript">
	$('a').each(function()
	{
		var link = $(this).attr("href");
		if(link.match("youtube.com"))
		{
			$(this).addClass("extlink ext-youtube");
			$(this).attr("target", "_BLANK");
		}
		if(link.match("wikipedia.org"))
		{
			$(this).addClass("extlink ext-wikipedia");
			$(this).attr("target", "_BLANK");
		}
		if(link.match("twitter.com"))
		{
			$(this).addClass("extlink ext-twitter");
			$(this).attr("target", "_BLANK");
		}

		if(link.match(".pdf"))
			$(this).addClass("filelink file-pdf");
	});
</script>

RETURN;
}