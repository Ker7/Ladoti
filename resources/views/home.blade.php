@extends('layouts.dlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div id="main-message-div" class="panel-body">
                    You are logged in!
                </div>
                    
                <div class="panel-body">
                
                <table>
                    <thead>
                        <tr>
                            <td>Field name</td>
                            <td>Clicked</td>
                            <td>Active</td>
                            <td>Last Updated</td>
                        </tr>
                    </thead>
                    <tbody>

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

                    </tbody>
                </table>

                @include('doti-circle')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
