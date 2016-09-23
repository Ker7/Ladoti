@extends('layouts.dlayout')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                    {{ Form::Model( Auth::user(), ['route' => 'profile.update'] ) }}
                    {{ Form::hidden('form_name', 'profile_update') }}
                    {{ method_field('PUT') }}
                    {{ Form::text('name') }}
                    {{ Auth::user()->email }}
                    {{ Auth::user()->updated_at }}
                    {{ Form::submit('Save') }}
                    {{ Form::close() }}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
