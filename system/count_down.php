<?php
/* 
 * *****************************************************************************
 * Filename  : count_down.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 * Simple Count Down
 * Teknik Hitung Mundur Waktu Sederhana
 * *****************************************************************************
 */

// Set waktu saat ini
date_default_timezone_set('Asia/jakarta');
/* Load halaman dengan kondisi waktu :::::
 * Format waktu :
 * H = Menampilkan waktu jam
 * i = Menampilkan waktu menit
 * s = Menampilkan waktu detik
 */

$sekarang        = date("H:i:s");

// Pecah waktu
$var_jam    = date("H");    // Data waktu untuk jam
$var_menit  = date("i");    // Data waktu untuk menit
$var_detik  = date("s");    // Data waktu untuk detik

/*
 * Sisipkan file functions.php
 * Kemudian buat objek baru dengan nama variabel fquery
 * 
 */
include "functions.php";
$fquery = new Functions();

// Menghitung jumlah waktu yang sesuai dengan waktu saat ini
$jumlah = $fquery->jumlahCekWaktu($sekarang);
if($jumlah > 0) {   // Juka data ada maka :
    // Menampilkan data waktu didatabase
    $waktu  = $fquery->cekWaktu($sekarang);
    // Looping data
    foreach ($waktu as $row) {
        
        /* ---------------------------------------------------------------------
         * Data waktu jam, menit, detik
         * Membuat data waktu jam, menit dan detik secara berpisah
         * ---------------------------------------------------------------------
         */
        $get_hours      = substr($row['waktu_load'], 0, 2);
        $get_minutes    = substr($row['waktu_load'], 3, 2);
        $get_seconds    = substr($row['waktu_load'], 6, 2);

        /* Membuat kondisi jika data waktu menit adalah 0  */
        // Jika menit didatabase <= menit saat ini
        // Dan menit didatabase adalah 00 maka :::::::
        if($get_minutes <= $var_menit && $get_minutes=='00') {
            /* 59 menit jika data menit pada database adalah 00 */
            $menit     = 59;
            // Jam di kurang (-) 1 kemudian
            $min_hour  = -1;
             
        }
        else {
            // dikurangi (-1) untuk menyesuaikan dengan detik
            $menit     = ($get_minutes - 1);
            // Jam di tambah (+) 0 kemudian
            $min_hour  = +0;
        }
            // Tampilkan waktu pada aplikasi
            // Hasil data menit yang akan ditampilkan
            $hasil_menit     = $menit - $var_menit;
            // Jika data menit adalah negatif atau < 0
            if($hasil_menit < 0) {
                // Menit ditambahkan 60 untuk menghitung selisih
                $data_menit  = $hasil_menit + 60;
                // Data jam ditambahkan (+) dengan 1
                $hours     = ($var_jam + 1) - ($get_hours + $min_hour);
            }
            else {
                // Menit ditampilkan dari variabel awal
                $data_menit  = $hasil_menit;
                // Data jam ditambahkan 0 agar nilai tetap
                $hours     = ($var_jam + 0) - ($get_hours + $min_hour);
            }
            
            // Hasil data detik yang akan ditampilkan
            // 60 dikurang (-) dengan data detik saat ini
            $hasil_seconds   = 60 - $var_detik;

            // Kondisi jika data menit sudah 0 
            if($data_menit=='0') {
                if($hours=='0' || $hours > 0) {
                // Data jam tidak ditampilkan dan
                // data menit tidak akan ditampilkan
                $count = $hasil_seconds.' detik';
                }
                // Else kondisi
                else {
                    // Tampilkan jam, menit dan detik
                    $count = "$hours jam ".$data_menit." menit ".$hasil_seconds.' detik';
                }
            }
            // Kondisi jika data jam sudah 0
            else if($hours=='0' || $hours > 0) {
                // Data jam tidak ditampilkan
                $count = "".$data_menit." menit ".$hasil_seconds.' detik';
            }
            
            // else kondisi :-)
            else {
                // Menampilkan data jam, menit dan detik
                $count = "$hours jam ".$data_menit." menit ".$hasil_seconds.' detik';
            }

            // Jika waktu yang ditampilkan adalah (-) atau minus
            // Maka ganti tanda (-) dengan ('') atau kata yang kosong saja
            $countdown      = str_replace("-","",$count);
            // Menampilkan data waktu hitung mundur
            $tampil_count  = "<b>".$countdown.'</b> menuju :<br>';
            
            // Tampilkan data waktu hitung mundur
            echo $tampil_count;
            // Tampilkan data waktu yang ada didatabase
            echo "Jam pelajaran pukul <b>".$row['waktu_load']."</b> WIB<br><br>";
            
            /*
            * Membuat animasi progress bar menit
            */
            if($data_menit<='10') {
                // Progress merah
                $color_menit    = "progress-bar-danger";
            }
            else if($data_menit<='20') {
                // Progress kuning
                $color_menit    = "progress-bar-warning";
            }
            else if($data_menit<='40') {
                // Progress biru
                $color_menit    = "progress-bar-primary";
            }
            else if($data_menit<='60') {
                // Progress hijau
                $color_menit    = "progress-bar-success";
            }
            else {
                // Kosongkan saja
                $color_menit    = "";
            }
            
            /*
            * Membuat animasi progress bar detik
            */
            if($hasil_seconds<='10') {
                // Progress merah
                $color_detik    = "progress-bar-danger";
            }
            else if($hasil_seconds<='20') {
                // Progress kuning
                $color_detik    = "progress-bar-warning";
            }
            else if($hasil_seconds<='40') {
                // Progress biru
                $color_detik    = "progress-bar-primary";
            }
            else if($hasil_seconds<='60') {
                // Progress hijau
                $color_detik    = "progress-bar-success";
            }
            else {
                // Kosongkan saja
                $color_detik    = "";
            }
            
            // Progress bar menit
            echo "<div class='row'>";
            echo "<div class='col-lg-3'>Progress menit</div>";
            echo "<div class='col-lg-9'>";
            echo "<div class='progress  progress-striped'>
                   <div class='progress-bar ".$color_menit."' role='progressbar' aria-valuenow='60'
                   aria-valuemin='0' aria-valuemax='60'
                   style='width: ".$data_menit."%;'>
                   <span class='sr-only'></span>
                   
                   </div>
                  </div>";
            // Progress bar detik
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-lg-3'>Progress detik</div>";
            echo "<div class='col-lg-9'>";
            echo "<div class='progress md progress-striped active'>
                   <div class='progress-bar ".$color_detik."' role='progressbar' aria-valuenow='60'
                   aria-valuemin='0' aria-valuemax='60'
                   style='width: ".($hasil_seconds)."%;'>
                   <span class='sr-only'></span> 
                   
                   </div>
                  </div>";
            echo "</div>";
            echo "</div>";
    }
}
else {       // Jika tidak ada data atau null maka
    // Tampilkan kata
    echo "Sudah tidak ada jam pembelajaran.."; 
}

/*
 * *****************************************************************************
 * Creator by IBeESNay
 * Teknik Hitung Mundur Waktu (Count Down System) Sederhana
 * *****************************************************************************
 */