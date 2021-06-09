<?php include ('connection.php'); ?>

<?php
$id = $_POST['id'];
$table = $_POST['table'];
$weight = $_POST['weight'];
$reps = $_POST['reps'];

$finish = 'false';

        $sql2 = "UPDATE $table SET reps='$reps', weight='$weight' WHERE dateId='$id'";
        if ($con->query($sql2) === TRUE) {
          echo "done";
          $finish = 'true';
        } else {
          echo "Error updating record: " . $con->error;
        }

?>
<script>
if(`<?php echo $finish ?>` == 'true'){
  setHistory();
}
</script>
