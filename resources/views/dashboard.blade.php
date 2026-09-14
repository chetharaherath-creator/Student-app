<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-navy leading-tight flex items-center gap-2">
                <span>📊</span> {{ __('Dashboard') }}
            </h2>
            <span class="text-xs font-semibold px-3 py-1 bg-teal/20 text-navy rounded-full border border-teal/40">
                Online & Ready
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Hero Banner -->
            <div class="bg-gradient-to-r from-navy via-teal to-navy-dark rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-3xl font-extrabold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-skyblue text-sm max-w-xl">
                        Explore your Student Application dashboard. Access products, YouTube search, playlists, and interactive modules easily from the navigation bar.
                    </p>
                </div>
                <!-- Decorative background elements -->
                <div class="absolute -right-8 -bottom-8 w-48 h-48 rounded-full bg-skyblue/10 blur-2xl pointer-events-none"></div>
                <div class="absolute right-32 top-0 w-32 h-32 rounded-full bg-teal/30 blur-xl pointer-events-none"></div>
            </div>

            <!-- Dashboard Modules Grid -->
            <div>
                <h4 class="text-lg font-bold text-navy mb-4 flex items-center gap-2">
                    <span>🚀</span> Quick Navigation Modules
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Products Card -->
                    <a href="{{ url('/products') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-navy flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-teal transition-colors">
                                📦
                            </div>
                            <span class="text-xs font-semibold text-teal bg-beige px-2.5 py-1 rounded-full border border-teal/20">CRUD API</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">Products Catalog</h5>
                        <p class="text-sm text-gray-600">View, search, edit, and create product items in your store.</p>
                    </a>

                    <!-- YouTube Search Card -->
                    <a href="{{ url('/youtube-search') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-teal flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-navy transition-colors">
                                🔍
                            </div>
                            <span class="text-xs font-semibold text-navy bg-skyblue/40 px-2.5 py-1 rounded-full border border-skyblue">API Integration</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">YouTube Search</h5>
                        <p class="text-sm text-gray-600">Search YouTube videos dynamically using Google's API integration.</p>
                    </a>

                    <!-- YouTube Playlists Card -->
                    <a href="{{ url('/youtube-playlists') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-navy flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-teal transition-colors">
                                🎵
                            </div>
                            <span class="text-xs font-semibold text-teal bg-beige px-2.5 py-1 rounded-full border border-teal/20">Google Auth</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">YouTube Playlists</h5>
                        <p class="text-sm text-gray-600">Connect Google OAuth to view and manage your YouTube playlists.</p>
                    </a>

                    <!-- Interactive Form Card -->
                    <a href="{{ url('/form') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-teal flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-navy transition-colors">
                                📝
                            </div>
                            <span class="text-xs font-semibold text-navy bg-skyblue/40 px-2.5 py-1 rounded-full border border-skyblue">Validation</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">Interactive Form</h5>
                        <p class="text-sm text-gray-600">Test form inputs and server-side request validations.</p>
                    </a>

                    <!-- About Page Card -->
                    <a href="{{ url('/about') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-navy flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-teal transition-colors">
                                ℹ️
                            </div>
                            <span class="text-xs font-semibold text-teal bg-beige px-2.5 py-1 rounded-full border border-teal/20">Info</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">About Us</h5>
                        <p class="text-sm text-gray-600">Learn more about the application features and stack.</p>
                    </a>

                    <!-- Contacts Card -->
                    <a href="{{ url('/contacts') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-skyblue/60 p-6 transition duration-200 hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-teal flex items-center justify-center text-2xl text-white shadow-md group-hover:bg-navy transition-colors">
                                📞
                            </div>
                            <span class="text-xs font-semibold text-navy bg-skyblue/40 px-2.5 py-1 rounded-full border border-skyblue">Support</span>
                        </div>
                        <h5 class="text-lg font-bold text-navy mb-1 group-hover:text-teal transition-colors">Contacts</h5>
                        <p class="text-sm text-gray-600">Reach out for support or feedback on this application.</p>
                    </a>

                </div>
            </div>

            <!-- User Status Card -->
            <div class="bg-white rounded-2xl p-6 shadow-md border border-skyblue/60 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-beige border-2 border-teal flex items-center justify-center text-xl font-bold text-navy">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h6 class="font-bold text-navy">{{ Auth::user()->name }}</h6>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }} • <span class="capitalize text-teal font-semibold">{{ Auth::user()->role ?? 'Student User' }}</span></p>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-beige hover:bg-skyblue/40 text-navy font-semibold text-xs rounded-lg border border-teal/30 transition-colors">
                    Edit Profile
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
