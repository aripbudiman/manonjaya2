@extends('layouts.manonjaya')
@section('konten')
<form action="{{ route('saldo') }}" method="post" class="lg:w-72">
    @csrf
    <select id="status" name="status"
        class="bg-gray-50 max-w-sm mt-10 mb-5 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="OnProses">wakalah</option>
        <option value="Reject">Batal Pembiayaan</option>
        <option value="Approve">Sudah MBA</option>
    </select>
    <div class="button_date mb-5 flex items-center">
        <div class="relative max-w-sm">
            <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" id="dari" name="dari"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full  p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="dari tanggal" autocomplete="off" value="{{ date('Y-m-01') }}">
        </div>
        <h2 class="mx-2 text-gray-500">s/d</h2>
        <div class="relative max-w-sm">
            <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" id="sampai" name="sampai"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full  p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="sampai tanggal" autocomplete="off" value="{{ date('Y-m-01') }}">
        </div>
    </div>
    <div>
        <button type="submit" id="tampilkan"
            class="text-white bg-emerald-800 hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-300 font-medium text-sm px-5 py-2.5 dark:bg-emerald-800 dark:hover:bg-emerald-700 dark:focus:ring-emerald-700 dark:border-emerald-700">Tampilkan</button>
        <a id="pdf"
            class="text-white cursor-pointer bg-emerald-800 hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-300 font-medium text-sm px-5 py-2.5 dark:bg-emerald-800 dark:hover:bg-emerald-700 dark:focus:ring-emerald-700 dark:border-emerald-700">PDF</a>
        <button type="button" id="excel"
            class="text-white bg-emerald-800 hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-300 font-medium text-sm px-5 py-2.5 dark:bg-emerald-800 dark:hover:bg-emerald-700 dark:focus:ring-emerald-700 dark:border-emerald-700">Excel</button>
    </div>
</form>
<hr class="mt-5">
<div class="relative overflow-x-auto mt-7">
    <table class="w-full text-sm border text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-emerald-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nominal
                </th>
            </tr>
        </thead>
        <tbody id="load-data">
            @foreach ($wakalah as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->petugas }}
                </th>
                <td class="px-6 py-4">
                    Rp {{ number_format($item->total,0,',','.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('#pdf').click(function (e) {
            e.preventDefault();
            const dari = $('#dari').val();
            const sampai = $('#sampai').val();
            const status = $('#status').val();
            window.open(`cetak_pdf/${dari}/${sampai}/${status}`, '_blank');
        });

        $('#excel').click(function (e) {
            e.preventDefault();
            const dari = $('#dari').val();
            const sampai = $('#sampai').val();
            const status = $('#status').val();
            window.open(`cetak_wakalah_xlsx/${dari}/${sampai}/${status}`, '_blank');
        });
    });

</script>
@endsection
