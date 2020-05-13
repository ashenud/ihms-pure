function drawGrowthF24mChart(){
    
    var chartData;
    
    var childDataWeight = {
        label: ['බර'],
        yAxisID: 'A',
        data: [weight],
        fill: false,
        backgroundColor: 'rgba(0, 16, 85, 1)',
        borderColor: 'rgba(0, 16, 85, 1)',
        lineTension: 0,
        borderWidth: 2,
        pointRadius: 3,

    };
    
    var childDataHeight = {
        label: ['උස'],
        yAxisID: 'B',
        data: [height],
        fill: false,
        backgroundColor: 'rgba(0, 16, 85, 1)',
        borderColor: 'rgba(0, 16, 85, 1)',
        lineTension: 0,
        borderWidth: 2,
        pointRadius: 3,
    };
    
    $.ajax({
        url: '/data/growth-chart-firstyear.json',
        method: "GET",
    }).done(function (json, status) {
        
        if (status === "success" && json.hasOwnProperty("data")) {
            
            
            
            if (gen == 'male') {
                chartData = json.data.male;
            } else {
                chartData = json.data.female;
            }
            
            var datasets = chartData.datasets;
            chartData.datasets.push(childDataWeight);
            chartData.datasets.push(childDataHeight);
            
                        
            Chart.defaults.global.defaultFontFamily = 'Helvetica';
            Chart.defaults.global.defaultFontFamily = 'abhaya';
            var growthChart24months = {
                type: ['line'],
                data: chartData,
                options: {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [ 
                            {
                                id: 'A',
                                type: 'linear',
                                position: 'left',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "බර (කි. ග්‍රෑ.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            },

                            {
                                id: 'B',
                                type: 'linear',
                                position: 'right',
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true,
                                    min: 20,
                                    max: 120,
                                    stepSize: 2,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "උස (සෙ.මි.)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }

                        ],
                        xAxes: [ 
                            {
                                ticks: {
                                    fontSize: 6,
                                    stepSize: 1,
                                    fontFamily: 'Helvetica',
                                    fontColor: '#000',
                                    maxRotation: 0,
                                },
                                gridLines: {
                                    lineWidth: 1,
                                    color: 'rgba(0, 0, 0, 0.2)',
                                    z: 1
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "වයස (මාස)",
                                    fontColor: '#000',
                                    fontSize: 14,
                                }
                            }]
                    },
                    tooltips: false,
                    responsive: true      
                }
            }

            var ctxgrowthChart24months = document.getElementById('growth-chart-24').getContext('2d');
            new Chart(ctxgrowthChart24months, growthChart24months);
            
        } else {
            console.error("data Failed");
        }
        
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("data Failed");
    });
    
}