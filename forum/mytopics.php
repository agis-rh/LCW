<section class="col-lg-7 connectedSortable">
                       
                       
                      
                       


<?php
// ambil nama user

$tampil="select * from member_forum where id_member='$_SESSION[id_member]'";
$sql=mysql_query($tampil);
while($data=mysql_fetch_array($sql)){

         echo "<div class='alert alert-info' >
                <i class='fa fa-tags'></i>
                <b>Topik : $data[first_name] $data[last_name]</b>
                </div>";
            }


// tampilkan topik member

include 'config/koneksi.php';
include 'config/fungsi_indotgl.php';
$batas = 10;
$posisi = $paging->cariPosisi($batas);
$sql="SELECT * FROM topik_forum WHERE id_member='$_SESSION[id_member]' ORDER BY tanggal DESC  LIMIT $posisi,$batas";
$hasil=mysql_query($sql);
$jumlah=mysql_num_rows($hasil);

 if($jumlah==0){

         echo "
                <div class='alert alert-danger' >
                <i class='fa fa-dropbox'></i>
                <b>Anda Belum Pernah Membuat Topik</b>
                </div>";


 }else{


                    echo" <div class='row'>
                        <div class='col-xs-12'>
                        <div class='box'>
                        <table class='table table-bordered'>
                   
                        <div class='box-body table-responsive no-padding'>
                        <table class='table table-hover'>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Subjek</th>
                        <th>Aksi</th>
                        </tr>";



$no=1;
while($a=mysql_fetch_array($hasil)){
 $tgl = tgl_indo($a['tanggal']);



	                                   echo"<tr>
                                            <td>$no</td>
                                            <td>$tgl</td>
                                            <td>$a[subjek]</td>
                                            <td><a href='?module=edit_topik&id=$a[id_topik]'>
                                            <small class='badge pull-center bg-green'>edit</small></a>
                                            </td>
                                        </tr>";
$no++;
}




          echo"</table>
                </div>
                </div>
                </div>
                ";


                


$sql1="SELECT * FROM topik_forum WHERE id_member='$_SESSION[id_member]' ORDER BY tanggal DESC";
$hasil1=mysql_query($sql1);
$jumlah1=mysql_num_rows($hasil1);
$active = "mytopics";
$halaman = $_GET['halaman'];
$jml_page = $paging->jumlahPage($jumlah1,$batas);
$link    = $paging->linkHalaman($halaman,$jml_page,$active);
echo "$link";

}
 ?>
 </div>