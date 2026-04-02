@extends('adminlte::page')

@section('title', 'Manage Orders')

@section('content_header')
    <h1>Customer Orders</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order List</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            @php
                                $statusBadge = [
                                    'pending' => 'warning',
                                    'processed' => 'info',
                                    'shipped' => 'primary',
                                    'delivered' => 'success',
                                    'cancelled' => 'danger'
                                ][$order->status] ?? 'secondary';
                            @endphp
                            <span class="badge badge-{{ $statusBadge }}">{{ ucfirst($order->status) }}</span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $order->payment_status == 'paid' ? 'success' : 'danger' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
