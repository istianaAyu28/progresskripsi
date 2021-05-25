const pizza_input = document.querySelector('.pizza-input');
const burger_input = document.querySelector('.burger-input');
const steak_input = document.querySelector('.steak-input');

var ctx = document.getElementById("PieChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pizza','Steak','Burger'],
        datasets: [
            {
                label: '# of Votes',
                data: [ 10, 10, 10],
                backgroundColor: ['#4572E', '#17BEBB', '#FFC914'],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
});

const updateChartValue = (input, dataOrder) => {
    input.addEventListener('change', e => {
        myChart.data.datasets[0].data[dataOrder] = e.target.value;
        myChart.update();
    });
};

updateChartValue(pizza_input, 0);
updateChartValue(steak_input, 1);
updateChartValue(burger_input, 2);