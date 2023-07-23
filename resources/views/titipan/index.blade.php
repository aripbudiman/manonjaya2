@extends('layouts.manonjaya')
@section('konten')
@if (Auth::user()->role =='admin')
@include('titipan.modal_import')
@endif

<div class="relative my-10 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class=" text-gray-700 uppercase bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-1 py-3">
                    No
                </th>
                <th scope="col" class="px-1 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-1 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-1 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-1 py-3">
                    Nominal
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
            @foreach ($titipan as $item)
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-100 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $no++ }}
                </th>
                <td class="px-1 py-4">
                    {{ $item->trx_date }}
                </td>
                <td class="px-1 py-4">
                    {{ $item->petugas }}
                </td>
                <td class="px-1 py-4">
                    {{ $item->description }}
                </td>
                <td class="px-1 py-4 kredit">
                    {{ number_format($item->kredit, 0, ",", ".") }}
                </td>
                <td class="px-1 py-4 text-center">
                    <form action="{{ route('titipan.update',$item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-cash-coin text-teal-600" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                <path
                                    d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                <path
                                    d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @php
            $total+=$item->kredit;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-100 border-b border-x">
                <th colspan="4" scope="row"
                    class="px-1 py-2 text-center text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Saldo Simpanan
                </th>
                <td class="px-1 py-2">
                    Rp {{ number_format($total, 0, ",", ".") }}
                </td>
                <td class="px-1 py-2 text-center">
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="{{ url('') }}/public/autoNumeric.js"></script>
<script>


</script>
@endsection
