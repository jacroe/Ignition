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

	if ($diff->y == 1) $timeLeft = str_replace("years", "year", $timeLeft);
	if ($diff->m == 1) $timeLeft = str_replace("months", "month", $timeLeft);
	if ($diff->d == 1) $timeLeft = str_replace("days", "day", $timeLeft);
	if ($diff->h == 1) $timeLeft = str_replace("hours", "hour", $timeLeft);
	if ($diff->i == 1) $timeLeft = str_replace("minutes", "minute", $timeLeft);
	if ($diff->s == 1) $timeLeft = str_replace("seconds", "second", $timeLeft);
	if(time() < strtotime($date))
		return $timeLeft." in the future";
	else
		return $timeLeft." ago";
}
function ign_html5Time($date)
{
	return date("Y-m-d H:i:sO", strtotime($date));
}
function json_format($json)
{
    $tab = "\t";
    $new_json = "";
    $indent_level = 0;
    $in_string = false;

    $json_obj = json_decode($json);

    if($json_obj === false)
        return false;

    $json = json_encode($json_obj);
    $len = strlen($json);

    for($c = 0; $c < $len; $c++)
    {
        $char = $json[$c];
        switch($char)
        {
            case '{':
            case '[':
                if(!$in_string)
                {
                    $new_json .= $char . "\n" . str_repeat($tab, $indent_level+1);
                    $indent_level++;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '}':
            case ']':
                if(!$in_string)
                {
                    $indent_level--;
                    $new_json .= "\n" . str_repeat($tab, $indent_level) . $char;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ',':
                if(!$in_string)
                {
                    $new_json .= ",\n" . str_repeat($tab, $indent_level);
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ':':
                if(!$in_string)
                {
                    $new_json .= ": ";
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '"':
                if($c > 0 && $json[$c-1] != '\\')
                {
                    $in_string = !$in_string;
                }
            default:
                $new_json .= $char;
                break;
        }
    }

    return $new_json;
}