<h1>Tambah Tugas Baru</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Judul:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Deskripsi:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
    </select>

    <button type="submit">Simpan</button>
</form>
