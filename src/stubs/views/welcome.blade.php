@extends('layouts.app')

@section('body')
    <div class="h-full font-sans">
        <div class="container mx-auto h-full flex justify-center">
            <div class="w-full mx-4">
                <h1 class="font-thin mb-6 mt-6 text-center">
                    {{ __('Welcome') }}
                </h1>
                <div class="border-teal p-6 sm:p-8 border-t-4 bg-white mb-6 rounded-t rounded-b shadow-lg">
                    <div class="text-4xl text-grey-light font-thin text-center py-32">
                        Make magic
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
