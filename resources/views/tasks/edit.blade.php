<h1>Edit Tugas</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Judul:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}" required>

    <label for="description">Deskripsi:</label>
    <textarea name="description" id="description" required>{{ $task->description }}</textarea>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>

    <button type="submit">Update</button>
</form>
