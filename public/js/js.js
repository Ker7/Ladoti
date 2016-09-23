$( document ).ready(function() {
    console.log( "ready!" );
    
    var ctx = document.getElementById("fieldCircle");
    var myChart = new Chart(ctx, {
        type: "polarArea",
        data: {
            labels: ["Sotsialiseeriumine", "Finants", "Muusika", "Programmeerimine", "Tervis", "Töö", "Vaimsus", "Tühjus"],
            ids: [1, 2, 3, 4, 5, 6, 7, 8],
            datasets: [{
                label: "S", // for legend
                data: [100,26,100,30,100,49,100,50],
                backgroundColor: [
                  "#FF6384",
                  "#4BC0C0",
                  "#FFCE56",
                  "#E7E9ED",
                  "#36A2EB",
                  "#FFCE56",
                  "#E7E9ED",
                  "#E7E9ED"
                ],
                hoverBackgroundColor: [
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)',
                  'rgba(0, 0, 0, 0.2)'  
                ],
                borderWidth: 0
            }]
            },
        options: {
            hover: {
                mode: 'single',
                animationDuration: 400                
            },
            animation: {
                duration: 400,
                easing: 'linear'
            },
            tooltips: {
                bodyFontFamily: "Lato",//Lucida Sans Unicode, Lucida Grande, sans-serif",
                bodyFontSize: 14,
                yPadding: 10
            },
            title: {
                text: "Tere"
            },
            legend: {
                display: false
            },
            elements: {
                arc: {
                    borderColor: "#000000"
                }
            },
            scale: {
                display: true,
                lineArc: true,   //Default is True!
                drawBorder: true,
                drawOnChartArea: false,
                ticks: {
                    display: false,
                    min: 0,
                    stepSize: 25,
                    max: 100
                }
            }
        }
    });
    
    $( "#fieldCircle" ).click(function(evt){
        var activePoints = myChart.getElementAtEvent(evt);           
        /* do something */
        //console.log(activePoints.toSource());
        //console.log(activePoints['_index ']);
        var firstPoint = activePoints[0];
        if (firstPoint !== undefined)
        
            t1 = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];   // Field väärtus
            t2 = myChart.data.labels[firstPoint._index];                                    // Fieldi nimi
            t3 = myChart.data.ids[firstPoint._index];                                       // Fieldi ID
            
alert(t1+' / '+t2+' /data:'+t3);

            //console.log(myChart.data.datasets[firstPoint._datasetIndex].data['labels'].toSource());
            //alert(firstPoint._datasetIndex + "/" + firstPoint._index);
    });
});

$('#modal-save').on('click', function() {
   console.log('hit!');
});

