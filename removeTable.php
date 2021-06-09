<?php include ('connection.php'); ?>

<?php

$table = $_POST['table'];

$sql = "DROP TABLE $table";

if ($con->query($sql) === TRUE) {

} else {

}

?>
