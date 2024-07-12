@extends('layouts.admin')

@section('content')
    @can('city_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.city.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'City', 'route' => 'admin.cities.parseCsvImport'])
        </div>
    </div>
@endcan

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.city.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-City">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.city.fields.name') }}</th>
                            <th>{{ trans('cruds.city.fields.state') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $key => $city)
                            <tr data-entry-id="{{ $city->id }}">
                                <td>{{ $city->name ?? '' }}</td>
                                <td>{{ $city->state->name ?? '' }}</td>
                                <td>
                                    @can('city_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.cities.show', $city->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('city_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.cities.edit', $city->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('city_delete')
                                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                {!! $cities->links() !!}
            </div>
        </div>
    </div>
@endsection
