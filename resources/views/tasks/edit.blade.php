<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <style>
        /* Reset dasar untuk margin dan padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style untuk body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            color: #333;
            padding: 0;
            margin: 0;
        }

        /* Menata background gambar */
        .background-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            border-radius: 10px 0 0 10px; /* Mengatur sudut gambar */
        }

        /* Container untuk form dan gambar */
        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 1200px;
            margin: 80px auto;
            height: 80vh;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        /* Form styling di kiri */
        .form-container {
            width: 50%;
            background-color: rgba(255, 255, 255, 0.9); /* Setengah transparan */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: slideIn 1s ease-out, fadeIn 1.5s ease-out;
        }

        h1 {
            text-align: center;
            font-size: 2.8em;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: bold;
        }

        label {
            font-size: 1.2em;
            font-weight: 600;
            color: #555;
        }

        /* Style untuk input dan textarea */
        input[type="text"], textarea, select {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            background-color: #fff;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Fokus pada input, textarea, select */
        input[type="text"]:focus, textarea:focus, select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.5);
        }

        textarea {
            height: 150px;
            resize: none;
        }

        /* Style untuk tombol */
        button {
            padding: 14px 24px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(2px);
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .form-container {
                width: 100%;
                padding: 20px;
            }

            h1 {
                font-size: 2.3em;
            }

            .background-image {
                width: 100%;
                height: 300px;
                border-radius: 10px 10px 0 0;
            }
        }

        /* Animasi */
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

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

    <!-- Container untuk form dan gambar -->
    <div class="container">
        <!-- Form Container di kiri -->
        <div class="form-container">
            <h1>Edit Tugas</h1>

            <!-- Form untuk edit tugas -->
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
        </div>

        <!-- Gambar background di kanan -->
        <img src="{{ asset('images/12345.jpg') }}" alt="Background Image" class="background-image">
    </div>

</body>
</html>
