@extends('layouts.dlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}, {{ $specialWelcome }}</div>
 
<!--                <div id="main-message-div" class="panel-body">
                    You are logged in!
                </div>-->
                    
                <div class="panel-body">

                    {{-- With $userFields var from HomeController@index --}}
                    @include('doti-circle')
                    
                    {{-- With $userFields var from HomeController@index --}}
                    @include('doti-field-rows')

                </div>
                
<iframe src="https://www.facebook.com/plugins/comment_embed.php?href=https%3A%2F%2Fwww.facebook.com%2Fdaniel.b.laing%2Fposts%2F10204774849290384%3Fcomment_id%3D1121428221275788&include_parent=false" width="560" height="121" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        
            </div>
        </div>
    </div>
</div>
@endsection
