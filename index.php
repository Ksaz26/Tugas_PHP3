<?php 
    $a1=["nama" => "Salman", "nim" => "01111", "nilai"=>95];
    $a2=["nama" => "Siti", "nim" => "01122", "nilai"=>80];
    $a3=["nama" => "Silha", "nim" => "01123", "nilai"=>78];
    $a4=["nama" => "Sipa", "nim" => "01231", "nilai"=>76];
    $a5=["nama" => "Sulaiman", "nim" => "01112", "nilai"=>86];
    $a6=["nama" => "Salwa", "nim" => "01131", "nilai"=>50];
    $a7=["nama" => "Salma", "nim" => "01148", "nilai"=>50];
    $a8=["nama" => "Sopian", "nim" => "01165", "nilai"=>20];
    $a9=["nama" => "Asep", "nim" => "01287", "nilai"=>30];
    $a10=["nama" => "Usep", "nim" => "01135", "nilai"=>70];
    $a11=["nama" => "Ilham", "nim" => "01145", "nilai"=>65];
    $a12=["nama" => "Amal", "nim" => "01155", "nilai"=>25];
    $a13=["nama" => "Malik", "nim" => "01142", "nilai"=>89];
    $a14=["nama" => "jamal", "nim" => "01236", "nilai"=>45];
    $a15=["nama" => "Budi", "nim" => "01154", "nilai"=>76];
    $a16=["nama" => "Siska", "nim" => "01114", "nilai"=>86];
    $a17=["nama" => "Iqbal", "nim" => "01136", "nilai"=>90];
    $a18=["nama" => "Qori'ah", "nim" => "01149", "nilai"=>78];
    $a19=["nama" => "Tia", "nim" => "01289", "nilai"=>95];
    $a20=["nama" => "Zihan", "nim" => "01356", "nilai"=>95];

    $ar_nim=[$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20];

    $ar_judul = ['No', 'Nama', 'Nim', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    $nilai_mahasiswa = array_column($ar_nim,'nilai');
    $total_nilai = array_sum($nilai_mahasiswa);
    $nilai_tertinggi = max($nilai_mahasiswa);
    $nilai_Terendah = min($nilai_mahasiswa);
    $jumlah_mahasiswa = count($ar_nim);
    $nilai_rata2 = $total_nilai / $jumlah_mahasiswa;

    $keterangan = [
                    'Nilai Tertinggi'=>$nilai_tertinggi,
                    'Nilai Terendah'=>$nilai_Terendah,
                    'Nilai Rata-Rata'=>$nilai_rata2,
                    'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
                    'Jumlah Keseluruhan Nilai'=>$total_nilai,
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Nilai Siswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2 align="center">Daftar Nilai Mahasiswa Kelas A.25</h2>
<div class="container">
    <table>
        <thead>
            <tr>
            <?php foreach($ar_judul as $judul){ ?>
                <th><?= $judul ?></th>
            <?php } ?>
            </tr>
        </thead>
        <tbody align="center">
         <?php $no=1;
         foreach($ar_nim as $siswa) {
            $status = ($siswa['nilai'] >= 65) ? 'Lulus' : 'Gagal';

            if ($siswa['nilai'] >= 80 && $siswa['nilai'] <=100)
            $grade= 'A';
        
               else if ($siswa['nilai'] >= 70 && $siswa['nilai'] <=79)
                   $grade= 'B';
               
               else if ($siswa['nilai'] >= 60 && $siswa['nilai'] <=69)
                   $grade='C';
               
               else if ($siswa['nilai'] >= 50 && $siswa['nilai'] <=59) 
                   $grade='D';
               
               else $grade='E';

            switch ($grade){
            case 'A':
                $predikat='Memuaskan';
                break;
                
            case 'B':
                $predikat='Bagus';
                break;
    
            case 'C':
                $predikat='Cukup';
                break;
    
            case 'D':
                $predikat='Kurang';
                break;
    
            case 'E':
                $predikat='Buruk';
                break;
            }
               
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $siswa['nama'] ?></td>
                <td><?= $siswa['nim'] ?></td>
                <td><?= $siswa['nilai'] ?></td>
                <td><?= $status ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <?php foreach ($keterangan as $ket => $hasil) { ?>
                <tr>
                    <th colspan="3" style="text-align: left;"><?= $ket ?></th>
                    <th colspan="4"><?= $hasil ?></th>
                </tr>
            <?php } ?>
        </tfoot>
    </table>
</div>
<footer>&copy; 2024 MSIB Salman Alfariz. All Rights Reserved.</footer>
</body>
</html>