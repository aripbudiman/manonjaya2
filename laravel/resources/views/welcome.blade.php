@extends('layouts.manonjaya')
@section('konten')
<div class="">
    <h1 class="text-5xl mt-5 font-love text-center uppercase text-stone-900">Selamat Datang di cabang MANONJAYA</h1>
    <div class="mt-5 grid grid-cols-4">
        <div
            class="flex flex-row m-auto bg-gradient-to-r from-indigo-700 via-indigo-800 to-indigo-900 p-6 gap-8 rounded-lg border-2 border-indigo-500">
            <div class="my-auto">
                <div class="text-lg text-indigo-300">Wakalah</div>
                <div class="text-xl text-indigo-100">{{ number_format($wakalah[0]->nominal, 0, ',', '.') }}</div>
            </div>
            <div
                class="text-indigo-300 my-auto bg-gradient-to-l from-indigo-700 via-indigo-800 to-indigo-900 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cash h-12 w-12"
                    viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                    <path
                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                </svg>
            </div>
        </div>
        <div
            class="flex flex-row m-auto bg-gradient-to-r from-rose-700 via-rose-800 to-rose-900 p-6 gap-8 rounded-lg border-2 border-rose-500">
            <div class="my-auto">
                <div class="text-lg text-rose-300">Titipan</div>
                <div class="text-xl text-rose-100">{{ number_format($titipan[0]->nominal, 0, ',', '.') }}</div>
            </div>
            <div class="text-rose-300 my-auto bg-gradient-to-l from-rose-700 via-rose-800 to-rose-900 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cash h-12 w-12"
                    viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                    <path
                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                </svg>
            </div>
        </div>
        <div
            class="flex flex-row m-auto bg-gradient-to-r from-teal-700 via-teal-800 to-teal-900 p-6 gap-8 rounded-lg border-2 border-teal-500">
            <div class="my-auto">
                <div class="text-lg text-teal-300">Selisih Lebih</div>
                <div class="text-4xl text-teal-100">622k</div>
            </div>
            <div class="text-teal-300 my-auto bg-gradient-to-l from-teal-700 via-teal-800 to-teal-900 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                </svg>
            </div>
        </div>
        <div
            class="flex flex-row m-auto bg-gradient-to-r from-stone-700 via-stone-800 to-stone-900 p-6 gap-8 rounded-lg border-2 border-stone-500">
            <div class="my-auto">
                <div class="text-lg text-stone-300">Selisih Kurang</div>
                <div class="text-4xl text-stone-100">622k</div>
            </div>
            <div
                class="text-stone-300 my-auto bg-gradient-to-l from-stone-700 via-stone-800 to-stone-900 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="mt-5 grid grid-cols-2 gap-10">
        <ul
            class=" divide-y divide-gray-200 rounded-lg dark:divide-gray-700 border-2 border-rose-500 p-5 bg-gradient-to-r from-rose-700 via-rose-800 to-rose-900">
            <h1 class="text-4xl text-center text-rose-300 font-love">Saldo Titipan</h1>
            @foreach ($titipans as $item)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle text-rose-300" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 items-center">
                        <p class="text-sm font-medium text-rose-200 truncate dark:text-white">
                            {{ $item->petugas }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-rose-300 dark:text-white">
                        Rp {{ number_format($item->nominal,0,',','.') }}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <ul
            class=" divide-y divide-gray-200 rounded-lg dark:divide-gray-700 border-2 border-indigo-500 p-5 bg-gradient-to-r from-indigo-700 via-indigo-800 to-indigo-900">
            <h1 class="text-4xl text-center text-indigo-300 font-love">Saldo Wakalah</h1>
            @foreach ($listwkl as $item)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle text-indigo-300" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 items-center">
                        <p class="text-sm font-medium text-indigo-200 truncate dark:text-white">
                            {{ $item->petugas }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-indigo-300 dark:text-white">
                        Rp {{ number_format($item->nominal,0,',','.') }}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <ul
            class=" divide-y divide-gray-200 rounded-lg dark:divide-gray-700 border-2 border-teal-500 p-5 bg-gradient-to-r from-teal-700 via-teal-800 to-teal-900">
            <h1 class="text-4xl text-center text-teal-300 font-love">Saldo Wakalah</h1>
            @foreach ($listwkl as $item)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle text-teal-300" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 items-center">
                        <p class="text-sm font-medium text-teal-200 truncate dark:text-white">
                            {{ $item->petugas }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-teal-300 dark:text-white">
                        Rp {{ number_format($item->nominal,0,',','.') }}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <ul
            class=" divide-y divide-gray-200 rounded-lg dark:divide-gray-700 border-2 border-stone-500 p-5 bg-gradient-to-r from-stone-700 via-stone-800 to-stone-900">
            <h1 class="text-4xl text-center text-stone-300 font-love">Saldo Wakalah</h1>
            @foreach ($listwkl as $item)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle text-stone-300" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0 items-center">
                        <p class="text-sm font-medium text-stone-200 truncate dark:text-white">
                            {{ $item->petugas }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-stone-300 dark:text-white">
                        Rp {{ number_format($item->nominal,0,',','.') }}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
