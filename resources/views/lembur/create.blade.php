@extends('layouts.nav')

@section('content')
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <!-- Title -->
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Ayo Lembur</h3>
            </div>
        </div>

        <!-- IF Error -->
        @if ($errors->any())
        <div class="w-3/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-full mb-2 text-gray-50 bg-red-700 rounded-xl py-4 mt-10">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="text-white bg-red-500 rounded-2xl py-4 text-center border-b-4 border-red-700">
                {{ session()->get('message') }}
                </p>
            </div>
        @endif

        <!-- Register Card -->
        <div class="flex flex-wrap">
            <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 py-10">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                    <!-- Form start -->
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" 
                        method="POST"
                        action="/lembur"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Karyawan ID -->
                        <div class="flex flex-wrap">
                            <label for="karyawan_id" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Karyawan_id') }}:
                            </label>

                            <input id="karyawan_id" type="number" class="form-input w-full @error('karyawan_id')  border-red-500 @enderror"
                                name="karyawan_id" value="{{ old('karyawan_id') }}" required >

                            @error('karyawan_id')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Mulai Lembur -->
                        <div class="flex flex-wrap">
                            <label for="mulai_lembur" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Mulai Lembur') }}:
                            </label>

                            <input id="mulai_lembur" type="time" class="form-input w-full @error('mulai_lembur')  border-red-500 @enderror"
                                name="mulai_lembur" value="{{ old('mulai_lembur') }}" required >

                            @error('mulai_lembur')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Selesai Lembur -->
                        <div class="flex flex-wrap">
                            <label for="selesai_lembur" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Selesai Lembur') }}:
                            </label>

                            <input id="selesai_lembur" type="time" class="form-input w-full @error('selesai_lembur')  border-red-500 @enderror"
                                name="selesai_lembur" value="{{ old('selesai_lembur') }}" required>

                            @error('selesai_lembur')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="mb-10 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-700 hover:bg-blue-500 sm:py-4">
                                {{ __('Tambahkan Lembur') }}
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection