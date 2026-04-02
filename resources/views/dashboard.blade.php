<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-indigo-800 leading-tight">
                {{ __('Patient Portal') }}
            </h2>
            <div class="text-sm text-gray-500">
                Welcome back, <span class="font-bold text-indigo-600">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-indigo-50 flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Total Appointments</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $appointments->count() }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-green-50 flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $orders->count() }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-50 flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Pre-Order Requests</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $preOrders->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Appointments -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-indigo-50/30">
                        <h3 class="font-bold text-indigo-900">Recent Appointments</h3>
                        <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">View All</a>
                    </div>
                    <div class="p-6 flex-grow">
                        @forelse($appointments as $app)
                            <div class="flex items-center p-4 mb-4 bg-gray-50 rounded-xl hover:bg-indigo-50/50 transition-colors cursor-pointer border border-transparent hover:border-indigo-100">
                                <div class="w-12 h-12 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold mr-4">
                                    {{ substr($app->doctor_id, 0, 1) }}
                                </div>
                                <div class="flex-grow">
                                    <p class="font-bold text-gray-800">Appointment #{{ $app->id }}</p>
                                    <p class="text-sm text-gray-500">{{ $app->appointment_date }} at {{ $app->appointment_time }}</p>
                                </div>
                                <div>
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-indigo-100 text-indigo-700 uppercase">
                                        {{ $app->status }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-8 italic">No appointments found.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 flex justify-between items-center bg-green-50/30">
                        <h3 class="font-bold text-green-900">Health Shop Orders</h3>
                        <a href="#" class="text-sm font-semibold text-green-600 hover:text-green-800">View All</a>
                    </div>
                    <div class="p-6 flex-grow">
                        @forelse($orders as $order)
                            <div class="flex items-center p-4 mb-4 bg-gray-50 rounded-xl hover:bg-green-50/50 transition-colors cursor-pointer border border-transparent hover:border-green-100">
                                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-green-700 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                </div>
                                <div class="flex-grow">
                                    <p class="font-bold text-gray-800">Order #{{ $order->id }}</p>
                                    <p class="text-sm text-gray-500">Amount: ${{ $order->total_amount }} • {{ $order->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700 uppercase">
                                        {{ $order->status }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-8 italic">No orders found in history.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
