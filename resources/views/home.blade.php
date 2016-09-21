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
                            {{ Form::open(['action' => 'HomeController@postIndex']) }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input
                                    type="checkbox"
                                    name="field_id"
                                    onClick="this.form.submit()"
                                    value="{{ $userField->id }}"
                                    {{ $userField->clicked?'checked':'' }}
                                />
                                <p style="display: inline;">{{ $userField->name }}</p>
                            {{ Form::close() }}
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
