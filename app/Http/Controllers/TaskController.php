<?php

namespace App\Http\Controllers;

use App\Models\Task; // Impor model Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan daftar tugas
    public function index()
    {
        $tasks = Task::paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan form tambah tugas
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }

    // Menampilkan form edit tugas
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui tugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }

    // Menghapus tugas
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
