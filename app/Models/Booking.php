<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'service_id', 'caregiver_id', 'package_id', 'status', 'booking_date',
        'payment_method', 'transaction_id', 'advance_amount', 'total_price', 'payment_status',
        'admin_notes', 'patient_name', 'patient_phone', 'patient_address',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
        'advance_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function getDueAmountAttribute()
    {
        return max(0, ($this->total_price ?? 0) - ($this->advance_amount ?? 0));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function caregiver()
    {
        return $this->belongsTo(Caregiver::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge badge-warning">Pending</span>',
            'approved' => '<span class="badge badge-success">Approved</span>',
            'completed' => '<span class="badge badge-info">Completed</span>',
            'cancelled' => '<span class="badge badge-danger">Cancelled</span>',
            default => '<span class="badge badge-secondary">Unknown</span>',
        };
    }

    public function getPaymentBadgeAttribute()
    {
        return match($this->payment_status) {
            'unpaid' => '<span class="badge badge-secondary">Unpaid</span>',
            'pending_verification' => '<span class="badge badge-warning">Awaiting Verification</span>',
            'verified' => '<span class="badge badge-success">Verified</span>',
            'rejected' => '<span class="badge badge-danger">Rejected</span>',
            default => '<span class="badge badge-secondary">N/A</span>',
        };
    }
}
