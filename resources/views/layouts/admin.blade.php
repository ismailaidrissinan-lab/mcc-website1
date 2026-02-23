<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - MCC Ltd</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-mcc-slate-100 font-sans antialiased text-mcc-slate-800">
    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside class="bg-mcc-slate-900 text-white w-64 flex-shrink-0 transition-all duration-300" :class="sidebarOpen ? 'ml-0' : '-ml-64'">
            <div class="h-20 flex items-center justify-center border-b border-mcc-slate-800 px-6">
                <a href="{{ route('home') }}" target="_blank">
                    <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="h-10 w-auto brightness-0 invert">
                </a>
            </div>
            <div class="px-6 py-4 space-y-8">
                <!-- Core Management -->
                <div>
                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-[0.2em] mb-4">{{ __('Core') }}</div>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                </div>

                <!-- Projects & Content -->
                <div>
                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-[0.2em] mb-4">{{ __('Projects & Content') }}</div>
                    <div class="space-y-1">
                        <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.projects.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            {{ __('Projects') }}
                        </a>
                        <a href="{{ route('admin.sectors.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.sectors.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                            {{ __('Sectors') }}
                        </a>
                        <a href="{{ route('admin.articles.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.articles.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                            {{ __('Insights') }}
                        </a>
                        <a href="{{ route('admin.training.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.training.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            {{ __('Training') }}
                        </a>
                    </div>
                </div>

                <!-- Corporate Stakeholders -->
                <div>
                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-[0.2em] mb-4">{{ __('Governance & CSR') }}</div>
                    <div class="space-y-1">
                            <a href="{{ route('admin.csr.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.csr.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                {{ __('CSR Projects') }}
                            </a>
                            <a href="{{ route('admin.investors.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.investors.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                {{ __('Investors') }}
                            </a>
                    </div>
                </div>

                <!-- Talent & Awards -->
                <div>
                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-[0.2em] mb-4">{{ __('Talent & Awards') }}</div>
                    <div class="space-y-1">
                            <a href="{{ route('admin.jobs.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.jobs.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ __('Careers') }}
                            </a>
                            <a href="{{ route('admin.awards.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.awards.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                {{ __('Awards') }}
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.settings.*') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-600 hover:bg-mcc-slate-50' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ __('Site Settings') }}
                            </a>
                        </div>
                    </div>
                <div class="pt-8 border-t border-mcc-slate-800 mt-8">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center px-4 py-3 text-mcc-slate-400 hover:text-white transition">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        View Website
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-20 bg-white border-b border-mcc-slate-200 flex items-center justify-between px-8">
                <button @click="sidebarOpen = !sidebarOpen" class="text-mcc-slate-500 hover:text-mcc-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                </button>
                <div class="flex items-center space-x-6">
                    <div class="text-right">
                        <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Authenticated as') }}</div>
                        <div class="text-sm font-extrabold text-mcc-slate-900 tracking-tight">{{ Auth::user()->name }}</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="ml-4">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold rounded-xl transition-all border border-red-100 uppercase tracking-widest">
                            {{ __('Sign Out') }}
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
