@extends('layouts.app')

@section('meta')
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-5/12">
                <h2>Sample Form</h2>
                @if(Session::has('success'))
                    <div class="text-green-400 text-xl">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <form action="{{route('sample-form-post')}}" class="mt-5" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <x-honeypot/>
                    <input type="text" value="{{$formKey}}" name="form_key" hidden>

                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                           class="border border-gray-700  rounded-lg p-3 w-full @error('name') border-red-500 @enderror"
                    >

                    @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <textarea placeholder="Body" name="description"
                              class="w-100 border border-gray-700 rounded-lg p-3 w-full mt-3">{{ old('description') }}</textarea>

                    <input type="file" class="border border-gray-700 rounded-lg p-3 w-full" name="file"
                           {{ old('sample_file') }}>

                    @error('cf-turnstile-response')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="mt-4">
                        <x-turnstile/>

                        @error('cf-turnstile-response')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="rounded-xl bg-blue-500 text-white py-3 px-10 mt-5">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
