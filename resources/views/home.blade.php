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

                </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
