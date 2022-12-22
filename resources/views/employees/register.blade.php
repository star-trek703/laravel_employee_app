<x-guest-layout>
    <div class="text-2xl text-center my-3">Employee Register</div>

    <form method="POST" action="{{ route('employees.register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- DOB -->
        <div class="mt-4">
            <x-input-label for="dob" :value="__('DOB')" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <!-- Date of joining -->
        <div class="mt-4">
            <x-input-label for="doj" :value="__('Date of joining')" />
            <x-text-input id="doj" class="block mt-1 w-full" type="date" name="doj" :value="old('doj')" required />
            <x-input-error :messages="$errors->get('doj')" class="mt-2" />
        </div>
            
        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="gender" :value="old('gender')" required>
                <option>Male</option>
                <option>Female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Designation -->
        <div class="mt-4">
            <x-input-label for="designation" :value="__('Designation')" />
            <x-text-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" required />
            <x-input-error :messages="$errors->get('designation')" class="mt-2" />
        </div>

        <!-- Manager -->
        <div class="mt-4">
            <x-input-label for="manager" :value="__('Manager')" />
            <x-text-input id="manager" class="block mt-1 w-full" type="text" name="manager" :value="old('manager')" required />
            <x-input-error :messages="$errors->get('manager')" class="mt-2" />
        </div>

        <!-- Picture -->
        <div class="mt-4">
            <x-input-label for="picture" :value="__('Picture')" />
            <x-text-input id="picture" class="block mt-1 w-full" type="file" name="picture" :value="old('picture')" required />
            <x-input-error :messages="$errors->get('picture')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('employees.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-5"></div>
</x-guest-layout>
