<main class="container">
  <h1>Статистика</h1>

  <div>
    <canvas id="chart"></canvas>
    <canvas id="pieChart"></canvas>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">

</script>
<script>
  (() => {
    const ctx = document.getElementById('pieChart')
    const data = {
      labels: [
        <?php echo ($data['pie_chart']['city']) ?>
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [<?php echo ($data['pie_chart']['count_users']) ?>],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    };
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
      type: 'doughnut',
      data: data,
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Статистика по городам'
          }
        },
      }
    })
  })();

  (() => {
    const ctx = document.getElementById('chart')
    const data = {
      labels: [<?php echo ($data['chart']['hour']) ?>],
      datasets: [{
        label: 'Количество посещений',
        data: [<?php echo ($data['chart']['number_of_times']) ?>],
        hoverOffset: 4
      }]
    };
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Количество посещений за каждый час, за сутки'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    })
  })()
</script>