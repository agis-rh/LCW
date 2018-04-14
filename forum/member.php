<section class="col-lg-7 connectedSortable">
                        <div class="row">
                        <div class='col-md-12'>
                        <div class='alert alert-info' >
                        <i class='fa fa-smile-o'></i>



<?php
$r=mysql_num_rows(mysql_query("SELECT * FROM member_forum"));
            echo"<b>$r Orang Telah Bergabung Menjadi Member Forum</b>";
?>
                        </div></div>
                        <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">
                        <i class='fa fa-group'></i>
                        <h4 class="box-title">Daftar Member</h4>
                        </div>
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Bergabung</th>
                        </tr>



<?php
include 'config/koneksi.php';
include 'config/fungsi_indotgl.php';
$batas = 10;
$posisi = $paging->cariPosisi($batas);
$a=mysql_query("SELECT * FROM member_forum ORDER BY first_name ASC LIMIT $posisi,$batas");
$jumlah=mysql_num_rows($a);
$no=1;
while($data=mysql_fetch_array($a)){
 $tgl = tgl_indo($data['bergabung']);
 

                                     echo"<tr>
                                            <td>$no</td>
                                            <td><a href='?module=member_detail&id=$data[id_member]'>$data[first_name] $data[last_name]</a></td>
                                            <td>$data[email]</td>
                                            <td>$data[alamat]</td>
                                            <td>$tgl</td>
                                        </tr>";
$no++;
}
?>
                </table>
                </div>
                </div>
                </div>
                </div>



<!-------------tentukan paging halaman------------->

 <?php
$sql1="SELECT * FROM member_forum ORDER BY first_name ASC";
$hasil1=mysql_query($sql1);
$jumlah1=mysql_num_rows($hasil1);
$active = "member";
$halaman = $_GET['halaman'];
$jml_page = $paging->jumlahPage($jumlah1,$batas);
$link    = $paging->linkHalaman($halaman,$jml_page,$active);
echo "$link";
 ?>

</section>
