<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 10px;
			border: 1px solid #ddd;
			font-size: 12px;
			color: #333;
		}

		table th, table td {
			text-align: left;
			padding: 5px;
			border-bottom: 1px solid #ddd;
		}

		table th {
			background-color: #f2f2f2;
			font-weight: bold;
		}

		table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		table tr:hover {
			background-color: #e6e6e6;
		}
        h1,h3{
            text-align: center;
        }
	</style>
</head>
<body>
    <h1>Stok Alat Tulis Kantor</h1>
    <h3>{{ date('l,d F Y') }}</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
				<th>Nama</th>
				<th>Stok</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($data as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->item_name }}</td>
				<td>{{ $item->stok }}</td>
			</tr>
            @endforeach
		</tbody>
	</table>
</body>
</html>