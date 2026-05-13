@extends('layouts.admin')

@section('page-title', 'Home Hero Slides')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Home Hero Slides</h2>
        <p class="admin-page-subtitle">Manage index page carousel slides</p>
    </div>

    <a href="{{ route('admin.home-hero-slides.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Slide</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Hero Slides</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Active slides appear on homepage</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-HomeHeroSlide">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($homeHeroSlides as $slide)
                    <tr data-entry-id="{{ $slide->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $slide->id }}</span></td>
                        <td><img src="{{ $slide->background_image_src }}" alt="{{ $slide->image_alt }}" style="width:80px;height:50px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb;"></td>
                        <td><p class="table-main-text">{{ $slide->title }} {{ $slide->title_highlight }}</p></td>
                        <td>{{ $slide->tag_title }}</td>
                        <td>{{ $slide->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.home-hero-slides.show', $slide) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('admin.home-hero-slides.edit', $slide) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{ route('admin.home-hero-slides.destroy', $slide) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
