<?php
/* 
 * *****************************************************************************
 * Filename  : functions.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
date_default_timezone_set('Asia/jakarta');
error_reporting(0);
require_once ("connection.php");        // fungsi koneksi database
require_once ("paging.php");            // fungsi paging data di control panel
require_once ("paging.homepage.php");   // fungsi paging data dihomepage
require_once ("paging.id.php");         // fungsi paging data berdasarkan id
require_once ("injection.php");         // fungsi anti injection
require_once ("tanggal.php");           // fungsi tanggal dan waktu
require_once ("backupdb.php");           // fungsi backupdb

class Functions {
    
    public function __construct() {     // Otomatis terpanggil/load
        $db      = new Connection();    // Objek baru koneksi ke database
    }
    
/*
 * 1.  Fungsi manajemen tabel profesi
 * 2.  Fungsi manajemen tabel kategori
 * 3.  Fungsi manajemen tabel info sekolah
 * 4.  Fungsi manajemen tabel komentar
 * 5.  Fungsi manajemen tabel kategori forum
 * 6.  Fungsi manajemen tabel topik forum
 * 7.  Fungsi manajemen tabel member forum
 * 8.  Fungsi manajemen tabel tanggapan forum
 * 9.  Fungsi manajemen tabel team
 * 10. Fungsi manajemen tabel berita/artikel
 * 11. Fungsi manajemen tabel drafts 
 * 12. Fungsi manajemen tabel log team
 * 13. Fungsi manajemen tabel buku tamu
 * 14. Fungsi manajemen tabel pengaturan umum
 * 15. Fungsi login administrator
 * 16. Fungsi manajemen status login
 * 17. Fungsi manajemen tabel balas komentar
 * 18. Fungsi manajemen tabel slide gambar
 * 19. Fungsi manajemen tabel sensor kata
 * 20. Fungsi manajemen tabel banner web
 */
    
/* -------------------------------------------------------------------------------------- */
    
