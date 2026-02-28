<x-filament-widgets::widget>
    <div class="relative overflow-hidden bg-gradient-to-br from-[#0f4172] to-[#124a82] p-8 shadow-lg">
        {{-- Decorative Circle --}}
        <!-- <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div> -->

        <div class="relative flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="flex rounded-xl h-16 w-16 items-center justify-center  bg-white/10 p-2 backdrop-blur-md shadow-inner">
                    <img src="{{ asset('storage/logo/loi-logo.webp') }}" alt="Logo" class="h-10 w-auto brightness-0 invert">
                </div>
                
                <div class="text-left">
                    <h2 class="text-xl font-semibold tracking-tight text-white lowercase">
                        Welcome back, {{ (auth()->user()->name) }}
                    </h2>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm font-medium text-white/80 bg-white/10 px-4 py-2 rounded-lg border border-white/10 backdrop-blur-sm">
                <x-heroicon-m-calendar class="w-5 h-5 text-primary-300" />
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
