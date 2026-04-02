@extends('adminlte::page')

@section('title', 'Manage Gallery Images')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Manage Gallery Images</h1>
        <a href="{{ route('gallery-images.create') }}" class="btn btn-primary">Bulk Upload Photos</a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-sm-3 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="position-relative overflow-hidden" style="height: 180px;">
                                <img src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}" class="card-img-top w-100 h-100 object-fit-cover" alt="Gallery Image">
                                <div class="position-absolute top-0 right-0 p-2">
                                    <form action="{{ route('gallery-images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body py-2 px-3">
                                <span class="badge badge-info">{{ $image->category->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($images->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No images found. Start by uploading some.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('css')
<style>
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush
