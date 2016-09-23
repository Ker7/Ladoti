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
                        @foreach ($userFields as $userField)
                            <tr>
                                <td>{{ $userField->getField->name }}</td>
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

                </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
