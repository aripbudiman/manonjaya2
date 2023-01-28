@extends('layouts.manonjaya')
@section('konten')
<div class="container">
    @if (Session::get('error'))
    {{ Session::get('error') }}
    @endif
    <form action="{{ route('barangmasuk.store') }}" method="POST">
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

        <div class="relative overflow-x-auto shadow-md mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Item name
                        </th>
                        <th scope="col" class="px-6 py-3 w-40">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button class="text-indigo-600">Action</button>
                        </th>
                    </tr>
                </thead>
                <tbody id="input">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <select id="item_id" name="item_id[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" id="qty" name="qty[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button type="button"
                                class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-center">
                <button type="button" id="add-row"
                    class="text-white my-5 bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Add
                    Row</button>
                <button type="submit"
                    class="text-white my-5 bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Add
                    New Item</button>
                <a href="{{ route('atk.index') }}"
                    class="text-white my-5 bg-gradient-to-r from-pink-500 via-pink-600 to-pink-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancel</a>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('#add-row').click(function (e) {
            e.preventDefault();
            let tr = `<tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <select id="item_id" name="item_id[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" id="qty" name="qty[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button type="button"
                                class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>`
            $('#input').append(tr);
        });

        $(document).on('click', '.delete', function (event) {
            let el = event.target.parentElement.parentElement;
            $(el).remove();
        })
    });

</script>
@endsection