/*
 * Fungsi manajemen tabel profesi
 */
    public function show_profesi() {
        $query  = "SELECT * FROM profesi ORDER BY id_profesi ASC";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_profesi($posisi,$batas) {
        $query  = "SELECT * FROM profesi ORDER BY id_profesi ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_profesi() {
        $query  = "SELECT * FROM profesi";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
     public function add_profesi($nama,$keterangan) {
        $query = "INSERT INTO profesi VALUES ('','$nama','$keterangan')";
        mysql_query($query);
    }
    
    public function hapus_profesi($id_profesi) {
        $query = "DELETE FROM profesi WHERE id_profesi='$id_profesi'";
        mysql_query($query);
    }
    
    public function edit_profesi($nama,$keterangan,$id_profesi) {
        $query = "UPDATE profesi SET nama='$nama', keterangan='$keterangan' WHERE "
                . "id_profesi='$id_profesi'";
        mysql_query($query);
    }
    
    public function get_one_profesi($id_profesi) {
        $query = "SELECT * FROM profesi WHERE id_profesi='$id_profesi'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel kategori
 */
     public function show_kategori() {
        $query  = "SELECT * FROM kategori ORDER BY nama ASC";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_kategori($posisi,$batas) {
        $query  = "SELECT * FROM kategori ORDER BY nama ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_kategori() {
        $query  = "SELECT * FROM kategori";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_kategori($nama,$keterangan) {
        $query = "INSERT INTO kategori VALUES ('','$nama','$keterangan')";
        mysql_query($query);
    }
    
    public function hapus_kategori($id_kategori) {
        $query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
        mysql_query($query);
    }
    
    public function edit_kategori($nama,$keterangan,$id_kategori) {
        $query = "UPDATE kategori SET nama='$nama', keterangan='$keterangan' WHERE "
                . "id_kategori='$id_kategori'";
        mysql_query($query);
    }
    
    public function get_one_kategori($id_kategori) {
        $query = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
/*
 * Fungsi manajemen tabel info sekolah
 */
    
    public function paging_info($posisi,$batas) {
        $query = "SELECT * FROM info_sekolah ORDER BY posisi_menu ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_info() {
        $query = "SELECT * FROM info_sekolah ORDER BY posisi_menu ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_info_other($id_info) {
        $query = "SELECT * FROM info_sekolah WHERE id_info!='$id_info' ORDER BY posisi_menu ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_info() {
        $query = "SELECT * FROM info_sekolah";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_info($nama,$isi,$gambar,$posisi,$publish) {
        $query = "INSERT INTO info_sekolah VALUES ('','$nama','$isi','$gambar','$posisi','$publish')";
        mysql_query($query);
    }
    
    public function edit_info($nama,$isi,$posisi,$publish,$id_info) {
        $query = "UPDATE info_sekolah SET nama_info='$nama', isi_info='$isi', "
                . "posisi_menu='$posisi', publish='$publish' WHERE id_info='$id_info'";
        
        mysql_query($query);
    }
    
    public function edit_image_info($nama,$isi,$file,$posisi,$publish,$id_info) {
        $query = "UPDATE info_sekolah SET nama_info='$nama', isi_info='$isi', gambar='$file', "
                . "posisi_menu='$posisi', publish='$publish' WHERE id_info='$id_info'";
        
        mysql_query($query);
    }
    
    public function hapus_info($id_info) {
        $query = "DELETE FROM info_sekolah WHERE id_info='$id_info'";
        mysql_query($query);
    }
    
    public function get_one_info($id_info) {
        $query = "SELECT * FROM info_sekolah WHERE id_info='$id_info'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel komentar
 */
    
    public function paging_komentar($posisi,$batas) {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita 
                  ORDER BY k.id_komentar DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_komentar($id_berita) {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita 
                  && k.id_berita='$id_berita' && k.publish='Y' ORDER BY k.id_komentar";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_komentar_id_team($posisi,$batas,$id_team) {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita &&
                  b.id_team = '$id_team' ORDER BY k.id_komentar DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_komentar_id_team($id_team) {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita && b.id_team = '$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_komentar_id_team_noconfirm($id_team) {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita 
                  && b.id_team = '$id_team' && k.publish='N'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_komentar_noconfirm() {
        $query = "SELECT k.*, b.judul
                  FROM komentar AS k, berita AS b, team AS t
                  WHERE b.id_team = t.id_team && b.id_berita = k.id_berita 
                  && k.publish='N'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    
    public function jumlah_komentar() {
        $query = "SELECT * FROM komentar";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_komentar_berita($id_berita) {
        $query = "SELECT * FROM komentar WHERE id_berita='$id_berita' && publish='Y'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_confirm_komentar($id_berita,$nama,$email,$komentar,$tanggal,$waktu) {
        $query = "INSERT INTO komentar VALUES ('','$id_berita','$nama','$email','$komentar','$tanggal','$waktu','N')";
        mysql_query($query);
    }
    
    public function add_live_komentar($id_berita,$nama,$email,$komentar,$tanggal,$waktu) {
        $query = "INSERT INTO komentar VALUES ('','$id_berita','$nama','$email','$komentar','$tanggal','$waktu','Y')";
        mysql_query($query);
    }
    
    public function publish_komentar($id_komentar) {
        $query = "UPDATE komentar SET publish='Y' WHERE id_komentar='$id_komentar'";
        mysql_query($query);
    }
    
    public function unpublish_komentar($id_komentar) {
        $query = "UPDATE komentar SET publish='N' WHERE id_komentar='$id_komentar'";
        mysql_query($query);
    }
    
    public function hapus_komentar($id_komentar) {
        $query = "DELETE FROM komentar WHERE id_komentar='$id_komentar'";
        mysql_query($query);
    }
    
    public function get_one_komentar($id_komentar) {
        $query = "SELECT * FROM komentar WHERE id_komentar='$id_komentar'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel balas komentar
 */
    
    public function show_balas_komentar($id_komentar) {
        $query = "SELECT * FROM balas_komentar WHERE id_komentar='$id_komentar'";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
     public function jumlah_balas_komentar($id_komentar) {
        $query = "SELECT * FROM balas_komentar WHERE id_komentar='$id_komentar'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_balas_komentar($id_komentar,$konten,$tanggal,$waktu) {
        $query = "INSERT INTO balas_komentar VALUES('','$id_komentar','$konten','$tanggal','$waktu')";
        mysql_query($query);
    }
    
    public function hapus_balas_komentar($id_balas) {
        $query = "DELETE FROM balas_komentar WHERE id_balas='$id_balas'";
        mysql_query($query);
    }
    
/*
 * Fungsi manajemen tabel kategori forum
 */
    
    public function paging_kategori_forum($posisi,$batas) {
        $query  = "SELECT * FROM kategori_forum ORDER BY nama ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_kategori_forum() {
        $query  = "SELECT * FROM kategori_forum";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_kategori_forum($nama,$keterangan) {
        $query = "INSERT INTO kategori_forum VALUES ('','$nama','$keterangan')";
        mysql_query($query);
    }
    
    public function hapus_kategori_forum($id_kategori) {
        $query = "DELETE FROM kategori_forum WHERE id_kategori='$id_kategori'";
        mysql_query($query);
    }
    
    public function edit_kategori_forum($nama,$keterangan,$id_kategori) {
        $query = "UPDATE kategori_forum SET nama='$nama', keterangan='$keterangan' WHERE "
                . "id_kategori='$id_kategori'";
        mysql_query($query);
    }
    
    public function get_one_kategori_forum($id_kategori) {
        $query = "SELECT * FROM kategori_forum WHERE id_kategori='$id_kategori'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel topik forum
 */
    
    public function paging_topik($posisi,$batas) {
        $query = "SELECT kf.*, mf.*, tf.* FROM topik_forum as tf, kategori_forum as kf, "
                . "member_forum as mf WHERE tf.id_member=mf.id_member && "
                . "tf.id_kategori=kf.id_kategori "
                . " ORDER BY tanggal DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_topik() {
        $query = "SELECT * FROM topik_forum";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_topik($id_kategori,$username,$subjek,$deskripsi,$tanggal,$waktu) {
        $query = "INSERT INTO topik_forum VALUES "
                . "('','$id_kategori','$username','$subjek','$deskripsi','$tanggal','$waktu')";
        mysql_query($query);
    }
    
    public function hapus_topik($id_topik) {
        $query = "DELETE FROM topik_forum WHERE id_topik='$id_topik'";
        mysql_query($query);
    }
    
    public function edit_topik($id_kategori,$subjek,$deskripsi,$id_topik,$username) {
        $query = "UPDATE topik_forum SET id_kategori='', subjek='', deskripsi='' WHERE"
                . "id_topik='' && username=''";
        mysql_query($query);
    }
    
    public function get_one_topik($id_topik) {
        $query = "SELECT * FROM topik_forum WHERE id_topik='$id_topik'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
/*
 * Fungsi manajemen tabel member forum
 */
    
    public function paging_member($posisi,$batas) {
        $query = "SELECT * FROM member_forum ORDER BY id_member DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_member() {
        $query = mysql_query("SELECT * FROM member_forum");
        $hasil = mysql_num_rows($query);
        
        return $hasil;
    }
    
    public function add_member($first,$last,$username,$pass,$image,$email,$no_hp,$tgl_lahir,$alamat) {
        $query = "INSERT INTO member_forum VALUES "
                . "('','$first','$last','$username','$pass','$image','$email','$no_hp','$tgl_lahir','$alamat','Y')";
        mysql_query($query);
        
    }
    
    public function hapus_member($id_member) {
        $query = "DELETE FROM member_forum WHERE id_member='$id_member'";
        mysql_query($query);
    }
    
    public function edit_member($first,$last,$username,$pass,$id_profesi,$image,$email,$id_member) {
        $query = "UPDATE member_forum SET first_name='$first', last_name='$last', username='$username', "
                . "password='$pass', id_profesi='$id_profesi', image='$image', email='$email' "
                . "WHERE id_member='$id_member'";
        mysql_query($query);
    }
    
    public function edit_member_non_image($first,$last,$username,$pass,$id_profesi,$email,$id_member) {
        $query = "UPDATE member_forum SET first_name='$first', last_name='$last', username='$username', "
                . "password='$pass', id_profesi='$id_profesi',  email='$email'WHERE id_member='$id_member'";
        mysql_query($query);
    }
    
    public function get_one_member($id_member) {
        $query = mysql_query("SELECT * FROM member_forum WHERE id_member='$id_member'");
        $hasil = mysql_fetch_array($query);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel tanggapan forum
 */
    
    public function paging_tanggapan($posisi,$batas) {
        $query = "SELECT * FROM tanggapan_forum ORDER BY id_tanggapan ASC LIMIT"
                . " $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_tanggapan() {
        $query = "SELECT * FROM tanggapan_forum";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    public function add_tanggapan($id_topik,$username,$tanggapan,$tanggal,$waktu) {
        $query = "INSERT INTO tanggapan_forum VALUES ('','$id_topik','$username','$tanggapan','$tanggal','$waktu')";
        mysql_query($query);
    }
    
    public function drop_tanggapan($id_tanggapan) {
        $query = "DELETE FROM tanggapan_forum WHERE id_tanggapan=''";
        mysql_query($query);
    }
    
/*
 * Fungsi manajemen tabel team
 */
    
    public function paging_team($posisi,$batas) {
        $query = "SELECT p.nama as profesi, t.id_team, t.level, t.first_name as first, t.last_name as last, "
                . "t.email, t.no_hp FROM profesi as p, team as t WHERE p.id_profesi=t.id_profesi LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_team() {
        $query = "SELECT p.nama as profesi, t.username, t.image, t.id_team, t.level, t.first_name as first, t.last_name as last, "
                . "t.email, t.no_hp FROM profesi as p, team as t WHERE p.id_profesi=t.id_profesi";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    
    
    public function jumlah_team() {
        $query = "SELECT * FROM team";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_team($first,$last,$user,$pass,$id_profesi,$image,$email,$gender,$tgl_lahir,$alamat,$no_hp,$level) {
        $query = "INSERT INTO team VALUES "
                . "('','$first','$last','$user','$pass','$id_profesi','$image','$email','$gender','$tgl_lahir','$alamat','$no_hp','$level','','Y','0')";
        mysql_query($query);
    }
    
    public function cek_password_team($old_password,$id_team) {
        $query = "SELECT * FROM team WHERE password='$old_password' && id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    public function edit_password_team($password,$id_team) {
        $query = "UPDATE team SET password='$password' WHERE id_team='$id_team'";
        mysql_query($query);
    }
    
    public function last_login($time,$id_team) {
        $query = "UPDATE team SET last_login='$time' WHERE id_team='$id_team'";
        mysql_query($query);
    }
    
    public function edit_image_team($first,$last,$user,$id_profesi,$image,$email,$gender,$tgl_lahir,$alamat,$no_hp,$level,$aktif,$id_team) {
        $query = "UPDATE team SET first_name='$first', last_name='$last', username='$user', "
                . "image='$image', id_profesi='$id_profesi', "
                . "email='$email', gender='$gender', tgl_lahir='$tgl_lahir', alamat='$alamat', no_hp='$no_hp', level='$level', "
                . "aktif='$aktif' WHERE id_team='$id_team'";
        mysql_query($query);
    }
    
    public function edit_non_team($first,$last,$user,$id_profesi,$email,$gender,$tgl_lahir,$alamat,$no_hp,$level,$aktif,$id_team) {
        $query = "UPDATE team SET first_name='$first', last_name='$last', username='$user', "
                . "id_profesi='$id_profesi', "
                . "email='$email', gender='$gender', tgl_lahir='$tgl_lahir', alamat='$alamat', no_hp='$no_hp', level='$level', "
                . "aktif='$aktif' WHERE id_team='$id_team'";
        mysql_query($query);
    }
    
    public function hapus_team($id_team) {
        $query = "DELETE FROM team WHERE id_team='$id_team'";
        mysql_query($query);
    }
    
    public function profil_team($id_team) {
        $query = "SELECT p.*, t.* FROM profesi as p, team as t WHERE p.id_profesi=t.id_profesi"
                . " && t.id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    public function get_one_team($id_team) {
        $query = "SELECT * FROM team WHERE id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel berita/artikel 
 */

    public function headline_web_berita() {
        $query = "SELECT t.*, k.*, b.* FROM kategori as k, berita as b, team as t WHERE "
                . "b.id_kategori=k.id_kategori && t.id_team=b.id_team && b.publish='Y' && b.headline='1' ORDER BY b.id_berita DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_berita($posisi,$batas) {
        $query = "SELECT k.*, b.* FROM kategori as k, berita as b WHERE "
                . "b.id_kategori=k.id_kategori ORDER BY b.id_berita DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_web_berita($posisi,$batas) {
        $query = "SELECT t.*, k.*, b.* FROM kategori as k, berita as b, team as t WHERE "
                . "b.id_kategori=k.id_kategori && t.id_team=b.id_team && b.publish='Y' ORDER BY b.id_berita DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_web_kategori_berita($posisi,$batas,$id_kategori) {
        $query = "SELECT t.*, k.*, b.* FROM kategori as k, berita as b, team as t WHERE "
                . "b.id_kategori=k.id_kategori && t.id_team=b.id_team && b.id_kategori='$id_kategori' && b.publish='Y' ORDER BY b.id_berita DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_berita_top() {
        $query = "SELECT t.*, k.*, b.* FROM kategori as k, berita as b, team as t WHERE "
                . "b.id_kategori=k.id_kategori && t.id_team=b.id_team && b.publish='Y' ORDER BY b.reader DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_berita_id_team($posisi,$batas,$id_team) {
        $query = "SELECT k.*, b.* FROM kategori as k, berita as b WHERE "
                . "b.id_kategori=k.id_kategori && b.id_team='$id_team' ORDER BY b.id_berita DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function show_berita_id_team($id_team) {
        $query = "SELECT k.*, b.* FROM kategori as k, berita as b WHERE "
                . "b.id_kategori=k.id_kategori && b.id_team='$id_team' ORDER BY b.id_berita DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_berita_id_team($id_team) {
        $query = "SELECT * FROM berita WHERE id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_berita() {
        $query = "SELECT * FROM berita";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_berita_kategori($id_kategori) {
        $query = "SELECT * FROM berita WHERE id_kategori='$id_kategori'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_berita_publish($param) {
        $query = "SELECT * FROM berita WHERE publish='Y'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function jumlah_berita_unpublish($param) {
        $query = "SELECT * FROM berita WHERE publish='N'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_berita($id_kategori,$judul,$konten,$tgl,$jam,$gambar,$head,$id_team,$publish) {
        $query = "INSERT INTO berita VALUES "
                . "('','$id_kategori','$judul','$konten','$tgl','$jam','$gambar','$head','$id_team','0','$publish')";
        mysql_query($query);
    }
    
    public function add_pembaca_berita($id_berita) {
        $query = "UPDATE berita SET reader=(reader+1) WHERE id_berita='$id_berita'";
        mysql_query($query);
    }
    
    public function edit_image_berita($id_kategori,$judul,$konten,$gambar,$head,$publish,$id_berita) {
        $query = "UPDATE berita SET judul='$judul', id_kategori='$id_kategori', "
                . "konten='$konten',gambar='$gambar', headline='$head', publish='$publish' "
                . "WHERE id_berita='$id_berita'";
        mysql_query($query);
    }
    
    public function hapus_berita($id_berita) {
        $query = "DELETE FROM berita WHERE id_berita='$id_berita'";
        mysql_query($query);
    }
    
    public function edit_berita($id_kategori,$judul,$konten,$head,$publish,$id_berita) {
        $query = "UPDATE berita SET judul='$judul', id_kategori='$id_kategori', "
                . "konten='$konten', headline='$head', publish='$publish' "
                . "WHERE id_berita='$id_berita'";
        mysql_query($query);
    }
    
    public function get_one_berita($id_berita) {
        $query = "SELECT * FROM berita WHERE id_berita='$id_berita'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    public function detail_web_berita($id_berita) {
        $query = "SELECT t.*, k.*, b.* FROM kategori as k, berita as b, team as t WHERE "
                . "b.id_kategori=k.id_kategori && t.id_team=b.id_team && b.id_berita='$id_berita' && b.publish='Y'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        return $hasil;
    }
    
    
    
/*
 * Fungsi manajemen tabel drafts 
 */
    
    public function paging_draft($posisi,$batas) {
        $query = "SELECT * FROM draft ORDER BY tanggal DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_draft_id_team($posisi,$batas,$id_team) {
        $query = "SELECT * FROM draft WHERE id_team='$id_team' ORDER BY tanggal DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_draft_id_team($id_team) {
        $query = "SELECT * FROM draft WHERE id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    } 
    
    public function jumlah_draft() {
        $query = "SELECT * FROM draft";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_draft($id_kategori,$judul,$konten,$tgl,$jam,$gambar,$head,$id_team) {
        $query = "INSERT INTO draft VALUES "
                . "('','$id_kategori','$judul','$konten','$tgl','$jam','$gambar','$head','$id_team')";
        mysql_query($query);
    }
    
    public function edit_image_draft($id_kategori,$judul,$konten,$gambar,$head,$id_draft) {
        $query = "UPDATE draft SET judul='$judul', id_kategori='$id_kategori', "
                . "konten='$konten',gambar='$gambar', headline='$head' "
                . "WHERE id_draft='$id_draft'";
        mysql_query($query);
    }
    
    public function edit_draft($id_kategori,$judul,$konten,$head,$id_draft) {
        $query = "UPDATE draft SET judul='$judul', id_kategori='$id_kategori', "
                . "konten='$konten', headline='$head'  "
                . "WHERE id_draft='$id_draft'";
        mysql_query($query);
    }
    
    public function hapus_draft($id_draft) {
        $query = "DELETE FROM draft WHERE id_draft='$id_draft'";
        mysql_query($query);
    }
    
    public function get_one_draft($id_draft) {
        $query = "SELECT * FROM draft WHERE id_draft='$id_draft'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel log team
 */
    
    public function paging_log_team($posisi,$batas) {
        $query = "SELECT l.*, t.* FROM log_team as l, team as t WHERE t.id_team=l.id_team"
                . " ORDER BY l.id_log DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_log_id_team($posisi,$batas,$id_team) {
        $query = "SELECT l.*, t.* FROM log_team as l, team as t WHERE t.id_team=l.id_team"
                . " && l.id_team='$id_team' ORDER BY l.id_log DESC LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_log_id_team($id_team) {
        $query = "SELECT * FROM log_team WHERE id_team='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    
    public function jumlah_log_team() {
        $query = "SELECT * FROM log_team";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_log_team($id_team,$aktifitas,$tgl,$jam) {
        $query = "INSERT INTO log_team VALUES ('','$id_team','$aktifitas','$tgl','$jam')";
        mysql_query($query);
    }
    
    public function hapus_log_team($id_log) {
        $query = "DELETE FROM log_team WHERE id_log='$id_log'";
        mysql_query($query);
    }
    
    public function hapus_all_log_team() {
        $query = "DELETE FROM log_team";
        mysql_query($query);
    }
    
    
/*
 * Fungsi manajemen tabel buku tamu
 */
    
    public function paging_bukutamu($posisi,$batas) {
        $query = "SELECT * FROM buku_tamu ORDER BY id_bukutamu DESC LIMIT"
                . " $posisi,$batas";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_bukutamu() {
        $query = "SELECT * FROM buku_tamu";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_buku_tamu($nama,$email,$situs,$subjek,$konten,$tanggal,$waktu) {
        $query  = "INSERT INTO buku_tamu VALUES ('','$nama','$email','$situs','$subjek','$konten','$tanggal','$waktu','0','Y')";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    public function read_bukutamu($id_bukutamu) {
        $query = "SELECT * FROM buku_tamu WHERE id_bukutamu='$id_bukutamu'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    public function noread_bukutamu() {
        $query = "SELECT * FROM buku_tamu WHERE di_baca='0' ORDER BY id_bukutamu DESC";
        $data  = mysql_query($query);
        
        return $data;
    }
    
    public function edit_noread_bukutamu($id_bukutamu) {
        $query = "UPDATE buku_tamu SET di_baca='1' WHERE id_bukutamu='$id_bukutamu'";
        $data  = mysql_query($query);
        
        return $data;
    }
    
    public function hapus_bukutamu($id_bukutamu) {
        $query = "DELETE FROM buku_tamu WHERE id_bukutamu='$id_bukutamu'";
        mysql_query($query);
    }


/*
 * Fungsi informasi ulang tahun team dan member
 */
    public function ultah_team($tanggal) {
        $query = "SELECT * FROM team WHERE tgl_lahir='$tanggal'";
        $data  = mysql_query($query);
        
        return $data;
    }
    
    public function ultah_member($tanggal) {
        $query = "SELECT * FROM member_forum WHERE tgl_lahir='$tanggal'";
        $data  = mysql_query($query);
        
        return $data;
    }
    

    
/*
* Fungsi manajemen tabel pengaturan umum
*/
    
    public function get_one_setting() {
       $query = "SELECT * FROM general_setting WHERE id_setting='1'";
       $data  = mysql_query($query);
       $hasil = mysql_fetch_array($data);
       
       return $hasil;
    }
    
    public function edit_favicon($nama,$email,$phone,$key,$desc,$domain,$favicon,$filter,$paging_admin,$paging_home) {
        $query = "UPDATE general_setting SET domain='$domain', filter_komentar='$filter', favicon='$favicon',"
                . " batas_paging_admin='$paging_admin', batas_paging_homepage='$paging_home',"
                . " nama_web='$nama', email_web='$email', phone_number='$phone', meta_keyword='$key', meta_deskripsi='$desc'"
                . " WHERE id_setting='1'";
        mysql_query($query);
    }
    
    public function edit_setting($nama,$email,$phone,$key,$desc,$domain,$filter,$paging_admin,$paging_home) {
        $query = "UPDATE general_setting SET domain='$domain', filter_komentar='$filter', "
                . " batas_paging_admin='$paging_admin', batas_paging_homepage='$paging_home',"
                . " nama_web='$nama', email_web='$email', phone_number='$phone', meta_keyword='$key', meta_deskripsi='$desc' "
                . " WHERE id_setting='1'";
        mysql_query($query);
    }
    
/*
 * Fungsi manajemen tabel templates
 */
    
    public function show_template() {
        $query = "SELECT * FROM templates";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function add_template($judul,$pembuat,$folder,$keterangan,$gambar) {
        $query = "INSERT INTO templates VALUES ('','$judul','$pembuat','$folder','$keterangan','$gambar','N')";
        mysql_query($query);
    }
    
    public function edit_template($judul,$pembuat,$folder,$keterangan,$aktif,$id_template) {
        $query = "UPDATE templates SET judul='$judul', pembuat='$pembuat', folder='$folder', "
                . "keterangan='$keterangan', aktif='$aktif' "
                . "WHERE id_templates='$id_template'";
        mysql_query($query);
    }
    
    public function edit_gambar_template($judul,$pembuat,$folder,$keterangan,$gambar,$aktif,$id_template) {
        $query = "UPDATE templates SET judul='$judul', pembuat='$pembuat', folder='$folder', "
                . "keterangan='$keterangan', gambar='$gambar', aktif='$aktif' "
                . "WHERE id_templates='$id_template'";
        mysql_query($query);
    }
    
    public function get_one_template($id_template) {
        $query = "SELECT * FROM templates WHERE id_templates='$id_template'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    public function get_template() {
        $query = "SELECT * FROM templates WHERE aktif='Y'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel slide gambar
 */
    
    public function show_slide() {
        $query = "SELECT * FROM slide_image";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function paging_slide($posisi,$batas) {
        $query = "SELECT * FROM slide_image LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_slide() {
        $query = "SELECT * FROM slide_image";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_slide($ket,$filename,$type,$x,$y,$scale,$rotate,$aktif) {
        $query = "INSERT INTO slide_image VALUES ('','$ket','$filename','$type','$x','$y','$scale','$rotate','$aktif')";
        mysql_query($query);
    }
    
    public function edit_slide($ket,$type,$x,$y,$scale,$rotate,$aktif,$id_slide) {
        $query = "UPDATE slide_image SET keterangan='$ket', type_slide='$type', data_x='$x',"
                . " data_y='$y', data_scale='$scale', data_rotate='$rotate', aktif='$aktif' "
                . " WHERE id_slide='$id_slide'";
        mysql_query($query);
    }
    
    public function edit_gambar_slide($ket,$filename,$type,$x,$y,$scale,$rotate,$aktif,$id_slide) {
        $query = "UPDATE slide_image SET keterangan='$ket', filename='$filename', type_slide='$type', data_x='$x',"
                . " data_y='$y', data_scale='$scale', data_rotate='$rotate', aktif='$aktif' "
                . " WHERE id_slide='$id_slide'";
        mysql_query($query);
    }
    
    public function hapus_slide($id_slide) {
        $query = "DELETE FROM slide_image WHERE id_slide='$id_slide'";
        mysql_query($query);
    }
    
    public function get_one_slide($id_slide) {
        $query = "SELECT * FROM slide_image WHERE id_slide='$id_slide'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
    
/*
 * Fungsi manajemen tabel sensor kata
 */
    
    public function paging_sensor($posisi,$batas) {
        $query  = "SELECT * FROM sensor_kata ORDER BY word ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_sensor() {
        $query  = "SELECT * FROM sensor_kata";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
     public function add_sensor($word,$replace) {
        $query = "INSERT INTO sensor_kata VALUES ('','$word','$replace')";
        mysql_query($query);
    }
    
    public function hapus_sensor($id_sensor) {
        $query = "DELETE FROM sensor_kata WHERE id_sensor='$id_sensor'";
        mysql_query($query);
    }
    
    public function edit_sensor($word,$ganti,$id_sensor) {
        $query = "UPDATE sensor_kata SET word='$word', replacer='$ganti' WHERE "
                . "id_sensor='$id_sensor'";
        mysql_query($query);
    }
    
    public function get_one_sensor($id_sensor) {
        $query = "SELECT * FROM sensor_kata WHERE id_sensor='$id_sensor'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }

/*
 * Fungsi manajemen tabel sensor kata
 */
    
    public function show_banner() {
        $query = "SELECT * FROM banner";
        $data  = mysql_query($query);
        while($hasil = mysql_fetch_array($data)) {
            $row[] = $hasil;
        }
        
        return $row;
    }
    
    public function paging_banner($posisi,$batas) {
        $query = "SELECT * FROM banner LIMIT $posisi,$batas";
        $data  = mysql_query($query);
        while($hasil = mysql_fetch_array($data)) {
            $row[] = $hasil;
        }
        
        return $row;
    }
    
    public function jumlah_banner() {
        $query = "SELECT * FROM banner";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function add_banner($alamat,$gambar,$judul) {
        $query = "INSERT INTO banner VALUES ('','$alamat','$gambar','$judul','Y')";
        mysql_query($query);
    }
    
    public function edit_banner($alamat,$judul,$aktif,$id_banner) {
        $query = "UPDATE banner SET alamat='$alamat', keterangan='$judul', "
                . "publish='$aktif' WHERE id_banner='$id_banner'";
        mysql_query($query);
    }
    
    public function edit_gambar_banner($alamat,$gambar,$judul,$aktif,$id_banner) {
        $query = "UPDATE banner SET alamat='$alamat', gambar='$gambar', keterangan='$judul', "
                . "publish='$aktif' WHERE id_banner='$id_banner'";
        mysql_query($query);
    }
    
    public function hapus_banner($id_banner) {
        $query = "DELETE FROM banner WHERE id_banner='$id_banner'";
        mysql_query($query);
    }
    
    public function get_one_banner($id_banner) {
        $query = "SELECT * FROM banner WHERE id_banner='$id_banner'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);
        
        return $hasil;
    }
/*
 * Fungsi login administrator
 */
    public function login_username($username,$password) {
        $query = "SELECT * FROM team WHERE username='$username' && password='$password' && aktif='Y'";
        $data  = mysql_query($query);
        
        return $data;
    }    
    
    public function login_email($email,$password) {
        $query = "SELECT * FROM team WHERE email='$email' && password='$password' && aktif='Y'";
        $data  = mysql_query($query);
        
        return $data;
    }
    
/*
 * Fungsi manajemen status login
 */
    public function online($id_team) {
        $query  = "UPDATE team SET online='1' WHERE id_team='$id_team'";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    public function offline($id_team) {
        $query  = "UPDATE team SET online='0' WHERE id_team='$id_team'";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    public function show_online($id_team) {
        $query = "SELECT * FROM team WHERE online='1' && id_team!='$id_team'";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }
    
    public function jumlah_online($id_team) {
        $query = "SELECT * FROM team WHERE online='1' && id_team!='$id_team'";
        $data  = mysql_query($query);
        $hasil = mysql_num_rows($data);
        
        return $hasil;
    }
    
 /* *****************************************************************************
 * End of class functions
 */
}