$(document).ready(function() {
    
    $(".change-btn").click(function(e){
        e.preventDefault();

        var type = $(this).data("type");
        
        if(type == "f24m"){
            drawGrowthF24mChart();
        }else{
            drawGrowthL36mChart();
        }
        
    });
    

    var initialChart = "f24m";

    if(initialChart == "f24m"){
        drawGrowthF24mChart();
    }else{
        drawGrowthL36mChart();
    }


    function drawGrowthF24mChart() {

        var chartData;

        var childDataWeight = {
            label: ['බර'],
            yAxisID: 'A',
            data: weightF24,
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
            data: heightF24,
            fill: false,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 3,
        };

        $.ajax({
            url: '/data/growth-chart-weight-f24.json',
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {



                if (gen == 'male') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataWeight);
                //chartData.datasets.push(childDataHeight);


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
                                        stepSize: 0.5,
                                        callback: function (value, index, values) {
                                            if (value % 1 === 0) {
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
                                        labelString: "බර (කි. ග්‍රෑ.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }
                            ],
                            xAxes: [ 
                                {
                                    ticks: {
                                        fontSize: 10,
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

                var ctxgrowthChart24months = document.getElementById('growth-chart-weight').getContext('2d');
                new Chart(ctxgrowthChart24months, growthChart24months);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }

    function drawGrowthL36mChart(){

        var chartData;

        var childDataWeight = {
            label: ['බර'],
            yAxisID: 'A',
            data: weightL36,
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
            data: heightL36,
            fill: false,
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 3,
        };

        $.ajax({
            url: '/data/growth-chart-weight-l36.json',
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {



                if (gen == 'male') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataWeight);
                //chartData.datasets.push(childDataHeight);


                Chart.defaults.global.defaultFontFamily = 'Helvetica';
                Chart.defaults.global.defaultFontFamily = 'abhaya';
                var growthChartL36months = {
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
                                        min: 8,
                                        stepSize: 0.5,
                                        callback: function (value, index, values) {
                                            if (value % 1 === 0) {
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
                                        labelString: "බර (කි. ග්‍රෑ.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }
                            ],
                            xAxes: [ 
                                {
                                    ticks: {
                                        fontSize: 10,
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

                var ctxgrowthChartL36months = document.getElementById('growth-chart-weight').getContext('2d');
                new Chart(ctxgrowthChartL36months, growthChartL36months);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }
});
