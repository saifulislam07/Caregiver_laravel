<div class="fixed bottom-8 right-8 z-[100] flex flex-col gap-4">
    <!-- WhatsApp Button -->
    <a href="{{ App\Models\Setting::get('whatsapp_url', 'https://wa.me/8801234567890') }}" target="_blank" class="w-14 h-14 bg-[#25D366] text-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300 group relative">
        <i class="fab fa-whatsapp text-3xl"></i>
        <span class="absolute right-full mr-4 bg-white text-slate-900 px-4 py-2 rounded-xl text-sm font-bold shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap border border-slate-100">
            Chat on WhatsApp
        </span>
    </a>

    <!-- Facebook Messenger Button -->
    <a href="{{ App\Models\Setting::get('messenger_url', 'https://m.me/yourpage') }}" target="_blank" class="w-14 h-14 bg-[#0084FF] text-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300 group relative">
        <i class="fab fa-facebook-messenger text-3xl"></i>
        <span class="absolute right-full mr-4 bg-white text-slate-900 px-4 py-2 rounded-xl text-sm font-bold shadow-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap border border-slate-100">
            Message us on Facebook
        </span>
    </a>
</div>
