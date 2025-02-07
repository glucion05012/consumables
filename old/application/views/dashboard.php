<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="content-wrapper">
<!-- <?php foreach($stockList as $cl){ if(intval($cl['rate']) <= intval($cl['threshold'])){ echo $cl['product']; }}; ?> -->


<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<?php

$test = array();
$odi = array();

foreach($stockList as $cl){
  if(intval($cl['rate']) <= intval($cl['threshold'])){
    array_push($test, array("label"=> $cl['product'], "y"=>  $cl['rate']));
  }
}

foreach($stockList as $cl){
  if(intval($cl['rate']) <= intval($cl['threshold'])){
    $thres = intval($cl['threshold']) - intval($cl['rate']);
    array_push($odi, array("label"=> $cl['product'], "y"=>  $thres));
  }
}


?>
</div>

<script>
  window.onload = function () {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
      text: "Stocks below Threshold"
    },
    axisX:{
      reversed: true
    },
    axisY:{
      includeZero: true
    },
    toolTip:{
      shared: true
    },
    data: [{
      type: "stackedBar",
      name: "Available Stock",
      dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
    },{
      type: "stackedBar",
      name: "For Replenish",
      dataPoints: <?php echo json_encode($odi, JSON_NUMERIC_CHECK); ?>,
      indexLabel: "#total",
      indexLabelPlacement: "outside",
    }]
  });
  chart.render();
  
  }
</script>