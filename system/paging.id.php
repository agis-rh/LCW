<?php
class PagingId {
    function cariPosisiId($batas){
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
    function jumlahPageId($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
    }
    
    function linkHalamanId($halaman, $jml_page,$page,$namaid,$id){
        $linkhalaman .= "<ul>";
        $linkhalaman .= "<li><a href='javascript:;' class='normal'>Halaman</a></li>";
        
        for($i=1;$i<=$jml_page;$i++) {
            if($i==$halaman) {
                $active =   "class='normalactive'";
            }
            else {
                $active="class='normal'";
            }
                if($i!=$jml_page) {
                    $linkhalaman .= "<li><a $active href='".$page."-".$id."-page-".$i.".html'>$i</a></li>";
                }
                else {
                    $linkhalaman .= "<li><a $active href='".$page."-".$id."-page-".$i.".html'>$i</a></li>";
                }
        }
        $linkhalaman .= "</ul>";
        
        return $linkhalaman;
    }
}
