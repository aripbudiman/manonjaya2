@extends('layouts.manonjaya')
@section('konten')
<div class="_table_items_atk">
    @include('atk.groupbutton')
    @if (Session::get('success'))
    <div id="alert-border-1"
        class="flex p-4 mb-4 my-5 text-indigo-800 border-t-4 border-indigo-300 bg-indigo-50 dark:text-indigo-400 dark:bg-gray-800 dark:border-indigo-800"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 text-sm font-medium">
            {{ Session::get('success') }}
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-indigo-50 text-indigo-500 rounded-lg focus:ring-2 focus:ring-indigo-400 p-1.5 hover:bg-indigo-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-indigo-300 dark:hover:bg-gray-700"
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
    <div class="relative overflow-x-auto shadow-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        Items name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Satuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bobot
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
                @foreach ($items as $item)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->item_name }}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{ $item->satuan }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->stok }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->bobot }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if ($item->stok <= $item->bobot)
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Sedikit
                                Lagi</span>
                            @else
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Cukup</span>
                            @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button
                            onclick="edit(`{{$item->item_name}}`,`{{ $item->satuan }}`,`{{ $item->id }}`,`{{ $item->bobot }}`)"
                            class="edit-item font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Edit</button>
                        <form action="{{ route('atk.destroy',$item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ml-3 font-medium text-pink-600 dark:text-pink-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Main modal -->
<div id="modal-edit-item" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            {{-- <button type="button" onclick="hide()" id="hide-modal"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button> --}}
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Item</h3>
                <form class="space-y-6" method="POST" action="{{ route('update.item') }}">
                    @csrf
                    <input type="hidden" id="id_item" name="id">
                    <div>
                        <label for="item_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name Item</label>
                        <input type="text" name="item_name" id="item_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="" required>
                    </div>
                    <div>
                        <select id="satuan" name="satuan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                            <option value="pcs">pcs</option>
                            <option value="lembar">lembar</option>
                            <option value="unit">unit</option>
                            <option value="stick">stick</option>
                            <option value="roll">roll</option>
                        </select>
                    </div>
                    <div>
                        <label for="bobot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Bobot</label>
                        <input type="text" name="bobot" id="bobot"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end modal edit --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    const $targetEl = document.getElementById('modal-edit-item');
    const options = {
        placement: 'center-center',
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        closable: true,
        onHide: () => {
            console.log('modal is hidden');
        },
        onShow: () => {
            console.log('modal is shown');
        },
        onToggle: () => {
            console.log('modal has been toggled');
        }
    };

    function edit(name, satuan, id, bobot) {
        const modal = new Modal($targetEl, options);
        $('#item_name').val(`${name}`);
        $('#id_item').val(`${id}`);
        $('#bobot').val(`${bobot}`);

        modal.show()
    }

    $(document).ready(function () {
        $('#hide-modal').click(function (e) {
            e.preventDefault();
            // const modal = new Modal($targetEl, options);
            // modal.hide()
            $('#modal-edit-item').addClass('hidden')
        });
    });

</script>
@endsection
