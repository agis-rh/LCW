<!-----------kategori---------->
<div class="col-md-5">
<div class='box box-info'>
<div class='box-header'>
<i class='fa fa-tag'></i>
<h3 class='box-title'>Kategori</h3>
</div>


<?php
include "config/koneksi.php";
 $sql = "SELECT kategori_forum.id_kategori, nama, keterangan,
			 COUNT(topik_forum.id_topik) AS jml_topik 
       FROM	kategori_forum LEFT JOIN topik_forum 
       ON topik_forum.id_kategori=kategori_forum.id_kategori 
       GROUP BY kategori_forum.id_kategori";
$hasil = mysql_query($sql);
while($r=mysql_fetch_array($hasil)){


    
  echo "<div class='box-body'>
  <div class='alert alert-info alert-dismissable'>
  <i class='fa fa-info'></i>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <b><a href='?module=kategori&id=$r[id_kategori]'>$r[nama]</a></b>
  <br /> $r[keterangan]
  </div>
  </div>";
  }
?>    

</div>
</div>
<!-----------end categories----->






<!------------Last Topik------->
<section class="col-lg-7 connectedSortable">
<div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">
                        <i class='fa fa-calendar'></i>
                        <h4 class="box-title">Topik Terakhir</h4>
                        </div>
                        <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                        <tr>
                        <th>Tanggal</th>
                        <th>Pengirim</th>
                        <th>Topik</th>
                        </tr>
                        
                        
                        
<!--------------Query--------->
 <?php   
 include "config/koneksi.php";  
 include "config/fungsi_indotgl.php";                                  
 // query untuk topik terakhir
			  $sql2 = "SELECT A.id_topik, B.first_name, B.last_name, A.tanggal, A.subjek FROM topik_forum A, member_forum B WHERE A.id_member=B.id_member ORDER BY A.tanggal DESC LIMIT 10";
                 $hasil2 = mysql_query($sql2);
		             while($r2=mysql_fetch_array($hasil2)){
		            $tgl = tgl_indo($r2['tanggal']);
 

                                     echo"<tr>
                                            <td>$tgl</td>
                                            <td><span class='label label-success'> $r2[first_name] $r2[last_name]</span></td>
                                            <td><a href='?module=topik&id=$r2[id_topik]'>$r2[subjek]</a> </td>
                                        </tr>";
                                        }

?>
                </table>
                </div>
                </div>
                </div>
                </div>


