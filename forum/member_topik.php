<section class="col-lg-7 connectedSortable">
                        <div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">
                        <i class='fa fa-clipboard'></i>
<?php
// ambil nama yang membuat topik
include'config/koneksi.php';
$id=$_GET['id'];
$a="SELECT * FROM member_forum WHERE id_member='$id'";
$query=mysql_query($a);
while ($arh=mysql_fetch_array($query)){
    # code...

                        echo"<h4 class='box-title'>Topik $arh[first_name] $arh[last_name]</h4>";
}

?>


                        </div>
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                        <tr>
                         <th>No</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Dibaca</th>
                        </tr>



<?php
include "config/fungsi_indotgl.php"; 
$id=$_GET['id'];
$sql="SELECT * FROM topik_forum WHERE id_member='$id'";
$hasil=mysql_query($sql);
$no=1;
while($a=mysql_fetch_array($hasil)){
 $tgl = tgl_indo($a['tanggal']);
                                           echo"<tr>
                                            <td>$no</td>
                                            <td><a href='?module=topik&id=$a[id_topik]'>$a[subjek]</a></td>
                                            <td>$tgl</td>
                                            <td><small class='badge pull-center bg-green'>$a[pembaca]</small></td>
                                        </tr>";
$no++;
}

?>
                </table>
                </div>
                </div>
                </div>
                </div>