<?php
require_once ("menus.php");

function ShowList($TData,$bgcolor="white",$title="") {
	global $global_count;
	$max = count($TData);
	$count = 0;
	echo "\n<table width=\"60%\" bgcolor=$bgcolor>\n";
	if ($title!="") echo "<th colspan=4 align=center>",$title," (",$max,")</th>\n";
	for ($ii = 0; $ii < $max; $ii++) {
		$m = $TData[$ii];
		$count++;
		echo "<input type=hidden name=IdMember_".$global_count." value=".$m->id.">";
		echo "<tr><td colspan=2> <font size=5>",LinkWithUsername($m->Username),"</font> (",ww($m->Gender),")", " (",fsince($m->created)," ",localdate($m->created),")</td><td colspan=2> <font size=4>",$m->FirstName," <i>",$m->SecondName,"</i> <b>",$m->LastName,"</b> </font>(<i>",$m->Email,"</i>)</td>\n";
		echo "<tr><td colspan=4>", $m->ProfileSummary, "</td>\n";
		echo "<tr><td>", $m->HouseNumber, "</td><td colspan=2>", $m->StreetName, "</td><td>", $m->Zip, "</td>\n";
		echo "<tr><td colspan=4><font color=gray><b>", $m->countryname, " > ", $m->regionname, " > ", $m->cityname, "</b></font></td>\n";
		echo "<tr><td colspan=4><font color=green><b><i>", str_replace("\n","<br>",$m->FeedBack), "</i></b></font></td>\n";
		echo "<tr><td>";
		if ($m->Status == "Pending")
		   echo "<input type=radio name=action_".$global_count." value=accept> accept<br>\n";
		   echo "<input type=radio name=action_".$global_count." value=reject> reject<br>";
		if ($m->Status == "Pending") {
		   echo "<input type=radio name=action_".$global_count." value=needmore> need more<br>\n";
		}
	    echo "<input type=radio name=action_".$global_count." value=nothing> nothing<br>\n";
		echo "</td><td colspan=3>";
		if ($m->Status == "Pending") {
		   echo "needmore aditional text for emailing to member<br>";
		   echo "<textarea name=needmoretext_".$global_count." cols=60 rows=4>";
		   echo "</textarea>\n";
		}
		echo "</td>";
		  
		echo "<tr><td colspan=5>";
		echo "<a href=\"".bwlink("contactmember.php?cid=". $m->id). "\">contact</a> ";
		echo "<a href=\"".bwlink("updatemandatory.php?cid=". $m->id). "\">update mandatory</a>";
		echo "</td>";
		echo "<tr><td colspan=5><hr></td>\n";
		$global_count++;
	}
	echo "<tr><td align=left colspan=2>Total</td><td align=left colspan=2>$count</td>";
	echo "\n</table><br>\n";
} // end of ShowList

function DisplayAdminAccepter($Taccepted, $Tmailchecking, $Tpending, $TtoComplete, $lastaction = "") {
	global $countmatch;
	global $title;
	global $global_count;
	$title = "Accept members";
	global $AccepterScope;
	
	$global_count=0 ;

	include "header.php";

	Menu1("", ww('MainPage')); // Displays the top menu

	Menu2("admin/adminaccepter.php", ww('MainPage')); // Displays the second menu

	DisplayHeaderShortUserContent($title . " : " . $lastaction);

	echo " your Scope :", $AccepterScope;
	
	if (!IsAdmin()) {
	  echo "temporarly disabled, under test";
	  include "footer.php";
	}

	echo "<form name=adminaccepter action=".bwlink("admin/adminaccepter.php").">\n";
	echo "<center>";

	ShowList($Tpending,"#ffff66"," Members to accept");

	echo "<br><input type=submit name=submit>\n";
	echo "<hr><h3> Members who have to complete their profile</h3>";
	ShowList($TtoComplete);

	echo "<hr><h3> Members who have not yet confirmed their email</h3>";
	ShowList($Tmailchecking);

	echo "</center>";
	echo "<input type=hidden name=action value=batchaccept>";
	echo "<input type=hidden name=global_count value=$global_count>";
	echo "</form>";

	include "footer.php";
} // end of DisplayAdminAccepter($Taccepted,$Tmailchecking,$Tpending)