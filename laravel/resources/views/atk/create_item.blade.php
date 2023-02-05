@extends('layouts.manonjaya')
@section('konten')
<div class="container">
    @if (Session::get('error'))
    {{ Session::get('error') }}
    @endif
    <form action="{{ route('atk.store') }}" method="POST">
        @csrf
        <div class="relative overflow-x-auto shadow-md mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Item name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3 w-48">
                            Bobot
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button class="text-indigo-600">Action</button>
                        </th>
                    </tr>
                </thead>

                <tbody id="input">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <input type="text" id="item_name" name="item_name[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </th>
                        <td class="px-6 py-4">
                            <select id="satuan" name="satuan[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="pcs">pcs</option>
                                <option value="lembar">lembar</option>
                                <option value="unit">unit</option>
                                <option value="stick">stick</option>
                                <option value="roll">roll</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="text" id="bobot" name="bobot[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
<script>
    $(document).ready(function () {
        $('#add-row').click(function (e) {
            e.preventDefault();
            let tr = `<tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input type="text" id="item_name" name="item_name[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </th>
                    <td class="px-6 py-4">
                        <select id="satuan" name="satuan[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="pcs">pcs</option>
                                <option value="lembar">lembar</option>
                                <option value="unit">unit</option>
                                <option value="stick">stick</option>
                                <option value="roll">roll</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                            <input type="text" id="bobot" name="bobot[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                    <td class="px-6 py-4 text-center">
                        <button type="button" class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
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
