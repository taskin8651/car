@extends('layouts.admin')

@section('page-title', 'Testimonials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Testimonials</h2>
        <p class="admin-page-subtitle">Manage customer reviews shown on index page</p>
    </div>

    <a href="{{ route('admin.testimonials.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Testimonials</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Active testimonials appear on homepage</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Testimonial">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Event</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr data-entry-id="{{ $testimonial->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $testimonial->id }}</span></td>
                        <td><p class="table-main-text">{{ $testimonial->client_name }}</p></td>
                        <td>{{ $testimonial->event_type }}</td>
                        <td>{{ $testimonial->rating }}/5</td>
                        <td>{{ $testimonial->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
