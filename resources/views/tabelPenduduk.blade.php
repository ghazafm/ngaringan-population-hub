<!DOCTYPE html>
<html>
<head>
    <title>Data Table</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>No. Reg</th>
                <th>No. KK</th>
                <th>Nama</th>
                <th>Status Perkawinan</th>
                <th>Kelamin</th>
                <th>Pendidikan</th>
                <th>Tanggal Lahir</th>
                <th>Status dalam Keluarga</th>
                <th>Pekerjaan</th>
                <th>PBI</th>
                <th>Keterangan</th>
                <th>ID Rumah</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->no_reg }}</td>
                <td>{{ $item->no_kk }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->status_perkawinan }}</td>
                <td>{{ $item->kelamin }}</td>
                <td>{{ $item->pendidikan }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->status_dalam_keluarga }}</td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->pbi }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->id_rumah }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
