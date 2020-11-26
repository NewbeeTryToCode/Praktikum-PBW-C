<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Generator</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    function checkGrade(int $nilai) : string{
        return ($nilai>=80) ? "A": (($nilai>=70) ? "B" :(($nilai>=60) ? "C" : "Anda Terlalu Bodoh"));
    }

    ?>
    <h2>Nilai Generator Untuk Mahasiswa</h2>
    <form method="POST" class="main_form" action="">
        <div class="input_group">
            <label for="nama">Nama</label>
            <input type="text" name="nama">
        </div>
        <div class="input_group">
            <label for="nim">NIM</label>
            <input type="number" name="nim">
        </div>
        <div class="input_group">
            <label for="nilai_tugas">Nilai Tugas Anda</label>
            <input type="number" name="nilai_tugas" max="100" min="0">
        </div>
        <div class="input_group">
            <label for="nilai_uts">Nilai UTS Anda</label>
            <input type="number" name="nilai_uts" max="100" min="0">
        </div>
        <div class="input_group">
            <label for="nilai_uas">Nilai UAS Anda</label>
            <input type="number" name="nilai_uas" max="100" min="0">
        </div>
        <div class="input_group">
            <button class="btn" name="hitung" type="submit">Hitung</button>
        </div>
    </form>

    <?php    
    if(isset($_POST["hitung"])){
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_uts = $_POST["nilai_uts"];
        $nilai_uas = $_POST["nilai_uas"];
        $nilai_akhir = ($nilai_tugas + $nilai_uas + $nilai_uts)/3;
        $grade = checkGrade($nilai_akhir);
        echo "<div><h2>Nilai Akhir Anda adalah {$nilai_akhir}</h2>";
        if($grade=="Anda Terlalu Bodoh"){
            echo "<h2>{$grade}</h2></div>";
        }else{
            echo "<h2>Selamat Anda Lulus Dengan Predikat {$grade}</h2> </div>";
        }
        
    }
?>
</body>

</html>