@extends('layouts.nav')

@section('content')

    <style>	
        /*Overrides for Tailwind CSS */
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568; 			/*text-gray-700*/
            padding-left: 1rem; 		/*pl-4*/
            padding-right: 1rem; 		/*pl-4*/
            padding-top: .5rem; 		/*pl-2*/
            padding-bottom: .5rem; 		/*pl-2*/
            line-height: 1.25; 			/*leading-tight*/
            border-width: 2px; 			/*border-2*/
            border-radius: .25rem; 		
            border-color: #edf2f7; 		/*border-gray-200*/
            background-color: #edf2f7; 	/*bg-gray-200*/
        }
        /*Row Hover*/
        table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;	/*bg-indigo-100*/
        }
        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button		{
            font-weight: 700;				/*font-bold*/
            border-radius: .25rem;			/*rounded*/
            border: 1px solid transparent;	/*border border-transparent*/
        }
        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
            color: #fff !important;				/*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
            font-weight: 700;					/*font-bold*/
            border-radius: .25rem;				/*rounded*/
            background: #667eea !important;		/*bg-indigo-500*/
            border: 1px solid transparent;		/*border border-transparent*/
        }
        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
            color: #fff !important;				/*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
            font-weight: 700;					/*font-bold*/
            border-radius: .25rem;				/*rounded*/
            background: #667eea !important;		/*bg-indigo-500*/
            border: 1px solid transparent;		/*border border-transparent*/
        }
        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }
        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important; /*bg-indigo-500*/
        }
    </style>

    <!-- Content Start -->
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <!-- Title -->
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Tabel Karyawan</h3>
            </div>
        </div>

        <div class="flex flex-wrap">
    
            <!--Container-->
            <div class="container w-full xl:w-full 2xl:w-4/5  mx-auto px-2 py-10">

                <button class="bg-blue-500 hover:bg-blue-400 ml-10 text-white font-bold py-2 px-4 mb-5 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                    onclick="window.location.href='/karyawan/create'">
                    Tambah karyawan
                </button>

                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-xl shadow bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">Nama</th>
                                <th data-priority="2">Jenis Kelamin</th>
                                <th data-priority="3">Tempat lahir</th>
                                <th data-priority="4">tanggal lahir</th>
                                <th data-priority="5">Telepon</th>
                                <th data-priority="6">Alamat</th>
                                <th data-priority="7">Action</th>
                            </tr>
                        </thead>
                        <tbody>		
                            @foreach ( $karyawans as $karyawan)
                            <tr>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->jenis_kelamin }}</td>
                                <td>{{ $karyawan->tempat_lahir }}</td>
                                <td>{{ $karyawan->tanggal_lahir }}</td>
                                <td>{{ $karyawan->no_telepon }}</td>
                                <td>{{ $karyawan->alamat }}</td>
                                <td>
                                    <form action="/karyawan/{{ $karyawan->id }}" 
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        
                                        <a href="/karyawan/{{ $karyawan->id }}/edit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 m-1 border-b-4 border-green-700 hover:border-green-500 rounded">
                                            Edit
                                        </a>
                                        
                                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 pb-1 px-2 border-b-4 border-red-700 hover:border-red-500 rounded"
                                            type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>                         
                            @endforeach
                        </tbody>
                    </table>

                    @if (session()->has('message'))
                        <div class="w-4/5 m-auto mt-10 pl-2">
                            <p class="text-white bg-green-500 rounded-2xl py-4 text-center border-b-4 border-green-700">
                            {{ session()->get('message') }}
                            </p>
                        </div>
                    @endif
                </div>
                <!--/Card-->
            </div>
            <!--/container-->

            <!-- jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		
            <!--Datatables -->
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {
                    
                    var table = $('#example').DataTable( {
                            responsive: true
                        } )
                        .columns.adjust()
                        .responsive.recalc();
                } );
            </script>
        </div>
    </div>
@endsection