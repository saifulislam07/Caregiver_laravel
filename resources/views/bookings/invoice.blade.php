<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $booking->id + 1000 }} - HealoraHealth</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        @media print {
            .no-print { display: none; }
            body { background: white; }
            .invoice-card { box-shadow: none; border: none; }
        }
    </style>
</head>
<body class="bg-slate-50 py-12 px-4 print:py-0 print:px-0">
    <div class="max-w-4xl mx-auto">
        
        <div class="flex justify-between items-center mb-8 no-print">
            <a href="{{ route('bookings.index') }}" class="text-slate-500 hover:text-slate-900 font-bold flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
            <button onclick="window.print()" class="bg-primary-600 text-white px-6 py-2.5 rounded-xl font-bold shadow-lg shadow-primary-200 hover:bg-primary-700 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Print Invoice
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-[2.5rem] shadow-xl overflow-hidden invoice-card">
            {{-- Header --}}
            <div class="p-10 lg:p-16 border-b border-slate-100 flex flex-col md:flex-row justify-between gap-10">
                <div>
                    <h2 class="text-3xl font-black text-primary-600 mb-6">HealoraHealth</h2>
                    <div class="text-slate-500 space-y-1 text-sm font-medium">
                        <p>Planners Tower, Level-12, Room 05</p>
                        <p>13/A Bir Uttam CR Datta Road</p>
                        <p>Dhaka-1205, Bangladesh</p>
                        <p>+880 1234 567 890</p>
                    </div>
                </div>
                <div class="md:text-right">
                    <h1 class="text-5xl font-black text-slate-900 mb-4 uppercase tracking-tighter">Invoice</h1>
                    <div class="space-y-1">
                        <p class="text-slate-400 text-xs font-black uppercase tracking-widest leading-none">Invoice No</p>
                        <p class="text-slate-900 font-bold text-xl mb-4">#HLR-{{ $booking->id + 1000 }}</p>
                        
                        <p class="text-slate-400 text-xs font-black uppercase tracking-widest leading-none">Date Issued</p>
                        <p class="text-slate-900 font-bold">{{ $booking->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Bill To --}}
            <div class="p-10 lg:p-16 grid grid-cols-1 md:grid-cols-2 gap-10 bg-slate-50/50">
                <div>
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-4">Bill To</p>
                    <div class="text-slate-900">
                        <p class="text-xl font-bold mb-1">{{ $booking->patient_name }}</p>
                        <p class="font-medium text-slate-600">{{ $booking->patient_phone }}</p>
                        <p class="font-medium text-slate-500 w-64 mt-2">{{ $booking->patient_address }}</p>
                    </div>
                </div>
                <div class="md:text-right">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-4">Service Details</p>
                    <div class="text-slate-900">
                        <p class="text-xl font-bold mb-1">{{ $booking->service->name }}</p>
                        <p class="font-medium text-slate-600 uppercase text-xs tracking-widest">Scheduled For</p>
                        <p class="text-primary-600 font-bold">{{ \Carbon\Carbon::parse($booking->booking_date)->format('F d, Y') }} at {{ \Carbon\Carbon::parse($booking->booking_date)->format('h:i A') }}</p>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="p-10 lg:p-16">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b-2 border-slate-900">
                            <th class="py-4 text-xs font-black uppercase tracking-widest text-slate-400">Description</th>
                            <th class="py-4 text-right text-xs font-black uppercase tracking-widest text-slate-400">Rate</th>
                            <th class="py-4 text-right text-xs font-black uppercase tracking-widest text-slate-400">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="py-10">
                                <p class="text-lg font-bold text-slate-900">{{ $booking->service->name }} Services</p>
                                <p class="text-sm text-slate-500 font-medium">Professional caregiving and medical assistance.</p>
                            </td>
                            <td class="py-10 text-right font-bold text-slate-900 text-lg">৳{{ number_format($booking->total_price, 2) }}</td>
                            <td class="py-10 text-right font-bold text-slate-900 text-xl">৳{{ number_format($booking->total_price, 2) }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-12 flex justify-end">
                    <div class="w-full md:w-80 space-y-4">
                        <div class="flex justify-between text-slate-500 font-medium">
                            <span>Subtotal</span>
                            <span class="text-slate-900 font-bold">৳{{ number_format($booking->total_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-emerald-600 font-medium">
                            <div class="flex items-center gap-2">
                                <span>Advance Paid</span>
                                <span class="text-[10px] bg-emerald-100 px-2 py-0.5 rounded uppercase font-black tracking-widest">Verified</span>
                            </div>
                            <span class="font-bold">-৳{{ number_format($booking->advance_amount, 2) }}</span>
                        </div>
                        <div class="pt-4 border-t-2 border-slate-900 flex justify-between items-center">
                            <span class="text-lg font-black uppercase tracking-widest">Balance Due</span>
                            <span class="text-3xl font-black text-primary-600">৳{{ number_format($booking->due_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-16 py-10 bg-slate-900 text-white flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-1">Status</p>
                    <p class="text-lg font-bold uppercase tracking-widest">{{ $booking->status }}</p>
                </div>
                <div class="md:text-right">
                    <p class="text-[10px] font-medium text-slate-400 mb-2">Thank you for choosing HealoraHealth Private Limited.</p>
                    <div class="flex items-center gap-4 md:justify-end text-xs font-bold uppercase tracking-widest">
                        <span>Paid via {{ strtoupper($booking->payment_method) }}</span>
                        <span class="text-slate-600">|</span>
                        <span>TXID: {{ $booking->transaction_id }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <p class="text-center mt-12 text-slate-400 text-[10px] font-black uppercase tracking-[0.5em]">System Generated Invoice • No Signature Required</p>
    </div>
</body>
</html>
