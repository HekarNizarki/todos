//setup
const data1 = {
    labels: ['2016', '2017', '2018', '2019', '2020'],
    datasets: [{
        label: 'Number If Accidents from (2016 to 2020)',
        data: [53453856, 140130614, 245362560, 1157296843, 899176247],
        borderWidth: 3,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
    }]
};

//config 
const config2 = {
    type: 'bar',
    data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

//render
const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2);