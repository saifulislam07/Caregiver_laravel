@extends('adminlte::page')

@section('title', 'Pre-Order Request Details')

@section('content_header')
    <h1>Request #{{ $pre_order->id }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Description</h3>
                </div>
                <div class="card-body">
                    <h5><strong>{{ $pre_order->product_name }}</strong></h5>
                    <hr>
                    <p>{{ $pre_order->description }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Manage Request</h3>
                </div>
                <div class="card-body">
                    <p><strong>Customer:</strong> {{ $pre_order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $pre_order->user->email }}</p>
                    <p><strong>Date:</strong> {{ $pre_order->created_at->format('d M Y H:i') }}</p>
                    
                    <form action="{{ route('pre-orders.update', $pre_order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Request Status</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ $pre_order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $pre_order->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="confirmed" {{ $pre_order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $pre_order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Admin Notes (Will be visible to customer)</label>
                            <textarea name="admin_notes" class="form-control" rows="3">{{ $pre_order->admin_notes }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
