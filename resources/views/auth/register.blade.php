<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-navy">Create Account</h2>
        <p class="text-xs text-gray-500 mt-1">Join StudentApp to access your dashboard</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-navy font-semibold text-xs" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-navy font-semibold text-xs" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="john@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Account Role')" class="text-navy font-semibold text-xs" />
            <select id="role" name="role" class="block mt-1 w-full border-skyblue/80 bg-white text-navy focus:border-teal focus:ring-teal rounded-lg shadow-sm text-sm" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-navy font-semibold text-xs" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-navy font-semibold text-xs" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full text-center">
                {{ __('Register Account') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4 border-t border-skyblue/40 mt-4">
            <span class="text-xs text-gray-500">Already registered?</span>
            <a class="text-xs text-teal hover:text-navy font-bold ms-1" href="{{ route('login') }}">
                Log in here
            </a>
        </div>
    </form>
</x-guest-layout>
