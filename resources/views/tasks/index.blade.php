<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Reset dasar untuk margin dan padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style untuk body */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Gradasi latar belakang biru cerah */
            color: #333;
            padding: 30px 10%;
            margin: 0;
            line-height: 1.6;
        }

        /* Style untuk judul */
        h1 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            color: #2C3E50;
            margin-bottom: 30px;
            font-size: 3em;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: fadeIn 2s ease-out;
        }

        /* Link - Tambah Tugas Baru di kiri */
        .add-task-link {
            text-decoration: none;
            color: #F39C12;
            font-weight: bold;
            font-size: 1.1em;
            display: inline-block;
            margin-bottom: 20px;
            transition: color 0.3s ease, transform 0.3s ease;
            animation: slideInLeft 1s ease-out;
        }

        .add-task-link:hover {
            color: #E67E22;
            transform: translateX(5px);
        }

        /* Video container */
        .video-container {
            position: relative;
            width: 100%;
            max-width: 100%; /* Sesuaikan ukuran layar */
            height: 450px;
            margin: 0 auto 40px auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 2s ease-out;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: opacity 0.5s ease-in-out;
        }

        .video-container video:hover {
            opacity: 1;
        }

        /* Animasi untuk elemen muncul */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi slide-in dari kiri */
        @keyframes slideInLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 3s ease-out;
        }

        table th, table td {
            padding: 20px 25px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #F39C12;
            color: white;
            font-size: 1.1em;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        table tr:hover {
            background-color: #f9f9f9;
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        table td {
            color: #555;
            font-size: 1em;
        }

        /* Tombol Hapus dan Edit */
        button {
            padding: 12px 25px;
            border: none;
            background-color: #E74C3C;
            color: white;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #C0392B;
            transform: translateY(-2px);
        }

        /* Form Pencarian */
        form {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 10px;
            animation: fadeIn 4s ease-out;
        }

        input[type="text"] {
            padding: 14px 18px;
            width: 350px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1.1em;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #F39C12;
        }

        button[type="submit"] {
            padding: 14px 20px;
            background-color: #F39C12;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #E67E22;
        }

        /* Pagination Links */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .pagination a {
            text-decoration: none;
            padding: 14px 25px;
            background-color: #F39C12;
            color: white;
            border-radius: 8px;
            margin: 0 8px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #E67E22;
        }

        .pagination .active {
            background-color: #D35400;
        }
    </style>
</head>
<body>
    <!-- Link "Tambah Tugas Baru" di kiri -->
    <a href="{{ route('tasks.create') }}" class="add-task-link">Tambah Tugas Baru</a>

    <h1>Daftar Tugas</h1>

    <!-- Menampilkan video full-width dengan transparansi dan efek -->
    <div class="video-container">
        <video autoplay muted loop>
            <source src="{{ asset('vidios/vidio.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Daftar Tugas -->
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

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pencarian Tugas -->
    <form action="{{ route('tasks.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari tugas...">
        <button type="submit">Cari</button>
    </form>

    <!-- Pagination -->
    <div class="pagination">
        {{ $tasks->links() }}
    </div>
</body>
</html>
