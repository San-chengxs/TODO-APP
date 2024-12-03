<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas Baru</title>
    <style>
        /* Reset dasar untuk margin dan padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styling umum untuk body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 30px;
            margin: 0;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Flexbox untuk container */
        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 1200px;
            height: 80vh;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        /* Gambar di sebelah kanan */
        .background-image {
            width: 50%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
            opacity: 0.7;  /* Menambahkan transparansi */
        }

        /* Form styling di sisi kiri */
        .form-container {
            width: 50%;
            background-color: rgba(255, 255, 255, 0.9); /* Setengah transparan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: slideIn 1s ease-out, fadeIn 1.5s ease-out;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
            position: relative;
            z-index: 10;
            animation: fadeIn 2s ease-out;
        }

        /* Styling form */
        label {
            font-size: 1.1em;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        /* Animasi pada button saat hover */
        button:hover {
            background-color: #45a049;
            transform: scale(1.05);
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
                transform: translateX(-50px);
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
            <h1>Tambah Tugas Baru</h1>

            <!-- Form untuk tambah tugas -->
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <!-- Input untuk Judul -->
                <label for="title">Judul:</label>
                <input type="text" name="title" id="title" required>

                <!-- Input untuk Deskripsi -->
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" required></textarea>

                <!-- Dropdown untuk Status -->
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>

                <!-- Tombol submit -->
                <button type="submit">Simpan</button>
            </form>
        </div>

        <!-- Gambar background di kanan -->
        <img src="{{ asset('images/12.jpg') }}" alt="Background Image" class="background-image">
    </div>

</body>
</html>
