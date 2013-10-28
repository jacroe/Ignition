<?php

function ign_fitvids()
{
	return <<<RETURN
<script src=inc/js/jquery.fitvids.js></script>
<script>
(function(e){"use strict";e(function(){e(".the-content").fitVids()})})(jQuery);
</script>
RETURN;
}
ign_action_add("display-footer", "ign_fitvids");