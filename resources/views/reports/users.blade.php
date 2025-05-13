<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Date: {{ $date }}</p>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email/Username</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
