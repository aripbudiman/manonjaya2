@extends('layouts.manonjaya')
@section('konten')
<div class="relative my-10 overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mb-3">
        <a target="_blank" href="{{ route('sp3.pdf') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white inline-block font-bold py-2 px-4 rounded">PDF</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class=" text-gray-700 uppercase bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-1 py-3">
                    No
                </th>
                <th scope="col" class="px-1 py-3">
                    Nama
                </th>
                <th scope="col" class="px-1 py-3">
                    Majelis
                </th>
                <th scope="col" class="px-1 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-1 py-3">
                    Tgl Murabahah
                </th>
                <th scope="col" class="px-1 py-3">
                    Nominal
                </th>
                <th scope="col" class="px-1 py-3">
                    Status Sp3
                </th>
                <th scope="col" class="px-1 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            $total=0;
            @endphp
            @forelse ($sp3 as $item)
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-100 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $no++ }}
                </th>
                <td class="px-1 py-2">
                    {{ $item->wakalah[0]->nama_anggota }}
                </td>
                <td class="px-1 py-2">
                    {{ $item->wakalah[0]->majelis }}
                </td>
                <td class="px-1 py-2">
                    {{ $item->wakalah[0]->petugas }}
                </td>
                <td class="px-1 py-2">
                    {{ $item->wakalah[0]->trx_mba }}
                </td>
                <td class="px-1 py-2 kredit">
                    {{ number_format($item->wakalah[0]->nominal,0,',','.',) }}
                </td>
                <td class="px-1 py-2 kredit">
                    {{ $item->status }}
                </td>
                <td class="px-1 py-2 text-center">
                    <form action="{{ route('sp3.edit',$item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button title="masuk" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-box-arrow-in-left text-emerald-500" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <h1>Tidak ada</h1>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
