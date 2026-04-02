@extends('adminlte::page')

@section('title', 'Edit FAQ')

@section('content_header')
    <h1>Edit FAQ</h1>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" id="question" value="{{ $faq->question }}" required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea name="answer" class="form-control" id="answer" rows="5" required>{{ $faq->answer }}</textarea>
                </div>
                <div class="form-group">
                    <label for="order_index">Order Index</label>
                    <input type="number" name="order_index" class="form-control" id="order_index" value="{{ $faq->order_index }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update FAQ</button>
                <a href="{{ route('faqs.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
