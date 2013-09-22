<?php
$queued_actions = array();

function ign_action_add($hook, $func)
{
	global $queued_actions;

	$queued_actions[$hook][] = array("func"=>$func);
}

function ign_action_run($hook, $args = NULL)
{
	global $queued_actions;
	$returnCode = "";
	$actions = $queued_actions[$hook];
	if($hook == "display-header" or $hook == "display-footer")
	{
		foreach ($actions as $action)
		{
			$returnCode .= call_user_func($action['func']);
		}
		return $returnCode;
	}
	elseif ($hook == "publish-post")
	{
		foreach ($actions as $action)
		{
			call_user_func_array($action['func'], $args);
		}
	}
	else
	{
		foreach ($actions as $action)
		{
			call_user_func($action['func']);
		}
	}
}

/* Available hooks

 * init - no args
 * display-header - no args
 * display-footer - no args
 * publish-post - arg1 = post slug

*/