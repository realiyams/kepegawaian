@extends('layouts.nav')

@section('content')
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <!-- Title -->
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Edit Karyawan</h3>
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

        <!-- Register Card -->
        <div class="flex flex-wrap">
            <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 py-10">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                    <!-- Form start -->
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" 
                        method="POST"
                        action="/karyawan/{{ $karyawan->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="flex flex-wrap">
                            <label for="nama" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Nama') }}:
                            </label>

                            <input id="nama" type="text" class="form-input w-full @error('nama')  border-red-500 @enderror"
                                name="nama" value="{{ $karyawan->nama }}" required autocomplete="name">

                            @error('nama')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Jenis_kelamin -->
                        <div class="flex flex-wrap">
                            <label for="jenis_kelamin" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Jenis Kelamin') }}:
                            </label>

                            <input id="jenis_kelamin" type="text" class="form-input w-full @error('jenis_kelamin')  border-red-500 @enderror"
                                name="jenis_kelamin" value="{{ $karyawan->jenis_kelamin }}" required autocomplete="sex">

                            @error('jenis_kelamin')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Tempat_lahir -->
                        <div class="flex flex-wrap">
                            <label for="tempat_lahir" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Tempat Lahir') }}:
                            </label>

                            <input id="tempat_lahir" type="text" class="form-input w-full @error('tempat_lahir')  border-red-500 @enderror"
                                name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}" required autocomplete="address-level2" >

                            @error('tempat_lahir')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Tanggal_lahir -->
                        <div class="flex flex-wrap">
                            <label for="tanggal_lahir" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Tanggal Lahir') }}:
                            </label>

                            <input id="tanggal_lahir" type="date" class="form-input w-full @error('tanggal_lahir')  border-red-500 @enderror"
                                name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" required autocomplete="bday">

                            @error('tanggal_lahir')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div class="flex flex-wrap">
                            <label for="no_telepon" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('No Telepon') }}:
                            </label>

                            <input id="no_telepon" type="text" class="form-input w-full @error('no_telepon')  border-red-500 @enderror"
                                name="no_telepon" value="{{ $karyawan->no_telepon }}" required autocomplete="tel">

                            @error('no_telepon')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="flex flex-wrap">
                            <label for="alamat" class="block text-gray-700 text-lg font-bold mb-2 sm:mb-4">
                                {{ __('Alamat') }}:
                            </label>

                            <input id="alamat" type="text" class="form-input w-full @error('alamat')  border-red-500 @enderror"
                                name="alamat" value="{{ $karyawan->alamat }}" required autocomplete="street-address" >

                            @error('alamat')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="mb-10 w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-700 hover:bg-blue-500 sm:py-4">
                                {{ __('Edit karyawan') }}
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection