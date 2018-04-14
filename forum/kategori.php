<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";


// tampilkan kategori yang dipilih
$sql = "SELECT * FROM	kategori_forum 
       WHERE id_kategori='$_GET[id]'";
$hasil = mysql_query($sql);
$r=mysql_fetch_array($hasil);


echo "<section class='col-lg-10 connectedSortable'>
                <div class='alert alert-info' >
                <i class='fa fa-tags'></i>
                <b>Kategori:</b> $r[nama]
                </div>";

// tampilkan topik berdasarkan kategori yang dipilih

$batas = 10;
$posisi = $pagingid->cariPosisiId($batas);

$sql2 = "SELECT topik_forum.id_topik, subjek, tanggal, pembaca, 
        COUNT(tanggapan_forum.id_tanggapan) AS jml_tanggapan 
        FROM topik_forum LEFT JOIN tanggapan_forum 
        ON topik_forum.id_topik=tanggapan_forum.id_topik 
				WHERE	id_kategori='$_GET[id]'
        GROUP BY tanggal DESC LIMIT $posisi,$batas ";
$hasil2 = mysql_query($sql2);
$jumlah=mysql_num_rows($hasil2);

if($jumlah==0){

          echo "<div class='alert alert-danger' >
                <i class='fa fa-dropbox'></i>
                <b>Belum Ada Topik</b>
                </div>";

}else{


       
      echo "<div class='row'>
                          <div class='col-xs-12'>
                          <div class='box'>
                          <table class='table table-bordered'>
			<tr><th>Topik</th><th>Tanggapan</th><th>Dibaca</th><th>Tanggapan Terakhir</th></tr>";	


					 
while($r2=mysql_fetch_array($hasil2)){				
	$jml_tanggapan=$r2[jml_tanggapan];
  echo "<tr>
        <td width=55%>
        <a href=?module=topik&id=$r2[id_topik]>$r2[subjek]</a><br />
        </td>
        <td align=center width=10%>$jml_tanggapan</td>
        <td align=center width=10%>$r2[pembaca]</td>
        <td width=25%>";
                
			  // query untuk tanggapan terakhir
			  $sql3 = "SELECT tanggapan.*, member.* from tanggapan_forum as tanggapan, member_forum as member 
                WHERE tanggapan.id_topik='$r2[id_topik]' AND tanggapan.id_member=member.id_member
                ORDER BY tanggapan.tanggal_tanggapan DESC LIMIT 1";
								
			  $hasil3 = mysql_query($sql3);
		    while($r3=mysql_fetch_array($hasil3)){
		      $tgl = tgl_indo($r3['tanggal_tanggapan']);
				  echo "<small><i>$tgl </i></small>  <small><i> ($r3[first_name] $r3[last_name])</i></small>";
			  }
  echo "</td></tr>";            
}



echo "</table></div></div></div>";	
				

// tampilkan paging halaman


$sql4="SELECT topik_forum.id_topik, subjek, tanggal, pembaca, 
        COUNT(tanggapan_forum.id_tanggapan) AS jml_tanggapan 
        FROM topik_forum LEFT JOIN tanggapan_forum 
        ON topik_forum.id_topik=tanggapan_forum.id_topik 
        WHERE id_kategori='$_GET[id]'
        GROUP BY tanggal DESC ";
$hasil4=mysql_query($sql4);
$jumlah4=mysql_num_rows($hasil4);
$active = "kategori";
$namaid = "id";
$id     = $_GET['id'];
$halaman = $_GET['halaman'];
$jml_page = $pagingid->jumlahPageId($jumlah4,$batas);
$link    = $pagingid->linkHalamanId($halaman,$jml_page,$active,$namaid,$id);
echo "$link";

}
 ?>

 </section>
