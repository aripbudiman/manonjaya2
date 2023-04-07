@extends('layouts.manonjaya')
@section('konten')
@php
$mjl =$majelis
@endphp
<h1 class="my-5 text-center uppercase font-bold text-xl">List Wakalah Cabang Manonjaya</h1>
@if (Session::get('success'))
<div id="alert-border-1"
    class="flex p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800"
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium">
        <a href="{{ route('sp3') }}"
            class="font-semibold underline hover:no-underline">{{ Session::get('success') }}</a>
    </div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-1" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
</div>
@endif
<div class="relative overflow-x-auto  my-10">
    <table class="w-full table-auto text-sm text-left cell-border text-gray-500 dark:text-gray-400" id="table-wakalah">
        <thead class="text-xs text-center text-gray-700 uppercase bg-emerald-100 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Tgl_wakalah
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Anggota
                </th>
                <th scope="col" class="px-6 py-3">
                    Majelis
                </th>
                <th scope="col" class="px-6 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nominal Droping
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($wakalah as $wkl)
            <tr
                class="bg-white border-b text-gray-900 dark:bg-gray-800 dark:border-gray-700 hover:bg-emerald-100  hover:text-emerald-600 dark:hover:bg-gray-600">
                <th scope="row" class="px-2 py-2 font-medium text-center whitespace-nowrap dark:text-white">
                    {{ $no++ }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                    {{ date('d/m/Y',strtotime($wkl->trx_wkl)) }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                    {{ $wkl->nama_anggota }}
                </th>
                <td class="px-2 py-2">
                    {{ $wkl->majelis }}
                </td>
                <td class="px-2 py-2">
                    {{ $wkl->petugas }}
                </td>
                <td class="px-2 py-2">
                    {{ number_format($wkl->nominal, 0, ",", ".") }}
                </td>
                <td class="px-2 py-2 text-center text-indigo-500">
                    {{ $wkl->status }}
                </td>
                <td class="px-2 py-2 text-center text-indigo-500">
                    <form action="{{ route('wakalah.status',['status'=>'Approve','id'=>$wkl->id]) }}" method="post"
                        class="inline">
                        @csrf
                        @method('PUT')
                        <button title="Approve" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-check-square-fill text-indigo-500 hover:text-indigo-600"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                            </svg>
                        </button>
                    </form>
                    <form action="{{ route('wakalah.status',['status'=>'Reject','id'=>$wkl->id]) }}" method="post"
                        class="inline">
                        @csrf
                        @method('PUT')
                        <button title="Batal Pembiayaan" class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-x-square-fill text-rose-500 hover:text-rose-600" viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                            </svg>
                        </button>
                    </form>
                    <form action="{{ route('wakalah.edit_wkl',$wkl->id) }}" method="post" class="inline">
                        @csrf
                        @method('PUT')
                        <button title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-pencil-square text-emerald-500  hover:text-emerald-600"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </button>
                    </form>
                    <form action="{{ route('sp3.belum_masuk',$wkl->id) }}" method="post" class="inline">
                        @csrf
                        <button title="SP3 BELUM MASUK">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-exclamation-octagon text-yellow-400 hover:text-yellow-500"
                                viewBox="0 0 16 16">
                                <path
                                    d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                                <path
                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('#table-wakalah').DataTable({
            "lengthMenu": [
                [10, 5, 25, 50, -1],
                [10, 5, 25, 50, "All"]
            ]
        });

        $('#table-wakalah_filter').addClass('mb-4');
        $('#table-wakalah_info').addClass('mt-5 mb-20');
        $('#table-wakalah_paginate').addClass('mt-5 mb-20');
        $('select[name="table-wakalah_length"]').addClass('w-14');
    });

</script>
@endsection
