<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up(): void
    {
        $paymentSettings = [
            ['key' => 'payment_instruction',   'value' => 'To confirm your booking, please send the advance payment to one of the accounts below and enter your Transaction ID in the form.',  'group' => 'payment', 'type' => 'text'],
            ['key' => 'bkash_number',          'value' => '01700-000000',   'group' => 'payment', 'type' => 'text'],
            ['key' => 'bkash_account_type',    'value' => 'Personal',       'group' => 'payment', 'type' => 'text'],
            ['key' => 'nagad_number',          'value' => '01700-000001',   'group' => 'payment', 'type' => 'text'],
            ['key' => 'nagad_account_type',    'value' => 'Personal',       'group' => 'payment', 'type' => 'text'],
            ['key' => 'bank_name',             'value' => 'Dutch-Bangla Bank Ltd.',  'group' => 'payment', 'type' => 'text'],
            ['key' => 'bank_account_name',     'value' => 'HealoraHealth Ltd.',      'group' => 'payment', 'type' => 'text'],
            ['key' => 'bank_account_number',   'value' => '1234567890',     'group' => 'payment', 'type' => 'text'],
            ['key' => 'bank_routing_number',   'value' => '090261234',      'group' => 'payment', 'type' => 'text'],
            ['key' => 'bank_branch',           'value' => 'Gulshan Branch, Dhaka',  'group' => 'payment', 'type' => 'text'],
            ['key' => 'minimum_advance',       'value' => '500',            'group' => 'payment', 'type' => 'text'],
        ];

        foreach ($paymentSettings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }

    public function down(): void
    {
        Setting::whereIn('key', [
            'payment_instruction', 'bkash_number', 'bkash_account_type',
            'nagad_number', 'nagad_account_type', 'bank_name',
            'bank_account_name', 'bank_account_number', 'bank_routing_number',
            'bank_branch', 'minimum_advance',
        ])->delete();
    }
};
