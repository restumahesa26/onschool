@extends('layouts.authentication')

@section('content')
<section class="signup">
    <!-- <img src="images/signup-bg.jpg" alt=""> -->
    <div class="container">
        <div class="signup-content">
            <form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}">
                @csrf
                <h2 class="form-title">Register</h2>
                <div class="form-group">
                    <input type="text" class="form-input" name="nama" id="name" placeholder="Masukkan Nama" value="{{ old('nama') }}"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="asal_sekolah" id="asal_sekolah" placeholder="Masukkan Asal Sekolah" value="{{ old('asal_sekolah') }}" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="alamat" id="Alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password" id="password" placeholder="Masukkan Password"/>
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Konfirmasi Password"/>
                    <span toggle="#password_confirmation" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                </div>
            </form>
            <p class="loginhere">
                Sudah mempunyai akun ? <a href="{{ route('login') }}" class="loginhere-link">Login Disini</a>
            </p>
        </div>
    </div>
</section>
@endsection



{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
