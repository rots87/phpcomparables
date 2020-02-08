function graficar(params) {
    var ctx = document.getElementById('grafico').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo(json_encode($estatus, JSON_PRETTY_PRINT)) ?> ,
            datasets: [{
                label: 'Estudios de Precios',
                data: <?php echo(json_encode($valores, JSON_PRETTY_PRINT)) ?> ,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(51, 255, 102, 0.2)',
                    'rgba(153, 0, 0, 0.2)',
                    'rgba(0, 0, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(51, 255, 102, 1)',
                    'rgba(153, 0, 0, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'Estatus de EPT <?php echo($anio) ?>'
            }

        }
    });
}
