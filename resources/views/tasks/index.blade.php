<h1>Daftar Tugas</h1>
<a href="{{ route('tasks.create') }}">Tambah Tugas Baru</a>

<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                    
                    <form action="{{ route('tasks.index') }}" method="GET">
    <input type="text" name="search" placeholder="Cari tugas...">
    <button type="submit">Cari</button>
</form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $tasks->links() }} <!-- Pagination links -->
