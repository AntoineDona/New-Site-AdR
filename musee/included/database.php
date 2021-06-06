<?php
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = $_ENV["db_password"];
$DBName  = "adr";

$DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;

$pdo = new PDO($DBconnect, $DBowner, $DBpw);
$bdd = new PDO('mysql:host=localhost;dbname=adr;charset=utf8', 'root', 'Morangis91');

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');
// $bdd = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');

function display_cmd($array)
{
    echo "<table>";
	foreach ($array as $key => $value) {
		if ($value > 0) {
		
			echo "<tr>";
			echo "<td style='padding-left:3rem;'>";
			echo $key;
			echo "</td>";
			echo "<td> x";
			echo $value;
			echo "</td>";
			echo "</tr>";
		
		?>
<!-- <div style ="text-align:left; margin: 0 0.5rem; display: flex; flex-flow: column wrap; align-content: start;"> ' . $key . " x" . $value . " </div>"; -->
		<?php
        }
	}
    echo "</table>";
}

?>
