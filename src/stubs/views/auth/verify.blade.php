@extends('layouts.app')

@section('body')
    @component('components.form-card')
        @slot('title', __('Verify Your Email Address'))

        @if (session('status'))
            <div class="bg-teal-lightest border-t-2 border-teal rounded text-teal-darkest px-4 py-3 shadow mb-4" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-teal-darker">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('resent'))
            <div class="bg-teal-lightest border-t-2 border-teal rounded text-teal-darkest px-4 py-3 shadow mb-4" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-teal-darker">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <p>
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>
        <p>
            {{ __('If you did not receive the email') }},
            <a href="{{ route('verification.resend') }}">
                {{ __('click here to request another') }}
            </a>.
        </p>


        @slot('footer')
            <p class="text-grey-dark text-sm">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="no-underline text-blue rounded custom-outline">
                    {{ __('Login to your Account') }}
                </a>.
            </p>
        @endslot
    @endcomponent
@endsection
