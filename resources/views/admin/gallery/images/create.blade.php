@extends('adminlte::page')

@section('title', 'Bulk Upload Photos')

@section('content_header')
    <h1>Bulk Upload Photos</h1>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('gallery-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group border-bottom pb-4">
                    <label for="category_id">Select Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control form-control-lg select2" required>
                        <option value="">-- Choose a Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Photos will be grouped under this category.</small>
                </div>

                <div class="form-group mt-4">
                    <label for="images">Choose Multiple Photos <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" name="images[]" class="custom-file-input" id="images" multiple required accept="image/*">
                        <label class="custom-file-label" for="images">Click to select files...</label>
                    </div>
                    <small class="text-info mt-2 d-block">
                        <i class="fas fa-info-circle mr-1"></i> You can select multiple images at once. Supported formats: JPG, PNG, WEBP.
                    </small>
                </div>
                
                <div id="image-preview" class="row mt-4"></div>
            </div>
            <div class="card-footer bg-white border-top">
                <button type="submit" class="btn btn-success btn-lg px-5">
                    <i class="fas fa-upload mr-2"></i> Start Bulk Upload
                </button>
                <a href="{{ route('gallery-images.index') }}" class="btn btn-link text-muted">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@push('js')
<script>
    // Show selected filenames in custom file input
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var files = e.target.files;
        var fileName = files.length > 1 ? files.length + " files selected" : files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;

        // Preview images
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(event) {
                const col = document.createElement('div');
                col.className = 'col-md-2 mb-3';
                col.innerHTML = `
                    <div class="card h-100 shadow-sm border-0">
                        <img src="${event.target.result}" class="card-img-top rounded object-fit-cover" style="height: 100px;">
                    </div>
                `;
                preview.appendChild(col);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

@push('css')
<style>
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush
