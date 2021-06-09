<?php include ('connection.php'); ?>

<?php
$table = $_POST['table'];

$sql2 = "SELECT dateId, logDate, logTime, weight, reps, diff FROM $table";
$result = $con->query($sql2);
if($result==TRUE){
$exJSON = json_encode($result->fetch_all());
}else{
  $exJSON = 'null';
}
?>

<script>
if('<?php echo $exJSON ?>' != 'null' && '<?php echo $exJSON ?>' != '[]'){
      var exJSON = '<?php echo $exJSON ?>';
      var exObj = JSON.parse(exJSON);
      var lastDate = exObj[0][1];
      $('.exHistory ul').remove();
      $('.exHistory').append(`<ul class = 'dateLog ${lastDate.split('/').join('')}'><date>${lastDate}</date></ul>`);

      var chartId = [];
      var chartDate = [];
      var chartTime = [];
      var chartWeight = [];
      var chartReps = [];

      var setNum = 1;

      for(var j = 0; j<exObj.length; j++){
        if(exObj[j][1] != lastDate){
          lastDate = exObj[j][1];
          setNum = 1;
          $('.exHistory').append(`<ul class = 'dateLog ${lastDate.split('/').join('')}'><date>${lastDate}</date></ul>`);
        }
                  switch (exObj[j][5]) {
                    case 'blue':
                      var diffColor = 'rgb(59, 173, 227)';
                    break;
                    case 'ltpurple':
                      var diffColor = 'rgb(87, 111, 230)';
                    break;
                    case 'purple':
                      var diffColor = 'rgb(152, 68, 183)';
                    break;
                    case 'pink':
                      var diffColor = 'rgb(255, 53, 127)';
                    break;
                  }

                  $(`.${exObj[j][1].split('/').join('')}`).append(`
                  <ul class = 'timeLog' id='${exObj[j][0]}'>
                  <li>${exObj[j][2]}</li>
                  <li>Set ${setNum}</li>
                  <li>${exObj[j][3]} kg</li>
                  <li style='border-color: ${diffColor}'>${exObj[j][4]} reps</li>
                  </ul>`);

                  setNum++;

        chartId.push(exObj[j][0]);
        chartDate.push(exObj[j][1]);
        chartTime.push(exObj[j][2]);
        chartWeight.push(exObj[j][3]);
        chartReps.push(exObj[j][4]);
      }

      setCombinedGraph(chartId, chartDate, chartTime, chartWeight, chartReps);
}else{
    $('.exHistory ul').remove();
    $('.exChart').addClass('hide');
    $('.exLegend').addClass('hide');
    $('.exPlaceholder').removeClass('hide');
    var chartId = [];
    var chartDate = [];
    var chartTime = [];
    var chartWeight = [];
    var chartReps = [];
  }
</script>
