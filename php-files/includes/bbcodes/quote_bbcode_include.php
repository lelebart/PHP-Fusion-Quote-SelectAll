<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: quote_bbcode_include.php
| Author: Wooya
| Author: Valerio Vendrame (lelebart)
| javascript from phpBB3 forum functions
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

$locale['bb_quote_select'] = isset($locale['bb_quote_select']) ? $locale['bb_quote_select'] : "Select All";
$locale['bb_quote_quote']  = isset($locale['bb_quote_quote']) ? $locale['bb_quote_quote']   : "Quotation";

if(!function_exists("quote_bbcode_addtohead")) {
	function quote_bbcode_addtohead() {
		$return = "<!-- quote BBcode by Wooya, few javascript by lelebart, taken and modded from phpBB3 -->
<script type='text/javascript' src='".INCLUDES."bbcodes/quote_bbcode_include_js.js'></script>";
		return $return;
	}
	$quote_bbcode_addtohead = quote_bbcode_addtohead();
	add_to_head($quote_bbcode_addtohead);
}

$qcount = substr_count($text, "[quote]");
for ($i=0;$i < $qcount;$i++) $text = preg_replace("#\[quote\](.*?)\[/quote\]#si", "<div'><span class='quote tbl1'><strong>".$locale['bb_quote_quote']."</strong> [<span class='save-quote'>".$locale['bb_quote_select']."</span>]</span> <div class='quote'>\\1</div></div>", $text);


	#$text = preg_replace("#\[code\](.*?)\[/code\]#sie", "'<div class=\'code_bbcode\'><div class=\'tbl-border tbl2\' style=\'width:400px\'>".$code_save."<strong>".$locale['bb_code_code']."</strong></div><div class=\'tbl-border tbl1\' style=\'width:400px;white-space:nowrap;overflow:auto\'><code style=\'white-space:nowrap\'>'.formatcode('\\1').'<br /><br /><br /></code></div></div>'", $text, 1);

?>
