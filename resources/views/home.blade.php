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
                    
                <ul>
                    @foreach ($userFields as $userField)
                        <li style="list-style-type: none;">
                            {{ Form::open() }}
                            {{ Form::hidden('form_name', 'field_clicked') }}
                            {{ Form::hidden('field_id', $userField->id) }}
                                <input
                                    type="checkbox"
                                    name="field"
                                    onClick="this.form.submit()"
                                    {{ $userField->clicked?'checked':'' }}
                                />
                                <p style="display: inline;">{{ $userField->name }}</p>
                            {{ Form::close() }}
                        </li>
                    @endforeach
                </ul>
                <div class="doti-main-circle">
                    <canvas id="fieldCircle" width="400" height="400" ></canvas>
                </div>
                <script>
                var ctx = document.getElementById("fieldCircle");
                var myChart = new Chart(ctx, {
                    type: "polarArea",
                    data: {
                        labels: ["Sotsialiseeriumine", "Finants", "Muusika", "Programmeerimine", "Tervis", "Töö", "Vaimsus", "Tühjus"],
                        datasets: [{
                            label: " ", // for legend
                            data: [100,26,100,30,104,49,100,50],
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
                            borderWidth: 0
                        }]
                        },
                    options: {
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
                            display: false,
                            lineArc: true   //Default is True!
                        }
                    }
                });
                //var data = {
                //    datasets: [{
                //        data: [
                //            11,
                //            16,
                //            7,
                //            3,
                //            14
                //        ],
                //        backgroundColor: [
                //            "#FF6384",
                //            "#4BC0C0",
                //            "#FFCE56",
                //            "#E7E9ED",
                //            "#36A2EB"
                //        ],
                //        label: 'My dataset' // for legend
                //    }],
                //    labels: [
                //        "Red",
                //        "Green",
                //        "Yellow",
                //        "Grey",
                //        "Blue"
                //    ]
                //};
                //var options = {
                //    elements: {
                //        arc: {
                //            borderColor: "#000000"
                //        }
                //    }
                //}
                //new Chart(ctx, {
                //    data: data,
                //    type: 'polarArea',
                //    options: options
                //});
                </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
