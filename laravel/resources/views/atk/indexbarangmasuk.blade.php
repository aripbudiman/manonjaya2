@extends('layouts.manonjaya')
@section('konten')
<div class="_table_barang_masuk">
    @include('atk.groupbutton')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-indigo-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
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
                @foreach ($barangmasuk as $bm)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                        <form action="{{ route('barangmasuk.destroy',$bm->id) }}" method="POST">
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

@endsection
