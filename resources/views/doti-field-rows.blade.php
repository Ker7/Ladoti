<div class="home-fields-cont">
    @foreach ($userFields as $kei => $userField)
    <div class="home-field-row" data-row-fieldid="{{ $userField->id }}" style="display:none;">
        <table>
        <tbody>
        <tr>
            <td>Field name</td>
            <td>Active</td>
            <td>Public</td>
            <td>Created at</td>
        </tr>
        <tr>
            <td>{{ $userField->getField->id }} :: {{ $userField->getField->name }}</td>
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
            <td>
                {{ Form::open() }}
                {{ Form::hidden('form_name', 'field_public') }}
                {{ Form::hidden('field_id', $userField->id) }}
                {{ method_field('PATCH') }}
                    <input
                        type="checkbox"
                        name="field"
                        onClick="this.form.submit()"
                        {{ $userField->public?'checked':'' }}
                    />
                {{ Form::close() }}
            </td>
            <td>{{ $userField->created_at }}</td>
        </tr>
        </tbody>
        </table>
    </div>
    @endforeach
</div>