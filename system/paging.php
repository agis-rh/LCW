<?php
class Paging {
    function cariPosisi($batas){
    if(empty($_GET['halaman'])){
            $posisi=0;
            $_GET['halaman']=1;
    }
    else{
            $posisi = ($_GET['halaman']-1) * $batas;
    }
    return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahPage($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
    }
    
    function linkHalaman($halaman, $jml_page,$page){
        $linkhalaman .= "<ul class='pagination'>";
        $linkhalaman .= "<li><a>Halaman </a></li>";
        for($i=1;$i<=$jml_page;$i++) {
            if($i==$halaman) {
                $active =   "class='active'";
            }
            else {
                $active="";
            }
                if($i!=$jml_page) {
                    $linkhalaman .= "<li $active><a href='$_SERVER[PHP_SELF]?page=$page&halaman=$i'>$i</a></li>";
                }
                else {
                    $linkhalaman .= "<li $active><a href='$_SERVER[PHP_SELF]?page=$page&halaman=$i'>$i</a></li>";
                }
        }
        $linkhalaman .= "</ul>";
        
        return $linkhalaman;
    }
}
