<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('booking_date'); // bkash, nagad, bank_transfer
            $table->string('transaction_id')->nullable()->after('payment_method');
            $table->decimal('advance_amount', 10, 2)->default(0)->after('transaction_id');
            $table->string('payment_status')->default('unpaid')->after('advance_amount'); // unpaid, pending_verification, verified, rejected
            $table->text('admin_notes')->nullable()->after('payment_status');
            $table->string('patient_name')->nullable()->after('admin_notes');
            $table->string('patient_phone')->nullable()->after('patient_name');
            $table->text('patient_address')->nullable()->after('patient_phone');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'transaction_id', 'advance_amount', 'payment_status', 'admin_notes', 'patient_name', 'patient_phone', 'patient_address']);
        });
    }
};
