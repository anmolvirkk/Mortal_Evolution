<?php include ('connection.php'); ?>

<?php
$table = $_POST['table'];
$dateId = $_POST['dateId'];
$logDate = $_POST['logDate'];
$logTime = $_POST['logTime'];
$weight = $_POST['weight'];
$reps = $_POST['reps'];
$diff = $_POST['diff'];

$finish = 'false';

      $sql3 = "INSERT INTO $table (dateId, logDate, logTime, weight, reps, diff) VALUES ('$dateId', '$logDate', '$logTime', '$weight', '$reps', '$diff')";
      if ($con->query($sql3) === TRUE) {
          $finish = 'true';
      } else {
        echo "Error: " . $sql3 . "<br>" . $con->error;
      }

      $sql2 = "SELECT logDate FROM $table";
      $result = $con->query($sql2);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        }
      }

      if($con->query($sql2)===TRUE){
      echo "DATA updated";
      }else{
      $sql = "CREATE TABLE $table (dateId VARCHAR(255), logDate VARCHAR(255), logTime VARCHAR(255), weight VARCHAR(255), reps VARCHAR(255), diff VARCHAR(255))";
      if ($con->query($sql) === TRUE) {
        $sql3 = "INSERT INTO $table (dateId, logDate, logTime, weight, reps, diff) VALUES ('$dateId', '$logDate', '$logTime', '$weight', '$reps', '$diff')";
        if ($con->query($sql3) === TRUE) {
          $finish = 'true';
        } else {
          echo "Error: " . $sql3 . "<br>" . $con->error;
        }
      } else {
        echo "Error creating table: " . $con->error;
      }
    }

?>
<script>
if(`<?php echo $finish ?>` == 'true'){
  setHistory();
}
</script>
