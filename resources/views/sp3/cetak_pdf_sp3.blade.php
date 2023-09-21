<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Sp3 Yang Belum Masuk</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            width: 100%;
            margin-top: 70px;
        }

        .table1,
        th,
        td {
            border: 1px solid #999;
            padding: 4px 6px;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 30px;
        }

        h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        .kop-surat {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        #title {
            text-align: center;
            font-weight: bold;
        }

        #logo1 {
            width: 80px;
            position: absolute;
            top: 20px;
        }

        #logo2 {
            width: 68px;
            position: absolute;
            top: 25px;
            right: 0;
        }

        #col-ttd {
            margin-top: 10px;
            /* background: #34d399; */
            width: 220px;
            padding: 10px;
            box-sizing: border-box;
        }

        #membuat,
        #nama-pembuat,
        #nama-jabatan,
        #tgl {
            font-size: 12px;
            text-align: center;
        }

        #nama-pembuat {
            margin-top: 60px;
            text-decoration: underline;
        }

        #nama-jabatan {
            margin-top: -12px;
        }

    </style>
</head>

<body>
    <div class="kop-surat">
        <img src="{{ asset('baik.png') }}" id="logo1">
        <img src="{{ asset('koperasi.png') }}" id="logo2">
    </div>
    <h1>List SP3 Yang Belum Masuk</h1>
    {{-- <h2>{{ date('F Y') }}</h2> --}}
    <table class="table1">
        <thead>
            <tr id="title">
                <th width="10">No</th>
                <td>Nama Anggota</td>
                <td>Majelis</td>
                <td>Petugas</td>
                <td>Tgl MBA</td>
                {{-- <td>Status</td> --}}
                <td>Nominal</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            $total=0;
            @endphp
            @foreach ($sp3 as $item)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $item->wakalah[0]->nama_anggota }}</td>
                <td>{{ $item->wakalah[0]->majelis }}</td>
                <td>{{ $item->wakalah[0]->petugas }}</td>
                <td>{{ date('d-m-Y', strtotime($item->wakalah[0]->trx_mba)) }}</td>
                {{-- <td>{{ $item->status }}</td> --}}
                <td>{{ number_format($item->wakalah[0]->nominal,0,',','.',) }}</td>
                <td>{{$item->status}}</td>
            </tr>
            @php

            $total+=$item->wakalah[0]->nominal
            @endphp
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">GrandTotal</th>
                <td>{{number_format($total,0,',','.')}}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div id="col-ttd">
        <h3 id="tgl">Manonjaya,{{ date('d F Y')}} </h3>
        <h3 id="membuat">Membuat</h3>
        <h3 id="nama-pembuat">{{ Auth::user()->name }}</h3>
        <h3 id="nama-jabatan">ADMP</h3>
    </div>
</body>

</html>
