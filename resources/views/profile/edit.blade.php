<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





@extends('layouts.app')

@section('content')
    <x-profile>

    <div class="container">
        <h1>Edit Profile</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email">e-mail:</label>
                <input type="email" name="email" value="{{ $user->email }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
    </x-profile>

@endsection


