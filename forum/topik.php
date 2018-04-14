<?php
include "config/koneksi.php";
include "config/fungsi_autolink.php";
include "config/fungsi_indotgl.php";


            $sql = "SELECT topik.*, member.* from topik_forum as topik, member_forum as member
                    WHERE topik.id_topik='$_GET[id]' AND member.id_member=topik.id_member";
                    
                    			
            $hasil = mysql_query($sql);
            $r=mysql_fetch_array($hasil);
            $edit=$r['id_member'];

                
            if($edit==$_SESSION['id_member']) {   
	echo "<section class='col-lg-10 connectedSortable'>
            <div class='col-md-6'>
            <div class='alert alert-info' >
            <i class='fa fa-github-alt'></i>
            <div class='pull-right box-tools'>                                        
                <a href='?module=edit_topik&id=$r[id_topik]' class='btn btn-primary btn-sm pull-right' title='sunting' style='margin-right: 5px;''><i class='fa fa-pencil'></i></a>
            </div>
            <b>Topik:</b> $r[subjek] <br />
            </div></div>";
}else{

echo "<section class='col-lg-10 connectedSortable'>
            <div class='col-md-6'>
            <div class='alert alert-info' >
            <i class='fa fa-github-alt'></i>
            <b>Topik:</b> $r[subjek] <br />
            </div></div>";

}



    $tgl = tgl_indo($r['tanggal']);
    $isi = nl2br($r['deskripsi']); // membuat paragraf pada isi komentar
    $isi_tanggapan = autolink($isi);
    //echo ;	      

		echo "<div class='row'>                        
             <div class='col-md-12'>
             <ul class='timeline'>
             <li class='time-label'>
             <span class='bg-aqua'>
             $r[first_name] $r[last_name]
             </span>
             </li>
         
         
         <li>
         <i class='fa fa-comments bg-green'></i><br /><br />
         <div class='col-md-6'>
         <div class='alert alert-success' >
         <div class='timeline-item'>
         <span class='time'><i class='fa fa-clock-o'></i ><small> $r[hari], $tgl - $r[waktu] WIB</small></span><br /><br /> 
         <i class='timeline-header'><a href='#'><u>Deskripsi :</u> </a></i><br />
         <div class='timeline-body'>
         $isi_tanggapan
         </div>
         </div>
         </div>
         </li>";
         
         //show tanggapan
         
         $query = "SELECT tp.*, mf.* FROM tanggapan_forum as tp, member_forum as mf WHERE tp.id_member=mf.id_member &&  tp.id_topik='$_GET[id]' order by id_tanggapan ASC";
         $data  = mysql_query($query);
         $jumlah = mysql_num_rows($data);
         if($jumlah > 0) {
         while($row = mysql_fetch_array($data)) {
        $date = tgl_indo($row['tanggal_tanggapan']);
            
            
            echo "<div class='row'>                        
                 <div class='col-md-12'>
                 <ul class='timeline'>
                 <li class='time-label'>
                 <span class='bg-purple'>
                 $row[first_name] $row[last_name]
                 </span>
                 </li>
                 
                 
                 <li>
                 <i class='fa fa-comments bg-aqua'></i>
                 <div class='timeline-item'>
                 <span class='time'><i class='fa fa-clock-o'></i ><small> $row[hari], $date - $row[waktu] WIB</small> </span>
                 <div class='pull-left image'>
                    <img src='member/$row[image]' width='50px' height='50px' class='img-circle' alt='User Image' />
                </div>
                 <h3 class='timeline-header'><a href='#'></a></h3><br />
                 <div class='timeline-body'>
                 $row[tanggapan]";


// tampilkan tombol hapus dan edit tanggapan
                 $user=$row[id_member];
                 if($user==$_SESSION['id_member']){
                    echo "<div class='pull-right box-tools'>                                        
                                <a href='?module=hapus_tanggapan&id=$row[id_tanggapan]&id_topik=$_GET[id]' class='btn btn-danger btn-sm daterange pull-right' title='hapus' ><i class='fa fa-trash-o'></i></a>
                                <a href='?module=edit_tanggapan&id=$row[id_tanggapan]&id_topik=$_GET[id]' class='btn btn-primary btn-sm pull-right' title='sunting' style='margin-right: 5px;''><i class='fa fa-pencil'></i></a>
                            </div>";
                 }else{

                 }

            echo"</div>
                 </li>";
                 
            
            
         }
         }
         else {
            echo "<br /><br />
            <div class='col-md-6'>
            <div class='alert alert-danger' >
            <i class='fa fa-group'></i>
            <b>Belum ada tanggapan</b>
            </div></div>";
         }

	
    
        
   
	
//show reply box
		echo "<br /><br /><br />
        <ul class=timline'>
        <div class='col-md-7'>
        <form method=post action='?module=tanggapan&id=$r[id_topik]'>
        <div class='input-group'>
		<textarea name='tanggapan' required='required'  class='form-control' placeholder='Tulis tanggapan . .' cols=75 rows=4 /></textarea>
        </div><br />
        <button type='submit' class='btn btn-primary pull-left'><i class='fa fa-share-square'></i> Kirim</button>
		</form></div></ul><br />";


  // Apabila topik dibaca, maka tambahkan berapa kali dibacanya
  $sql3 = mysql_query("UPDATE topik_forum SET pembaca=$r[pembaca]+1 WHERE id_topik='$_GET[id]'"); 



?>
</section>