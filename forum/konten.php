<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content</title>
</head>

<body>
<?php
if ($_GET['module']=='home')
{ 
include "home.php";
}
else
if ($_GET['module']=='kategori')
{ 
include "kategori.php";
}
else
if ($_GET['module']=='topik')
{ 
include "topik.php";
}
else
if ($_GET['module']=='newtopic')
{ 
include "buat_topik.php";
}
else
if ($_GET['module']=='profile')
{ 
include "profile.php";
}
else
if ($_GET['module']=='edit_profile')
{ 
include "edit_profile.php";
}
else
if ($_GET['module']=='tanggapan')
{ 
include "tanggapan.php";
}
else
	if ($_GET['module']=='mytopics')
{ 
include "mytopics.php";
}
else
	if ($_GET['module']=='edit_topik')
{ 
include "edit_topik.php";
}
else
	if ($_GET['module']=='proses_edit')
{ 
include "proses_edit_topik.php";
}
else
	if ($_GET['module']=='proses_edit_profil')
{ 
include "proses_edit_profile.php";
}
else
	if ($_GET['module']=='hapus_tanggapan')
{ 
include "hapus_tanggapan.php";
}
else
	if ($_GET['module']=='edit_tanggapan')
{ 
include "edit_tanggapan.php";
}
else
	if ($_GET['module']=='member')
{ 
include "member.php";
}
else
	if ($_GET['module']=='member_detail')
{ 
include "member_detail.php";
}
else
	if ($_GET['module']=='member_topik')
{ 
include "member_topik.php";
}
else
{
include "not_found.php";	
}
?>
</body>
</html>