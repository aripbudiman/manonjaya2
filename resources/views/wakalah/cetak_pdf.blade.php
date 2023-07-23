<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wakalah</title>
    <style>
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            width: 100%;
        }

        .table1,
        th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
        }

        h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
        }

        h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        img {
            float: right;
            width: 100px;
        }

        .kop-surat {
            display: flex;
            justify-content: space-between
        }

    </style>
</head>

<body>
    {{-- <div class="kop-surat">
        <img src="{{ asset('user1.jpg') }}">
    <img src="{{ asset('user1.jpg') }}">
    </div> --}}
    <h1>List Saldo Kas Wakalah / Petugas Cabang Manonjaya</h1>
    <h2>{{ date('F Y') }}</h2>
    <table class="table1">
        <thead>
            <tr>
                <th width="10">No</th>
                <td>Nama Petugas</td>
                <td>Nominal</td>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            $total=0;
            @endphp
            @foreach ($wakalah as $item)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $item->petugas }}</td>
                <td>{{ number_format($item->total,0,',','.') }}</td>
            </tr>
            @php
            $total+=$item->total;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">GrandTotal</th>
                <td>{{ number_format($total,0,',','.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
