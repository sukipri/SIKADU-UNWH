
<?php
$files=glob('temp/*.png');
foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
}

//if(file_exists($files)){
//echo"problem deleting ".$files;
//}else {
//echo"hapus berhasil ".$files;
//}
?>

