<?php
function ign_fn_head()
{
	return "\n<link href=lib/footnotes-popover/footnotes.css rel=stylesheet />";
}

function ign_fn_foot()
{
	return "\n<script src=lib/footnotes-popover/footnotes.js></script>";
}

ign_action_add("display-header", "ign_fn_head");
ign_action_add("display-footer", "ign_fn_foot");