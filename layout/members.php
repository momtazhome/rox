<?php
require_once ("menus.php");

// This function provide a pagination
function _Pagination($maxpos) {
    $curpos=GetParam("start_rec",0) ; // find current pos (0 if not)
		$width=GetParam("limitcount",10); // Number of records per page
		$PageName=$_SERVER["PHP_SELF"] ;
//		echo "width=",$width,"<br>" ;
//		echo "curpos=",$curpos,"<br>" ;
//		echo "maxpos=",$maxpos,"<br>" ;
		echo "\n<center>" ;
		for ($ii=0;$ii<$maxpos;$ii=$ii+$width) {
				$i1=$ii ;
				$i2=min($ii+$width,$maxpos) ;
				if (($curpos>=$i1) and ($curpos<$i2)) { // mark in bold if it is the current position
					 echo "<b>" ;
				}
				echo "<a href=\"",$PageName,"?start_rec=",$i1,"\">",$i1+1,"..",$i2,"</a> " ;
				if (($curpos>=$i1) and ($curpos<$i2)) { // end of mark in bold if it is the current position
					 echo "</b>" ;
				}
		}
		echo "</center>\n" ;
} // end of function Pagination

function DisplayMembers($TData,$maxpos) {
	global $title;
	$title = ww('MembersPage' . " " . $_POST['Username']);
	require_once "header.php";

	Menu1("", ww('MainPage')); // Displays the top menu

	Menu2("members.php", ww('MembersPage')); // Displays the second menu

	DisplayHeaderWithColumns(); // Display the header

	$iiMax = count($TData);
	echo "\n<table border=\"1\" rules=\"rows\">\n";
	for ($ii = 0; $ii < $iiMax; $ii++) {
		$m = $TData[$ii];
		echo "<tr align=left valign=center>";
		echo "<td align=center>";
		if (($m->photo != "") and ($m->photo != "NULL")) {
			echo "<div id=\"topcontent-profile-photo\">\n";
            echo LinkWithPicture($m->Username,$m->photo);
			echo "<br>";
			echo "</div>";
		}
		echo "</td>";
		echo "<td>", LinkWithUsername($m->Username), "</td>";
		echo " <td>", $m->countryname, "</td> ";
		echo "<td>";
		echo $m->ProfileSummary;
		echo "</td>";
		echo "</tr>\n";
	}
	echo "</table>\n";

	_Pagination($maxpos) ;
	
	require_once "footer.php";
}
?>
