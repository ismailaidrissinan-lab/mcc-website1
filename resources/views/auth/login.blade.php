<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - MCC Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-mcc-slate-900 min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Gradient Background Decor -->
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-mcc-blue-900/30 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-mcc-gold/10 rounded-full blur-[120px]"></div>

    <div class="w-full max-w-md relative z-10" x-data="{ loading: false }">
        <div class="mb-10 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-[2rem] shadow-2xl mb-6 p-2 transform hover:scale-105 transition-transform duration-500">
                <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="w-full h-full object-contain">
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight mb-2 uppercase">{{ __('Management Portal') }}</h1>
            <p class="text-mcc-slate-400 font-medium text-sm tracking-wide">{{ __('Secure Access for Authorized Personnel') }}</p>
        </div>

        <div class="glass-effect rounded-[2.5rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.5)] overflow-hidden">
            <form action="{{ route('login') }}" method="POST" @submit="loading = true" class="p-10 md:p-12 space-y-8">
                @csrf
                
                <div class="space-y-6">
                    <div class="relative group">
                        <label class="block text-[10px] font-bold text-mcc-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 transition-colors group-focus-within:text-mcc-blue-600">{{ __('Work Email') }}</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="w-full h-14 pl-12 pr-6 bg-mcc-slate-100/50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-semibold text-mcc-slate-900 placeholder-mcc-slate-400/70"
                                   placeholder="name@mccltd.com">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-mcc-slate-400 group-focus-within:text-mcc-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                            </div>
                        </div>
                        @error('email') <p class="mt-2 text-[10px] font-bold text-red-500 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <div class="relative group">
                        <label class="block text-[10px] font-bold text-mcc-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 transition-colors group-focus-within:text-mcc-blue-600">{{ __('Security Key') }}</label>
                        <div class="relative">
                            <input type="password" name="password" required
                                   class="w-full h-14 pl-12 pr-6 bg-mcc-slate-100/50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-semibold text-mcc-slate-900 placeholder-mcc-slate-400/70"
                                   placeholder="••••••••">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-mcc-slate-400 group-focus-within:text-mcc-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center group cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 border-none rounded-md bg-mcc-slate-200 text-mcc-blue-600 focus:ring-mcc-blue-600 transition-all">
                        <span class="ml-3 text-[11px] font-bold text-mcc-slate-500 uppercase tracking-wider group-hover:text-mcc-slate-800 transition-colors">{{ __('Stay Authenticated') }}</span>
                    </label>
                </div>

                <button type="submit" 
                        class="w-full h-16 bg-mcc-blue-900 hover:bg-black text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex items-center justify-center space-x-3 overflow-hidden group">
                    <span x-show="!loading" class="group-hover:translate-x-1 transition-transform tracking-[0.3em] ml-1">{{ __('Enter Dashboard') }}</span>
                    <span x-show="!loading">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                    <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-[10px] font-bold text-mcc-slate-500 hover:text-white uppercase tracking-[0.2em] transition-colors group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ __('Return to Public Site') }}
            </a>
        </div>
    </div>
</body>
</html>
