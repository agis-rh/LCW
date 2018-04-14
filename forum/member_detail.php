<?php
include 'config/koneksi.php';
$id=$_GET['id'];
$tampil="select * from member_forum where id_member='$id'";
$sql=mysql_query($tampil);
while($data=mysql_fetch_array($sql)){


   echo "<section class='col-lg-10 connectedSortable'>
        <div class='col-md-10'>
        <div class='alert alert-info' >
        <i class='fa fa-user'></i>
        <b>Profil $data[first_name] $data[last_name]</b>
        </div></div>";


echo"<div class='col-lg-5 col-xs-6'>
    <div class='small-box bg-aqua'>
    <div class='inner'>
    <p>$data[first_name] $data[last_name]</p>
    <p>$data[email]</p>
    <p>$data[no_hp]</p>
    <p>$data[alamat]</p>
    </div>
    <div class='icon'>
    <i class='ion ion-person'></i>
    </div>
    <i class='small-box-footer'>Profil Member</i>
    </div></div>";
}

$a=mysql_num_rows(mysql_query("select * from topik_forum where id_member='$id'"));
if($a==0){

echo " <div class='col-lg-5 col-xs-6'>
       <div class='small-box bg-purple'>
       <div class='inner'>
       <h3><i class='fa fa-dropbox'></i></h3><br />
       <p>Belum Pernah Membuat Topik</p>
       </div><br />
        <div class='icon'>
        <i class='ion ion-clipboard'></i>
        </div>
        <i class='small-box-footer'>
        Topik Member 
        </i>
        </div>
        </div>";

}else{
echo " <div class='col-lg-5 col-xs-6'>
        <div class='small-box bg-purple'>
                <div class='inner'>
                <h3>$a</h3><br />
                <p>Topik telah dibuat</p>
                </div><br />
        <div class='icon'>
        <i class='ion ion-clipboard'></i>
        </div>
        <a href='?module=member_topik&id=$id' class='small-box-footer'>
        More info <i class='fa fa-arrow-circle-right'></i>
        </a>
        </div>
        </div>";
    }
?>
</section>