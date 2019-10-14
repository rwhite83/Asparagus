$(document).ready(function() {

    $.getJSON('includes/stats.inc.php', function(data) {
        // bar chart (each item)
        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: "'" + data["username"] + "'s" + " food consumption habits"
            },
            xAxis: {
                categories: data["foodname"]
            },
            yAxis: {
                min: 0,
                title: {
                text: 'Food consumption for each item'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            color: 'black'
                        }
                    }
                },
                series: {
                stacking: 'normal'
                },
            },
            series: [{
                name: 'Wasted',
                data: data["totalwasted"],
                color: '#ff794d'
            }, {
                name: 'Consumed',
                data: data["totalbought"],
                color: '#53d926'
            }]
        });

            
        console.log(data);

        var j=k=0;
        for(var i=0; i < data["foodname"].length; i++){
            j += data["totalbought"][i];
            k += data["totalwasted"][i];
        }
        
        var food = data["totalconsumed"];

        console.log(food);
            
        //pie chart(each item consumption)
        var options = {
                chart: {
                    renderTo: 'container1',
                    type: 'pie'
                },
                title: {
                text: "'" + data["username"] + "'s" + " each food used habits"
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme 
                                && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
                series: [{}]
            };

                options.series[0].data = data["totalconsumed"];
                var chart = new Highcharts.Chart(options);

        //pie chart(total consumption)
        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: "'" + data["username"] + "'s" + " total food consumption habits"
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme 
                                && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                data: [{
                    name: 'Bought',
                    y: j,
                    color: '#53d926'
                }, {
                    name: 'Wasted',
                    y: k,
                    color: '#ff794d'
                }]
            }]
        });
    });      
});
