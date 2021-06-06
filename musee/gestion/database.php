<?php 
include("../included/database.php");
function display_cmd($array)
{
	foreach ($array as $key => $value) {
		if ($value > 0) {
			echo '<div style ="text-align: left; margin: 0 0.5rem; display: flex; flex-flow: column wrap; align-content: start;"> ' . $key . " x" . $value . " | </div>";
		}
	}
}
?>