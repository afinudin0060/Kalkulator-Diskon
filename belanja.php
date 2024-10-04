<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISCOUNT</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #1f1f1f;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
            max-width: 400px;
            text-align: center;
            color: #fff;
        }
        h1 {
            color: #00ff6c;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            text-align: left;
            color: #b3b3b3;
        }
        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 10px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
        }
        input[type="text"]:focus, select:focus {
            border-color: #00ff6c;
            outline: none;
        }
        button {
            background-color: #00ff6c;
            color: #000;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #00e65a;
        }
        .result {
            background-color: #00ff6c;
            color: #000;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }
        .result h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .result p {
            font-size: 1.2em;
            margin: 5px 0;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Kalkulator Diskon</h1>
    <form method="POST">
        <label for="member">Status Member</label>
        <select name="member" id="member">
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>

        <label for="total">Total Belanja (Rp)</label>
        <input type="text" id="total" name="total" placeholder="Masukkan total belanja" required>

        <button type="submit" name="submit">Hitung Diskon</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $is_member = $_POST['member'] === 'yes';
        $total_belanja = floatval($_POST['total']);
        $diskon = 0;

        if ($is_member) {
            if ($total_belanja > 1000000) {
                $diskon = 15;
            } elseif ($total_belanja > 500000) {
                $diskon = 10;
            } else {
                $diskon = 10; 
            }
        } else {
            if ($total_belanja > 1000000) {
                $diskon = 10;
            } elseif ($total_belanja > 500000) {
                $diskon = 5;
            } else {
                $diskon = 0; 
            }
        }

        $jumlah_diskon = ($diskon / 100) * $total_belanja;
        $total_bayar = $total_belanja - $jumlah_diskon;

        echo '<div class="result">';
        echo "<h2>Hasil Perhitungan</h2>";
        echo "<p>Diskon: <strong>$diskon%</strong></p>";
        echo "<p>Jumlah Diskon: <strong>Rp " . number_format($jumlah_diskon, 0, ',', '.') . "</strong></p>";
        echo "<p>Total Bayar: <strong>Rp " . number_format($total_bayar, 0, ',', '.') . "</strong></p>";
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
