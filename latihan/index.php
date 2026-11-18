<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Segitiga Bintang Simetris</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        .form-box {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            max-width: 400px;
            background-color: #f9f9f9;
        }
        .error {
            color: #d9534f;
            font-weight: bold;
        }
        /* Menggunakan font monospace dan tag <pre> agar spasi dan bintang sejajar simetris */
        pre {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            background-color: #222;
            color: #00ffcc;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
            line-height: 1.2;
        }
    </style>
</head>
<body>

    <h2>Generator Segitiga Bintang Simetris</h2>

    <div class="form-box">
        <form method="POST" action="">
            <label for="tinggi">Masukkan tinggi segitiga (1 - 20):</label><br><br>
            <input type="text" id="tinggi" name="tinggi" placeholder="Contoh: 5" required>
            <button type="submit">Buat Segitiga</button>
        </form>
    </div>

    <?php
    // 1. NARASI LOGIKA: Cek apakah form sudah dikirim menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Ambil nilai input dan bersihkan spasi di awal/akhir
        $input = trim($_POST['tinggi']);

        // 2. VALIDASI MASUKAN:
        // Pastikan input adalah bilangan bulat valid (filter_var) dan berada di rentang 1 sampai 20
        $tinggi = filter_var($input, FILTER_VALIDATE_INT, [
            "options" => [
                "min_range" => 1,
                "max_range" => 100
            ]
        ]);

        // Jika validasi gagal ($tinggi bernilai false)
        if ($tinggi === false) {
            echo "<p class='error'>Pesan: Masukan tidak valid! Harap masukkan bilangan bulat antara 1 sampai 20.</p>";
        } else {
            // Jika validasi berhasil, mulai proses pembentukan segitiga
            echo "<p>Menampilkan segitiga simetris dengan tinggi <strong>$tinggi</strong> baris:</p>";
            
            // Gunakan tag <pre> agar browser mempertahankan setiap karakter spasi
            echo "<pre>";

            // 3. PERULANGAN BERSARANG (NESTED LOOP):
            // Perulangan luar ($baris): Mengatur jumlah baris dari 1 hingga $tinggi
            for ($baris = 1; $baris <= $tinggi; $baris++) {
                
                // Perulangan dalam pertama ($spasi): 
                // Mencetak spasi di sisi kiri agar bintang terdorong ke tengah
                for ($spasi = $tinggi - $baris; $spasi > 0; $spasi--) {
                    echo " ";
                }

                // Perulangan dalam kedua ($bintang): 
                // Mencetak bintang dengan pola bilangan ganjil (2 * baris - 1) agar simetris
                for ($bintang = 1; $bintang <= (2 * $baris - 1); $bintang++) {
                    echo "*";
                }

                // Pindah ke baris baru setelah spasi dan bintang pada baris tersebut selesai dicetak
                echo "\n";
            }

            echo "</pre>";
        }
    }
    ?>

</body>
</html>