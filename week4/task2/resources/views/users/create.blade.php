{{-- 
    Filename: create.blade.php
    Author: Heeran Kim
    Created Date: 2024-08-15
    Last Modified: 2024-08-16
    Description: This Blade template renders a form where users can input their name and age. 
                 It includes form validation and displays error messages if validation fails.
--}}

<x-layout>
    <!-- Include the navigation bar from a partial view -->
    @include('partials/_nav')
    <div class="mx-4">
        <x-card>
            <!-- Section Header -->
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1"> Who are you? </h2>
                <p class="mb-4">Enter your name and age</p>
            </header>

            <!-- Form to collect user name and age -->
            <form method="POST" action="store">
                {{-- 
                    CSRF Token (Cross-Site Request Forgery Token):
                    - A CSRF token is a unique, secret token generated by the server and included in forms.
                    - The purpose of this token is to protect against Cross-Site Request Forgery (CSRF) attacks.
                    - By including a CSRF token in each form, Laravel ensures that the request actually originated
                      from your application and not from a third-party site.
                    - Laravel automatically verifies the token on the server-side when the form is submitted. If the 
                      token is missing or invalid, Laravel will reject the request.
                    - @csrf and {{ csrf_field() }} are equivalent.
                --}}
                @csrf
                
                <!-- Name input field -->
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2"> Name </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        {{-- Retain the old input value after form submission --}}
                        value="{{old('name')}}"
                    />

                    <!-- Error message for name validation -->
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Age input field -->
                <div class="mb-6">
                    <label for="Age" class="inline-block text-lg mb-2"> Age </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="age"
                        {{-- Retain the old input value after form submission --}}
                        value="{{old('age')}}"
                    />

                    <!-- Error message for name validation -->
                    @error('age')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Submit button -->
                <div class="mb-6 text-center">
                    <button type="submit" class="bg-hello text-white rounded py-2 px-4 hover:bg-black">
                        Submit
                    </button>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>