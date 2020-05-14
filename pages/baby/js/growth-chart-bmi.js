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

        var childDataBmi = {
            type: 'scatter',
            label: ['බර'],
            data: [{
                x: 10,
                y: 5
            }, {
                x: 15,
                y: 10
            }, {
                x: 15,
                y: 15
            }],
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 2,
        };

        $.ajax({
            url: '/data/growth-chart-bmi-f24.json',
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {



                if (gen == 'male') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataBmi);

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
                                        max: 25,
                                        min: 1,
                                        beginAtZero: true,
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
                                        labelString: "දිග (සෙ.මී.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }]
                        },
                        tooltips: false,
                        responsive: true      
                    }
                }

                var ctxgrowthChart24months = document.getElementById('growth-chart-bmi').getContext('2d');
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

        var childDataBmi = {
            type: 'scatter',
            label: ['බර'],
            data: [{
                x: 45,
                y: 10
            }, {
                x: 55,
                y: 12
            }, {
                x: 75,
                y: 18
            }],
            backgroundColor: 'rgba(0, 16, 85, 1)',
            borderColor: 'rgba(0, 16, 85, 1)',
            lineTension: 0,
            borderWidth: 2,
            pointRadius: 2,
        };

        $.ajax({
            url: '/data/growth-chart-bmi-l36.json',
            method: "GET",
        }).done(function (json, status) {

            if (status === "success" && json.hasOwnProperty("data")) {



                if (gen == 'male') {
                    chartData = json.data.male;
                } else {
                    chartData = json.data.female;
                }

                var datasets = chartData.datasets;
                chartData.datasets.unshift(childDataBmi);


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
                                        max: 31,
                                        min: 5,
                                        beginAtZero: true,
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
                                        labelString: "උස (සෙ.මී.)",
                                        fontColor: '#000',
                                        fontSize: 14,
                                    }
                                }]
                        },
                        tooltips: false,
                        responsive: true      
                    }
                }

                var ctxgrowthChart24months = document.getElementById('growth-chart-bmi').getContext('2d');
                new Chart(ctxgrowthChart24months, growthChart24months);

            } else {
                console.error("data Failed");
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("data Failed");
        });

    }
});
