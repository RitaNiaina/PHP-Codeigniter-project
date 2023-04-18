<div>
<?php echo view('/interface.php');?>
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="Chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
    var province=[];
    var prix=[];
  <?php if($client): foreach($client as $user): ?>
    province.push('<?=$user['province']?>');
    prix.push(<?=$user['prix']?>);
  <?php endforeach; endif; ?>
    new Chart(ctx, {
      type: 'bar',
      data: {

    labels: province,
        datasets: [{
          // label: province,
          data: prix,
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)',
        'dark'
      ]
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>