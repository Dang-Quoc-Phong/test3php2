@extends('layout.main')
@section('content')
    <a href="add-task">Them moi cong viec</a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Name</th>

            <th>Action</th>

        </thead>
        <tbody>
            @foreach ($tasks as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>

                    <th>
                        <a href="edit-task/{{ $c->id }}">Sửa</a>
                        <a href="delete-task/{{ $c->id }}"
                            onclick="return confirm('Ban chac chan muon xoa khong?')">Xóa</a>
                    </th>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
