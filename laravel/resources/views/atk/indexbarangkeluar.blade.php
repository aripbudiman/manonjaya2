@extends('layouts.manonjaya')
@section('konten')
<div class="_table_barang_keluar">
    @include('atk.groupbutton')
    <div class="relative overflow-x-auto">
        <table class="w-full table-auto text-sm text-left cell-border text-gray-500 dark:text-gray-400"
            id="table-atk-keluar">
            <thead class="text-xs text-gray-700 uppercase bg-indigo-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Petugas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangkeluar as $bm)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-indigo-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $bm->petugas }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $bm->items->item_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y',strtotime($bm->trx_date)) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bm->qty}} {{$bm->items->satuan}}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('barangkeluar.destroy',$bm->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit"
                                class="text-red-500 hover:underline">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#table-atk-keluar').DataTable({
            "lengthMenu": [
                [10, 5, 25, 50, -1],
                [10, 5, 25, 50, "All"]
            ]
        });
        $('#table-atk-keluar_filter').addClass('mb-4');
        $('#table-atk-keluar_info').addClass('mt-5 mb-20');
        $('#table-atk-keluar_paginate').addClass('mt-5 mb-20');
        $('select[name="table-atk-keluar_length"]').addClass('w-14');
    });

</script>
@endsection
