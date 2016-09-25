

var myChart;

$('#modal-save').on('click', function() {
   console.log('hit!');
});

function componentToHex(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
}

function rgbToHex(r, g, b) {
    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

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