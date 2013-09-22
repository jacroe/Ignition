<?php

define("GOOGLEANALYTICS_ID", "");

function ign_googleanalytics()
{
	$id = GOOGLEANALYTICS_ID;
	$analytics = <<<CODE
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '$id']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
CODE;
	return $analytics;
}

ign_action_add("display-footer", "ign_googleanalytics");