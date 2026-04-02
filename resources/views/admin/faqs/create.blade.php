@extends('adminlte::page')

@section('title', 'Add New FAQ')

@section('content_header')
    <h1>Add New FAQ</h1>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('faqs.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" id="question" placeholder="Enter Question" required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea name="answer" class="form-control" id="answer" rows="5" placeholder="Enter Answer" required></textarea>
                </div>
                <div class="form-group">
                    <label for="order_index">Order Index</label>
                    <input type="number" name="order_index" class="form-control" id="order_index" value="0">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                        <label class="custom-control-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create FAQ</button>
                <a href="{{ route('faqs.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
