@extends('layouts.admin')

@section('page-title', 'Add Car')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.cars.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Car</h2>
        <p class="admin-page-subtitle">Create a new luxury car for frontend listing and detail page</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.cars._form', ['car' => new \App\Models\Car()])

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
        <a href="{{ route('admin.cars.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
