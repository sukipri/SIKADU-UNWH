<?php session_start();
 include_once"../sc/conek.php";
 	include"css.php";
	include"../NEW_CODE/stack_Q.php";
	include"../NEW_CODE/GR_01.php";
	include"../NEW_CODE/code_rand.php";
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
	$uu = $call_fas($u);
	
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Input Nilai</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<?php
$kddsn=@$sql_escape($_GET['kddsn']);
$idsks=@$sql_escape($_GET['idsks']);
$kdmhs=@$sql_escape($_GET['kdmhs']);
$idkrs=@$sql_escape($_GET['idkrs']);
 $dsn = $call_q("select * from dosen where iddosen='$kddsn'");
$dsnn = $call_fas($dsn);
$kj = $call_q("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = $call_fas($kj);
 $krs = $call_q("select * from krs where idsks='$idsks' and idkrs='$idkrs' ");
	//$i =1;
$krss = $call_fas($krs);
    $sks = $call_q("select * from sks where idsks='$krss[idsks]'");
$skss = $call_fas($sks);
$kr  = $call_q("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = $call_fas($kr);
  $sm = $call_q("select * from semester where idsemester='$skss[idsemester]'");
$smm = $call_fas($sm);
$mhs = $call_q("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = $call_fas($mhs);
$total01 =$krss['kt']+$krss['ssp'];
$total02 = $krss['ts']+$krss['nas'];
$sub_total = $total01 + $total02;
$total = $sub_total / 4;

?>
<?php echo"<h4>NIM &nbsp; $mhss[idmahasiswa] /&nbsp; $mhss[nama]</h4>"; ?>
<hr color="#00E171">
<?php
if(isset($_POST['update'])){

$nilai = @$_POST['kt'];
$nilai2 = @$_POST['ssp'];
$nilai3 = @$_POST['ts'];
$nilai4 = @$_POST['as'];
$nilai5 = @$_POST['na2'];

$stotal01 =$nilai+$nilai2;
$stotal02 = $nilai3+$nilai4;
$ssub_total = $stotal01 + $stotal02;
$stotal = $nilai5;
$an = "90";
$hf = "A";
$an2 = "80";
$hf2 = "AB";
$an3 = "75";
$hf3 = "B";
$an4 = "70";
$hf4 = "BC";
$an5 = "65";
$hf5 = "C";
$an6 = "60";
$hf6 = "CD";
$an7 = "55";
$hf7 = "D";
$an8 = "0.00";
$hf8 = "E";
$isi_mymail = "<b>$dsnn[nama]</b> &nbsp; Mengganti nilai MAKUL <b> $krr[judul]</b>, harap lakukan management di menu KHS > MANAGEMENT KHS ";
$jdl = "UPDATE NILAI MAKUL";
  $tgl = date("d-m-Y");

	if($nilai5 <=0){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an8',total='$an8',angka=0,huruf='$hf8',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
}elseif($nilai5 <=1.00){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an7',total='$an7',angka=1.00,huruf='$hf7',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
		}elseif($nilai5 <=1.50){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an6',total='$an6',angka=1.50,huruf='$hf6',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
		}elseif($nilai5 <=2.00){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an5',total='$an5',angka=2.00,huruf='$hf5',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
		}elseif($nilai5 <=2.50){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an4',total='$an4',angka=2.50,huruf='$hf4',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
		}elseif($nilai5 <=3.00){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an3',total='$an3',angka=3.00,huruf='$hf3',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
		}elseif($nilai5 <=3.50){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an2',total='$an2',angka=3.50,huruf='$hf2',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");

}elseif($nilai5 <=4.00){
		
		$call_q("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3',nas='$an',total='$an',angka=4.00,huruf='$hf',app2='2' where idkrs='$krss[idkrs]'");
		$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$dsnn[iddosen]','$jdl','$isi_mymail','$tgl','$dsnn[nama]')");
}
//echo"<center><a href=i_krs_kt.php?kddsn=$kddsn&idsks=$idsks&kdmhs=$kdmhs&idkrs=$idkrs&nilai=$nilai&nilai2=$nilai2&nilai3=$nilai3&nilai4=$nilai4><b>KLIK UNTUK MEMASUKAN NILAI AHIR</a></b></center>";
echo "<script language='javascript'>alert('DATA BERHASIL DISIMPAN')</script>";
	echo "<script language='javascript'>window.location = 'i_krs_kt.php?kddsn=$kddsn&idsks=$idsks&kdmhs=$kdmhs&idkrs=$idkrs'</script>";
	exit();
}

?>

<?php
//if(isset($_POST['update'])){
//$rsem = $call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]'");
//$rsemm = $call_fas($rsem);
//if($rsemm['idsemester']==$mhss['idsemester']){
//echo"sudah ada";
//}else{
//@$call_q("insert into rekamsemester(idrekamsemester,idmahasiswa,idsemester,ip)values('','$mhss[idmahasiswa]','$skss[idsemester]','0')");

//}
//}

?>

<form action="" method="post" name="form1" onSubmit="MM_validateForm('kt2','','RisNum','ssp2','','R','ts2','','RisNum','as3','','RisNum');return document.MM_returnValue">
  <table width="912" border="0" class="table">
    <tr class="success">
      <td width="42">KT</td>
      <td width="42">SSP</td>
      <td width="42">TS</td>
      <td width="42">AS</td>
    </tr>
    <tr >
      <td height="32"><input name="kt" type="text" id="kt2" default="0" placeholder="KT" value="<?php if($krss['kt'] <= 0){echo"0";}else{ echo"$krss[kt]"; }?>" class="form-control"></td>
      <td><input name="ssp" type="text" id="ssp2"  placeholder="SSP" value="<?php if($krss['ssp'] <= 0){echo"0";}else{ echo"$krss[ssp]"; } ?>" class="form-control"></td>
      <td><input name="ts" type="text" id="ts2"  placeholder="TS" value="<?php if($krss['ts'] <= 0){echo"0";}else{ echo"$krss[ts]"; } ?>"class="form-control"></td>
      <td><input name="as" type="text" id="as3"  placeholder="AS" value="<?php if($krss['nas'] <= 0){echo"0";}else{ echo"$krss[nas]"; } ?>" class="form-control"></td>
    </tr>
    <tr >
      <td height="27">NA(1-100) CTH 90 </td>
      <td class="danger">ANGKA(1-4) CTH 3.50 *(wajib diisi </td>
      <td>HURUF</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input name="na" type="text" id="na"  placeholder="Nilai Akhir Angka" value="<?php echo"$krss[total]"; ?>" class="form-control"></td>
      <td><input name="na2" type="text"   placeholder="Nilai Akhir Angka" value="<?php echo"$krss[angka]"; ?>" class="form-control"></td>
      <td><input name="na3" type="text" id="na32"  placeholder="Nilai Akhir Angka" value="<?php echo"$krss[huruf]"; ?>" class="form-control"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><input name="update" type="submit" id="update" value="MASUKAN NILAI MAHASISWA" class="btn btn-success"></td>
    </tr>
    <tr>
      <td colspan="4"><button type="button" class="close" data-dismiss="alert">*) KETERANGAN </button>
        <ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; color: rgb(70, 136, 71); font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 22.2222px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
          <li style="box-sizing: border-box;"> KT = Karya Tulis / Tugas Sejenis </li>
          <li>SSP= Sisipan, dapat berupa ujian kecil atau ujian sejenis </li>
          <li style="box-sizing: border-box;">TS = Tengah Semester</li>
          <li style="box-sizing: border-box;">AS = Akhir Semester</li>
          <li>NA = Nilai Akhir (Angka), sebagai akumulasi nilai ujianyang diisi dengan angka dengan mengacu pada pedoman penilaian</li>
          <li>NH = Nilai Akhir (Huruf), sebagai akumulasi nilai ujianyang diisi dengan angka dengan mengacu pada pedoman penilaian</li>
      </ul></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>