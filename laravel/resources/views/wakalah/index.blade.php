@extends('layouts.manonjaya')
@section('konten')
@include('wakalah.button')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-indigo-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    No
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
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($wakalah as $wkl)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $no++ }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $wkl->nama_anggota }}
                </th>
                <td class="px-6 py-4">
                    {{ $wkl->majelis }}
                </td>
                <td class="px-6 py-4">
                    {{ $wkl->petugas }}
                </td>
                <td class="px-6 py-4">
                    {{ number_format($wkl->nominal, 0, ",", ".") }}
                </td>
                <td class="px-6 py-4 text-center text-indigo-500">
                    {{ $wkl->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
