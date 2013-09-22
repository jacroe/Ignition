<?php

function ign_timeAgo($date)
{
	$now = new DateTime();
	$ref = new DateTime($date);
	$diff = $now->diff($ref);
	if ($diff->y) $timeLeft = "{$diff->y} ".LANG_YEARS.", {$diff->m} ".LANG_MONTHS.", {$diff->d} ".LANG_DAYS;
	elseif ($diff->m) $timeLeft = "{$diff->m} ".LANG_MONTHS." {$diff->d} ".LANG_DAYS;
	elseif ($diff->d) $timeLeft = "{$diff->d} ".LANG_DAYS." {$diff->h} ".LANG_HOURS;
	elseif ($diff->h) $timeLeft = "{$diff->h} ".LANG_HOURS." {$diff->i} ".LANG_MINUTES;
	else $timeLeft = "{$diff->i} ".LANG_MINUTES." {$diff->s} ".LANG_SECONDS;

	if ($diff->y == 1) $timeLeft = str_replace(LANG_YEARS, LANG_YEAR, $timeLeft);
	if ($diff->m == 1) $timeLeft = str_replace(LANG_MONTHS, LANG_MONTH, $timeLeft);
	if ($diff->d == 1) $timeLeft = str_replace(LANG_DAYS, LANG_DAY, $timeLeft);
	if ($diff->h == 1) $timeLeft = str_replace(LANG_HOURS, LANG_HOUR, $timeLeft);
	if ($diff->i == 1) $timeLeft = str_replace(LANG_MINUTES, LANG_MINUTE, $timeLeft);
	if ($diff->s == 1) $timeLeft = str_replace(LANG_SECONDS, LANG_SECOND, $timeLeft);
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