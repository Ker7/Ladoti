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