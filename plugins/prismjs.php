<?php
function ign_prism_head()
{
	return "\n<link href=lib/prismjs/prism.css rel=stylesheet />";
}

function ign_prism_foot()
{
	return "\n<script src=lib/prismjs/prism.js></script>";
}

ign_action_add("display-header", "ign_prism_head");
ign_action_add("display-footer", "ign_prism_foot");