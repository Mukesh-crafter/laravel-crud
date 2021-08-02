@extends('layouts.main')

@section('content')

<!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
<!-- form start -->
    <form method="POST" action="{{ route('profile') }}">
        @method('PUT')
        @csrf  
        <div class="grid grid-cols-2 gap-6">
        <!-- Name -->
            <div class="grid grid-rows-2 gap-6">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth()->user()->name }}" autofocus />
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

        <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth()->user()->email}}" />
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
            </div>  
        
            <div class="grid grid-rows-2 gap-6">
        <!-- Password -->
                <div>
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

        <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                </div>
            </div>
        <div>
        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
<!-- form end -->
@endsection