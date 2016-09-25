@extends('layouts.dlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                    
                <div class="panel-body">
                <h3>User has fields:</h3>
                
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Clicked</td>
                            <td>Active</td>
                            <td>Last Updated</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        Kaunter: {{ count($userFields) }}
                    
                        @foreach ($userFields as $kei => $userField)
                            
                            

                            <tr>
                                <td>{{ $kei }} :: {{ $userField->getField->name }}</td>
                                <td>
                                    {{ Form::open() }}
                                    {{ Form::hidden('form_name', 'field_clicked') }}
                                    {{ Form::hidden('field_id', $userField->id) }}
                                    {{ method_field('PATCH') }}
                                        <input
                                            type="checkbox"
                                            name="field"
                                            onClick="this.form.submit()"
                                            {{ $userField->clicked?'checked':'' }}
                                        />
                                    {{ Form::close() }}
                                </td>
                                <td>
                                    {{ Form::open() }}
                                    {{ Form::hidden('form_name', 'field_active') }}
                                    {{ Form::hidden('field_id', $userField->id) }}
                                    {{ method_field('PATCH') }}
                                        <input
                                            type="checkbox"
                                            name="field"
                                            onClick="this.form.submit()"
                                            {{ $userField->active?'checked':'' }}
                                        />
                                    {{ Form::close() }}</td>
                                <td>{{ $userField->updated_at }}</td>
                            </tr>
                        @endforeach
                        <tr>
                        </tr>
                    </tbody>
                </table>
                            {{ Form::Model( App\User::find(2), ['route' => ['profile.update', '234' ]] ) }}
                            {{ method_field('PUT') }}
                            {{ Form::text('name') }}
                            {{ Form::hidden('form_name', 'tere') }}
                            {{ Form::text('email') }}
                            {{ Form::checkbox('active') }}
                            {{ Auth::user()->name }}
                            {{ Form::text('updated_at') }}
                            {{ Form::submit('Save') }}
                            {{ Form::close() }}
                <ul>

                </ul>
                <div class="doti-main-circle">
                    <canvas id="fieldCircle" width="400" height="400" ></canvas>
                </div>
                <script>
console.log( "jQ!" );
$( document ).ready(function() {
console.log( "ready!" );
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    var r = parseInt(result[1], 16);
    var g = parseInt(result[2], 16);
    var b = parseInt(result[3], 16);
    var a = 128;
    var str = "rgba("+r+","+g+","+b+","+a+")";
    return result ? str : null;
}
function makeTransparent(str){
    return str.replace(/[^,]+(?=\))/, '0.7');
}
var ctx = document.getElementById("fieldCircle");
//var atv = var c1 = hexToRgb("#FF6384");
//console.log(atv);

//var idForField = [1, 2, 3, 4, 5, 6, 7, 8];
//var nameForField = ["Sotsialiseeriumine", "Finants", "Muusika", "Programmeerimine", "Tervis", "Töö", "Vaimsus", "Tühjus"];
//var dataForField = [100,26,100,30,100,49,100,50];
//var colorArray = ["#FF6384","#4BC0C0","#9476AB","#E7E9ED","#36A2EB","#D4BA6A","#420029","#E7E9ED"];

var idForField = [
    @foreach ($userFields as $kei => $userField)
        {{ $userField->id }} {{ (($kei+1) == count($userFields) ) ? "" : "," }}
    @endforeach
];
var nameForField = [
    @foreach ($userFields as $kei => $userField)
        {!! '"'.$userField->getField->name.'"' !!} {{ (($kei+1) == count($userFields) ) ? "" : "," }}
    @endforeach
];
var dataForField = [
    @foreach ($userFields as $kei => $userField)
        {{ mt_rand(20,80) }} {{ (($kei+1) == count($userFields) ) ? "" : "," }}
    @endforeach
];
var colorArray = [
    @foreach ($userFields as $kei => $userField)
        {!! '"'.$userField->getField->color.'"' !!} {{ (($kei+1) == count($userFields) ) ? "" : "," }}
    @endforeach
];

var highLightColorArray = [];   //Transplate
for (i = 0; i < colorArray.length; i++) {
    highLightColorArray.push(makeTransparent(hexToRgb(colorArray[i])));
}

myChart = new Chart(ctx, {
    type: "polarArea",
    data: {
        labels: nameForField,
        ids: idForField,
        datasets: [{
            label: "S", // for legend
            data: dataForField,
            backgroundColor: colorArray,
            hoverBackgroundColor: highLightColorArray,
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
            display: true,
            fullWidth: false,
            labels: {
                boxWidth: 12
            }
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
            drawOnChartArea: true,
            ticks: {
                display: false,
                min: 0,
                stepSize: 25,
                max: 100
            }
        }
    }
});
    

    /*
    console.log(hexToRgb("#FF6384").replace(/[^,]+(?=\))/, '64'));
    console.log(hexToRgb("#4BC0C0"));
    console.log(makeTransparent(hexToRgb("#9576AB")));
    console.log(hexToRgb("#E7E9ED"));
    console.log(hexToRgb("#36A2EB"));
    console.log(hexToRgb("#D4BA6A"));
    console.log(hexToRgb("#420029"));
    console.log(hexToRgb("#E7E9ED"));
    
    console.log(colorArray.toString());
    console.log(newHigh.toString());
    */
});
                </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
