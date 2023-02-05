@extends('layouts.manonjaya')
@section('konten')
<div class="grid grid-cols-2">
    <form action="{{ route('wakalah.update',$wakalah->id) }}" method="POST" class="my-10">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anggota</label>
            <input type="text" id="nama" name="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $wakalah->nama_anggota }}" required>
        </div>
        <div class="mb-6">
            <label for="majelis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="majelis" name="majelis"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($majelis as $item)
                @if ($item->nama == $wakalah->majelis)
                <option value="{{ $item->nama }}" selected>{{ $item->nama }}</option>
                @else
                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="petugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="petugas" name="petugas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($petugas as $item)
                @if ($item->name == $wakalah->petugas)
                <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                @else
                <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="nominal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nominal
            </label>
            <input type="text" id="nominal" name="nominal"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ number_format($wakalah->nominal,0,',','.') }}" required>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        <a href="{{ route('wakalah.index') }}"
            class="text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Cancel</a>
    </form>
</div>
@endsection
