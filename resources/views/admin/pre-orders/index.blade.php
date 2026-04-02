@extends('adminlte::page')

@section('title', 'Manage Pre-Orders')

@section('content_header')
    <h1>Pre-Order Requests</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Request List</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Customer</th>
                        <th>Product Requested</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->product_name }}</td>
                        <td>
                            @php
                                $statusBadge = [
                                    'pending' => 'warning',
                                    'reviewed' => 'info',
                                    'confirmed' => 'success',
                                    'cancelled' => 'danger'
                                ][$request->status] ?? 'secondary';
                            @endphp
                            <span class="badge badge-{{ $statusBadge }}">{{ ucfirst($request->status) }}</span>
                        </td>
                        <td>{{ $request->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('pre-orders.show', $request->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
