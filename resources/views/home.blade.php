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
                    
                @foreach ($userFields as $userField)
                    <p># {{ $userField->name }}</p>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
