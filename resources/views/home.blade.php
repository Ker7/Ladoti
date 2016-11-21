@extends('layouts.dlayout')

@section('content')
    
<div class="container">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" style="color:#fff;"><i class="fa fa-btn fa-clone"></i>New Field</a>
                    {{ Auth::user()->name }}, {{ $specialWelcome }}
                </div>
 
<!--                <div id="main-message-div" class="panel-body">
                    You are logged in!
                </div>-->
                    
                <div class="panel-body">

                    {{-- With $userFields var from HomeController@index --}}
                    @include('doti-circle')
                    
                    {{-- With $userFields var from HomeController@index --}}
                    {{-- @include('doti-field-rows') --}}
                    
                    <div id="ajax-box" style="display: inline-block;"></div>
                    
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
