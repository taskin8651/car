@extends('layouts.admin')

@section('page-title', 'Edit Car')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.cars.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Car</h2>
        <p class="admin-page-subtitle">Update car details, images and publish settings</p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar"><i class="fas fa-car-side"></i></div>
        <div>
            <p class="identity-title">{{ $car->name }}</p>
            <p class="identity-subtitle">ID #{{ $car->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.cars.update', $car) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('admin.cars._form')

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
            <a href="{{ route('admin.cars.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
        </div>

        @can('car_delete')
            <button type="submit" form="delete-car-form" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete Car</button>
        @endcan
    </div>
</form>

@can('car_delete')
    <form id="delete-car-form" action="{{ route('admin.cars.destroy', $car) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection
