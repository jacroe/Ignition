<?php

function ign_timeAgo($date)
{
	$now = new DateTime();
	$ref = new DateTime($date);
	$diff = $now->diff($ref);
	if ($diff->y) $timeLeft = "{$diff->y} years, {$diff->m} months, {$diff->d} days";
	elseif ($diff->m) $timeLeft = "{$diff->m} months {$diff->d} days";
	elseif ($diff->d) $timeLeft = "{$diff->d} days {$diff->h} hours";
	elseif ($diff->h) $timeLeft = "{$diff->h} hours {$diff->i} minutes";
	else $timeLeft = "{$diff->i} minutes {$diff->s} seconds";
	return $timeLeft;
}