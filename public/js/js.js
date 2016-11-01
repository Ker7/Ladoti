

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

// Ajax tooken!
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( "#fieldCircle" ).click(function(evt){
    var activePoints = myChart.getElementAtEvent(evt);
    
    var firstPoint = activePoints[0];
    if (firstPoint !== undefined)
    
        t1 = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];   // Field väärtus
        t2 = myChart.data.labels[firstPoint._index];                                    // Fieldi nimi
        t3 = myChart.data.ids[firstPoint._index];                                       // Fieldi ID

    /* Leia Fieldi rida, mis on peidetult html'is.
     *
     * Kui sama field on  juba nähtaval, siis ei tee midagi...
     */
    if ($("div").find("[data-row-fieldid='" + t3 + "']").css('display') == "none") {
        $(".home-field-row:visible").each(function(){
            $(this).slideToggle();
        });
        $("div").find("[data-row-fieldid='" + t3 + "']").slideToggle(200);
    }

    // Teeme veidi AJAX'it kah
    $.ajax({
        type: "GET",
        url: "./home",    //"./home", sama asi, ei muutnud midagi
        //data: {selectedPhoneNumber:$('input#phoneNumber').val()},
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {userfield_id:    t3},
        success: function(adata) {
            //alert("Ajax SUCCESS?"+adata);
            console.log(adata.toString());
            $('#ajax-box').html(adata);
            
        }
    });
    return false;  // miks seda?
    
    
    //console.log(myChart.data.datasets[firstPoint._datasetIndex].data['labels'].toSource());
    //alert(firstPoint._datasetIndex + "/" + firstPoint._index);
});