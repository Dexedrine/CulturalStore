<?php

echo("Début de l'opération de report\n");

echo("Connection à la base de données...");
$conn_string = "host=localhost port=5432 dbname=postgres user=postgres password=root";
$dbconn = pg_connect($conn_string)
	or die('Connexion à la base impossible: ' . pg_last_error());
echo("Succès!\n\n");

//ouverture du fichier csv
echo("Ouverture du fichier : clients.csv\n");

if (($handle = fopen("clients.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$result = pg_query($dbconn, "INSERT INTO client_prospect(firstname, name, mail) VALUES('".$data[0]."', '".$data[1]."' ,'".$data[2]."');");
		var_dump($result);
	}
	fclose($handle);
}


echo("\nFin de l'opération de report\n");

// Closing connection
pg_close($dbconn);

?>