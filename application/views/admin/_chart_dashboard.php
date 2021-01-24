<?php
  $groupTraining = [];
  $groupTesting = [];
  foreach($training as $val){
    $groupTraining[$val['kelas']] = $val['total'];
  };
  foreach($testing as $val){
    $groupTesting[$val['kelas']] = $val['total'];
  };
?>
<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
<script>
  data = {
    labels: ["Data Latih", "Data Uji"],
    datasets: [
      {
        label: "IPA",
        backgroundColor: "rgba(80, 80, 200, 0.7)",
        borderWidth: 1.0,
        data: [<?= $groupTraining['MIPA'] ?>, <?= $groupTesting['MIPA'] ?>]
      },
      {
        label: "IPS",
        backgroundColor: "rgba(80, 200, 80, 0.7)",
        borderWidth: 1.0,
        data: [<?= $groupTraining['IPS'] ?>, <?= $groupTesting['IPS'] ?>]
      }
    ],

  }
  var ctx = document.getElementById('dashchart').getContext('2d');
  window.myBar = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'top'
      },
      title: {
        display: true,
        text: 'Jumlah Data'
      },
      responsive: true,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }
  });
</script>