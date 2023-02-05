@extends('layouts.manonjaya')
@section('konten')
@php
$mjl =$majelis
@endphp
<h1 class="my-5 text-center uppercase font-bold text-xl">List Wakalah Cabang Manonjaya</h1>
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
