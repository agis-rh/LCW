<section class='col-lg-10 connectedSortable'>
<div class="col-md-6">
<div class='alert alert-info' >
<i class='fa fa-edit'></i>
<b>Edit Profil</b>
</div>
 
 


 <?php
include 'config/koneksi.php';
$id=$_GET['id'];
$tampil="select * from member_forum where id_member='$id'";
$sql=mysql_query($tampil);
while($data=mysql_fetch_array($sql)){
                    echo"<form action='?module=proses_edit_profil&id=$id' method='post' >
                    <div class='form-group'>
                        <input type='text' name='first_name' required='required' class='form-control' placeholder='First Name' value='$data[first_name]'/>
                    </div>
                    <div class='form-group'>
                        <input type='text' name='last_name'  class='form-control' placeholder='Last Name' value='$data[last_name]'/>
                    </div>
                    <div class='form-group'>
                        <input type='email' name='email' required='required' class='form-control' placeholder='Email' value='$data[email]'/>
                    </div>
                    <div class='form-group'>
                        <input type='text' name='phone'required='required' class='form-control' placeholder='Phone number' value='$data[no_hp]'/>
                    </div>
                    <div class='form-group'>
                        <input type='text' name='address' required='required' class='form-control' placeholder='Address' value='$data[alamat]'/>
                    </div>";
      }  
      ?>                            

                    <button type='submit' name="save" class='btn btn-primary pull-left'><i class='fa fa-share-square'></i> Save</button>
                    </form>
                    </div>
                    </section>
                

