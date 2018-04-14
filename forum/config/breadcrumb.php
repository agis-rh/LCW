<?php
if($_GET['module']=='home'){
	echo "<span class='current'>Beranda</span>";
}
elseif($_GET['module']=='topik'){
	echo "<span class='current'>Topik</span>";
}
elseif($_GET['module']=='kategori'){
	echo "<span class='current'>Kategori</span>";
}
elseif($_GET['module']=='newtopic'){
	echo "<span class='current'>Buat Topik Baru</span>";
}
elseif($_GET['module']=='profile'){
	echo "<span class='current'>Profil</span>";
}
elseif($_GET['module']=='edit_profile'){
	echo "<span class='current'>Edit Profil</span>";
}
elseif($_GET['module']=='tanggapan'){
	echo "<span class='current'>Tanggapan</span>";
}
elseif($_GET['module']=='mytopics'){
	echo "<span class='current'>Topik Saya</span>";
}
elseif($_GET['module']=='edit_topik'){
	echo "<span class='current'>Edit Topik</span>";
}
elseif($_GET['module']=='edit_tanggapan'){
	echo "<span class='current'>Edit Tanggapan</span>";
}
elseif($_GET['module']=='member'){
	echo "<span class='current'>Anggota</span>";
}
elseif($_GET['module']=='member_detail'){
	echo "<span class='current'>Detail Anggota</span>";
}
elseif($_GET['module']=='member_topik'){
	echo "<span class='current'>Topik Anggota</span>";
}
?>
