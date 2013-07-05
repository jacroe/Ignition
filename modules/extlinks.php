<?php
function ign_extlinks_footer()
{
	return <<<RETURN
<script type="text/javascript">
	$('a').each(function() { var link = $(this).attr("href"); if(link.match("youtube.com")) { $(this).addClass("extlink ext-youtube"); $(this).attr("target", "_BLANK"); } } )
</script>

RETURN;
}