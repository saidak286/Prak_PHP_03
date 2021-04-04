<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PHP 03</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h4 class="form-horizontal p-4 shadow h-50" style="background-color:#f1f2f6;">Sistem Perhitungan Berat Badan Ideal</h4>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">    
                <form class="form-horizontal p-5 shadow h-100" style="background-color:#f1f2f6;">
                <fieldset>

                    <div class="text-left">
                        <h3 class="mb-5 text-mg">Form Index Massa Tubuh (BMI)</h3>
                    </div>

                    <!-- Text input-->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="textinput">Nama</label> 
                        <div class="col-md-6">
                            <input id="textinput" name="nama" type="text" class="form-control input-md" required>
                    
                        </div>
                    </div>
                    <br>

                    <!-- Text input-->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="textinput">Berat Badan</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="textinput" name="bb" type="number" class="form-control input-md" required>
                                <div class="input-group-text txt">Kg</div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Select Basic -->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="selectbasic">Tinggi Badan</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="textinput" name="tb" class="form-control input-md" required>
                                <div class="input-group-text txt">cm</div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Text input-->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="textinput">Umur</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="textinput" name="umur" type="number" class="form-control input-md" required>
                                <div class="input-group-text txt">Thn</div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Multiple Radios -->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="radios">Jenis Kelamin</label>
                        <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki">
                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group row">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="kirim" class="btn btn-primary" type="submit" value="Terkirim">Kirim</button>
                        </div>
                    </div>
                    <br>

                </fieldset>
                </form>
            </div>
            <div class="col-md-6">   
                <div class="card text-left">
                  <div class="card-body p-10 shadow h-100" style="background-color:#f1f2f6;">
                    <div class="text-center">
                        <h3 class="mb-5 text-mg">Output form</h3>
                    </div>  
                        <h5 class="card-title text-center">Hasil Evaluasi BMI</h5>
                        <?php
                        '<ul class="list-group">';  
                        if ($_GET){
                            $pasien = new BMIpasien( $_GET["nama"], $_GET["bb"], $_GET["tb"], $_GET["umur"], $_GET["jk"]);
                            $hbmi = $pasien->hasilBMI(); 
                            $sbmi = $pasien->statusBMI($hbmi);

                            echo  '<li class="list-group-item">Nama : '.$pasien->nama.'</li>';
                            echo  '<li class="list-group-item">Berat Badan : '.$pasien->bb.'</li>';
                            echo  '<li class="list-group-item">Tinggi Badan: '.$pasien->tb.'</li>';
                           echo  '<li class="list-group-item">Umur : '.$pasien->umur.'</li>';
                            echo  '<li class="list-group-item">Jenis Kelamin : '.$pasien->jk.'</li>';
                            echo  '<li class="list-group-item">BMI : '.number_format($hbmi,1).'</li>';
                             echo  '<li class="list-group-item">Hasil : '.$pasien->statusBMI($hbmi).'</li>';
                        '</ul>';          
                        }     
                        ?>
                  </div><!--card body-->
                </div> 
            </div>
        </div><!--row-->       
    </div><!--container-->
    <br><br>
    <div class="container p-5 shadow h-100" style="background-color:#f1f2f6;">
        <div class="row">
            <?php  
            if ($_GET){       
                $ns1 = ['No'=>1,'Nama'=>'Rosalie Nurah', 'Jenis Kelamin'=>'Perempuan','Umur'=>18,'Berat(kg)'=>46.2,'Tinggi(cm)'=>155, 'BMI'=>19.22,'Hasil'=>'Normal (Ideal)'];
                $ns2 = ['No'=>2,'Nama'=>'Rara Wulan', 'Jenis Kelamin'=>'Perempuan','Umur'=>20,'Berat(kg)'=>42.8,'Tinggi(cm)'=>158, 'BMI'=>17.44,'Hasil'=>'Kekurangan Berat Badan'];
                $ns3 = ['No'=>3,'Nama'=>'Deiga Azhar', 'Jenis Kelamin'=>'Laki-Laki','Umur'=>22,'Berat(kg)'=>90.3,'Tinggi(cm)'=>154, 'BMI'=>38.07,'Hasil'=>'Kegemukan (Obesitas)'];
                $ns4 = ['No'=>4,'Nama'=>'Yudhistira', 'Jenis Kelamin'=>'Laki-Laki','Umur'=>20,'Berat(kg)'=>89,'Tinggi(cm)'=>178, 'BMI'=>28.01,'Hasil'=>'Kelebihan Berat Badan'];
                $ns5 = ['No'=>5,'Nama'=> $pasien->nama, 'Jenis Kelamin'=>$pasien->jk,'Umur'=>$pasien->umur,'Berat(kg)'=>$pasien->bb,'Tinggi(cm)'=>$pasien->tb, 'BMI'=>number_format($hbmi,1), 'Hasil'=>$sbmi];

                $ar_nilai = [$ns1, $ns2 , $ns3, $ns4, $ns5];
            }
            ?>

            <h3 class="text-center mb-5">Data BMI Pasien</h3>
              <table border="1" width="100%" class="m-auto">
                <thead class="text-center">
                  <tr>
                    <th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Umur</th><th>Berat(kg)</th>
                    <th>Tiggi(cm)</th><th>BMI</th><th>Hasil</th>
                  </tr>
                </thead>
              <tbody class="text-center">
                <?php
                $nomor = 1;
                foreach($ar_nilai as $ns) {
                    echo '<tr style = "text-align : center;"><td>'.$nomor.'</td>';
                    echo '<td>'.$ns['Nama'].'</td>';
                    echo '<td>'.$ns['Jenis Kelamin'].'</td>';
                    echo '<td>'.$ns['Umur'].'</td>';
                    echo '<td>'.$ns['Berat(kg)'].'</td>';
                    echo '<td>'.$ns['Tinggi(cm)'].'</td>';
                    echo '<td>'.$ns['BMI'].'</td>';
                    echo '<td>'.$ns['Hasil'].'</td>';
                    echo '<tr/>';
                    $nomor++;
                }
                ?>
        </div><!--row-->
    </div><!--container-->
</body>
</html>

<?php 
    class BMIpasien { // buka class
        public $nama;
        public $bb;
        public $tb;
        public $umur;
        public $jk;

        function __construct( $nama, $bb, $tb, $umur, $jk ){
        $this->nama = $nama;
        $this->bb = $bb;
        $this->tb = $tb;
        $this->umur = $umur;
        $this->jk = $jk;
        }
        public function hasilBMI(){

        return $this->bb / (($this->tb/100)**2); }

        public function statusBMI($hbmi){

            if ($hbmi < 18.5) {
                return "Kekurangan Berat Badan"; }

            else if ($hbmi >= 18.5 && $hbmi <= 24.9) {
                return "Normal (ideal)"; }

            else if ($hbmi >= 25.0 && $hbmi <= 29.9) {
                return "Kelebihan Berat Badan"; }

            else {
                return "Kegemukan (Obesitas)";
            }    
        }     
    } // tutup class
?>