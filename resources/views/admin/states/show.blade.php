@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.state.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.states.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.id') }}
                        </th>
                        <td>
                            {{ $state->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name') }}
                        </th>
                        <td>
                            {{ $state->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.code') }}
                        </th>
                        <td>
                            {{ $state->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.uf') }}
                        </th>
                        <td>
                            {{ $state->uf }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.states.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection