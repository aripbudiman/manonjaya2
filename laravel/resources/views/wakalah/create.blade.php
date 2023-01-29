@extends('layouts.manonjaya')
@section('konten')
@if (Session::get('success'))
<div id="alert-border-1"
    class="flex p-4 mb-4 mt-10 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800"
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium">
        <a href="{{ route('wakalah.index') }}"
            class="font-semibold underline hover:no-underline">{{ Session::get('success') }}, Cek data!</a>
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
<form action="{{ route('wakalah.store') }}" method="post">
    @csrf
    <div class="relative my-10 w-48">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <input datepicker datepicker-format="yyyy/mm/dd" type="text" name="trx_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Select date" autocomplete="off" required>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class=" text-gray-700 border-x uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-1 py-3">
                    No
                </th>
                <th scope="col" class="px-1 py-3">
                    Nama Anggota
                </th>
                <th scope="col" class="px-1 py-3">
                    Majelis
                </th>
                <th scope="col" class="px-1 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-1 py-3">
                    Nominal Droping
                </th>
                <th scope="col" class="px-1 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="input">
            <tr
                class="bg-white border-b border-x dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-100 dark:hover:bg-gray-600">
                <th scope="row"
                    class="px-1 py-2 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <input type="text" id="nama_anggota" name="nama_anggota[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </th>
                <td class="px-1 py-2">
                    <select id="majelis" name="majelis[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($majelis as $m)
                        <option value="{{ $m->nama }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-1 py-2">
                    <select id="petugas" name="petugas[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($petugas as $p)
                        <option value="{{ $p->name }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-1 py-2">
                    <input type="text" id="nominal" name="nominal[]"
                        class="nominal bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </td>
                <td class="px-1 py-2 text-center">
                    <button type="button"
                        class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="bg-gray-100 border-b border-x">
                <th colspan="4" scope="row"
                    class="px-1 py-2 text-center text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    GrandTotal
                </th>
                <td class="px-1 py-2">
                    <input type="text" id="grand-total" data-a-sign="Rp "
                        class="grand-total bg-gray-50 border border-gray-300 text-indigo-500 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required readonly>
                </td>
                <td class="px-1 py-2 text-center">
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="flex justify-center">
        <button type="button" id="add-row"
            class="text-white my-5 bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Add
            Row</button>
        <button type="submit"
            class="text-white my-5 bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Posting
            Wakalah</button>
        <a href="{{ route('wakalah.index') }}"
            class="text-white my-5 bg-gradient-to-r from-pink-500 via-pink-600 to-pink-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancel</a>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
<script src="{{ url('') }}/public/autoNumeric.js"></script>
<script>
    $(document).ready(function () {
        rp()
        let no = 2;
        $('#add-row').click(function (e) {
            e.preventDefault();
            let tr = `<tr
                class="bg-white border-b border-x dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-100 dark:hover:bg-gray-600">
                <th scope="row"
                    class="px-1 py-2 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ${no++}
                </th>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <input type="text" id="nama_anggota" name="nama_anggota[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </th>
                <td class="px-1 py-2">
                    <select id="majelis" name="majelis[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($majelis as $m)
                        <option value="{{ $m->nama }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-1 py-2">
                    <select id="petugas" name="petugas[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($petugas as $p)
                        <option value="{{ $p->name }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-1 py-2">
                    <input type="text" id="nominal" name="nominal[]"
                        class="nominal bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </td>
                <td class="px-1 py-2 text-center">
                    <button type="button"
                        class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                </td>
            </tr>`
            $('#input').append(tr);
            rp()
            nominal()
        });
        $(document).on('click', '.delete', function (event) {
            let el = event.target.parentElement.parentElement;
            $(el).remove();
        })

        $(document).on('keyup', '.nominal', function () {
            nominal()
        })
        $('#grand-total').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        })
    });

    function nominal() {
        let nominal = document.querySelectorAll('.nominal');
        let total = 0;
        nominal.forEach(n => {
            let angka = $(n).autoNumeric('get')
            total += Number(angka)
        });
        $('#grand-total').val(total);
        // let result = $('#grand-total').val()
        $('#grand-total').autoNumeric('update', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        })
    }


    function rp() {
        $('.nominal').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });
    }

</script>
@endsection
