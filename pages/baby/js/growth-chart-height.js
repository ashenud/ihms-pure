$(document).ready(function() {

    drawHeightChart();

    function drawHeightChart() {
        

        var chartData;

        var childDataHeight = {
            label: ['උස'],
            yAxisID: 'A',
            data: height,
            fill: false,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 3,
        };

        $.ajax({
            url: '/data/growth-chart-height.json',
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {



                if (gen == 'male') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataHeight);
                console.log(chartData);


                Chart.defaults.global.defaultFontFamily = 'Helvetica';
                Chart.defaults.global.defaultFontFamily = 'abhaya';
                var growthChartHeight = {
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
                                        min: 20,
                                        max: 120,
                                        stepSize: 1,
                                        callback: function (value, index, values) {
                                            if (value % 2 === 0) {
                                                return value;
                                            } else {
                                                return ' ';
                                            }
                                        },
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

                var ctxgrowthChartHeight = document.getElementById('growth-chart-height').getContext('2d');
                new Chart(ctxgrowthChartHeight, growthChartHeight);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }

});
