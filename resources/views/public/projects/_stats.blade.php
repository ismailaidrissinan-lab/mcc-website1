@php
    $selectedStatus = $selectedStatus ?? '';
@endphp

<div
    class="grid grid-cols-2 md:grid-cols-5 divide-y md:divide-y-0 md:divide-x divide-mcc-slate-100 bg-white rounded-xl shadow-sm border border-mcc-slate-100 overflow-hidden">
    <!-- Total Projects -->
    <button @click="$dispatch('status-selected', '')"
        class="relative p-6 text-left group transition-all duration-300 hover:bg-mcc-slate-50 focus:outline-none focus:bg-mcc-blue-50/50">
        <div
            class="absolute top-0 left-0 w-full h-1 bg-mcc-blue-600 transform origin-left transition-transform duration-300 {{ $selectedStatus === '' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
        </div>
        <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest mb-1">{{ __('Total Projects') }}
        </p>
        <p
            class="text-3xl font-black {{ $selectedStatus === '' ? 'text-mcc-blue-600' : 'text-mcc-slate-900 group-hover:text-mcc-blue-600' }} transition-colors">
            {{ $stats['total'] }}</p>
    </button>

    <!-- Operational -->
    <button @click="$dispatch('status-selected', 'operational')"
        class="relative p-6 text-left group transition-all duration-300 hover:bg-mcc-slate-50 focus:outline-none focus:bg-indigo-50/50">
        <div
            class="absolute top-0 left-0 w-full h-1 bg-indigo-500 transform origin-left transition-transform duration-300 {{ $selectedStatus === 'operational' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
        </div>
        <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest mb-1 flex items-center gap-1.5">
            <span
                class="w-2 h-2 rounded-full bg-indigo-500 {{ $selectedStatus === 'operational' ? 'animate-pulse' : '' }}"></span>
            {{ __('Operational') }}
        </p>
        <p
            class="text-3xl font-black {{ $selectedStatus === 'operational' ? 'text-indigo-600' : 'text-mcc-slate-700 group-hover:text-indigo-600' }} transition-colors">
            {{ $stats['operational'] }}</p>
    </button>

    <!-- Completed -->
    <button @click="$dispatch('status-selected', 'completed')"
        class="relative p-6 text-left group transition-all duration-300 hover:bg-mcc-slate-50 focus:outline-none focus:bg-green-50/50">
        <div
            class="absolute top-0 left-0 w-full h-1 bg-green-500 transform origin-left transition-transform duration-300 {{ $selectedStatus === 'completed' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
        </div>
        <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest mb-1 flex items-center gap-1.5">
            <span
                class="w-2 h-2 rounded-full bg-green-500 {{ $selectedStatus === 'completed' ? 'animate-pulse' : '' }}"></span>
            {{ __('Completed') }}
        </p>
        <p
            class="text-3xl font-black {{ $selectedStatus === 'completed' ? 'text-green-600' : 'text-mcc-slate-700 group-hover:text-green-600' }} transition-colors">
            {{ $stats['completed'] }}</p>
    </button>

    <!-- Ongoing -->
    <button @click="$dispatch('status-selected', 'ongoing')"
        class="relative p-6 text-left group transition-all duration-300 hover:bg-mcc-slate-50 focus:outline-none focus:bg-blue-50/50">
        <div
            class="absolute top-0 left-0 w-full h-1 bg-blue-500 transform origin-left transition-transform duration-300 {{ $selectedStatus === 'ongoing' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
        </div>
        <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest mb-1 flex items-center gap-1.5">
            <span
                class="w-2 h-2 rounded-full bg-blue-500 {{ $selectedStatus === 'ongoing' ? 'animate-pulse' : '' }}"></span>
            {{ __('Ongoing') }}
        </p>
        <p
            class="text-3xl font-black {{ $selectedStatus === 'ongoing' ? 'text-blue-600' : 'text-mcc-slate-700 group-hover:text-blue-600' }} transition-colors">
            {{ $stats['ongoing'] }}</p>
    </button>

    <!-- Suspended -->
    <button @click="$dispatch('status-selected', 'suspended')"
        class="relative p-6 text-left group transition-all duration-300 hover:bg-mcc-slate-50 focus:outline-none focus:bg-amber-50/50">
        <div
            class="absolute top-0 left-0 w-full h-1 bg-amber-500 transform origin-left transition-transform duration-300 {{ $selectedStatus === 'suspended' ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
        </div>
        <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest mb-1 flex items-center gap-1.5">
            <span
                class="w-2 h-2 rounded-full bg-amber-500 {{ $selectedStatus === 'suspended' ? 'animate-pulse' : '' }}"></span>
            {{ __('Suspended') }}
        </p>
        <p
            class="text-3xl font-black {{ $selectedStatus === 'suspended' ? 'text-amber-500' : 'text-mcc-slate-700 group-hover:text-amber-500' }} transition-colors">
            {{ $stats['suspended'] }}</p>
    </button>
</div>