<?php include ('connection.php'); ?>

<?php
$id = $_POST['id'];
$table = $_POST['table'];

$finish = 'false';

$sql = "DELETE FROM $table WHERE dateId='$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  $finish = 'true';
} else {
  echo "Error deleting record: " . $con->error;
  $finish = 'true';
}

?>
<script>
if(`<?php echo $finish ?>` == 'true'){
  setHistory();
}
</script>
