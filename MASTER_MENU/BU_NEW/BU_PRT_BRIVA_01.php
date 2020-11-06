<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
			include_once"../../NEW_CODE/CODE_GET.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
    $u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = $call_q("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = $call_q("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_bu = $call_q("$sl iduser_bu,idbu,username,passuser,akses from user_bu where username='$_SESSION[namauser]'");
		$uu_bu = $call_fas($u_bu); 
	 ?>
     <?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_bu['akses']==8){ ?>
<?php
      
      
        //echo"$TG01";
   // /Generate Token/
    function BRIVAgenerateToken($client_id, $secret_id){
        $url ="https://partner.api.bri.co.id/oauth/client_credential/accesstoken?grant_type=client_credentials";
        $data = "client_id=".$client_id."&client_secret=".$secret_id;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  //for updating we have to use PUT method.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $json = json_decode($result, true);
        $accesstoken = $json['access_token'];

        return $accesstoken;
    }

    ///Generate signature/
    function BRIVAgenerateSignature($path,$verb,$token,$timestamp,$payload,$secret){
       $payloads = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=";
        $signPayload = hash_hmac('sha256', $payloads, $secret, true);
        return base64_encode($signPayload);
    }

    

        $client_id = "5Q8eGl6lAgfGBShIdMRGrsLWFxiey6yK";
  $secret_id = "sC7lekJoQPuuhAAp";
        $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
        $secret = $secret_id;
        //generate token
        $token = BRIVAgenerateToken($client_id,$secret_id);

        $institutionCode = "FPYD372710B";
  $brivaNo = "78983";
  $TG01 = @$_GET['IDTG101'];
  //$startDate = "20200915";
  //$endDate = "20200915";
		$startDate = "$TG01";
		$endDate = "$TG01";
  
            $payload = null;
            $path = "/v1/briva/report/".$institutionCode."/".$brivaNo."/".$startDate."/".$endDate ;
            $verb = "GET";
            //generate signature
            $base64sign = BRIVAgenerateSignature($path,$verb,$token,$timestamp,$payload,$secret);

            $request_headers = array(
                                "Authorization:Bearer " . $token,
                                "BRI-Timestamp:" . $timestamp,
                                "BRI-Signature:" . $base64sign,
                            );
                           
            $urlPost ="https://partner.api.bri.co.id/v1/briva/report/".$institutionCode."/".$brivaNo."/".$startDate."/".$endDate;
            $chPost = curl_init();
            curl_setopt($chPost, CURLOPT_URL,$urlPost);
            curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "GET"); 
            curl_setopt($chPost, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
            curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
            $resultPost = curl_exec($chPost);
            $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
            curl_close($chPost);

            $jsonPost = json_decode($resultPost, true);

            //echo "<br/> <br/>";
            //echo "<textarea rows=8 cols=80>Response Post : ".$resultPost."</textarea>";
   
    $jsonPost = json_decode($resultPost, true);
    $jum_data = count($jsonPost['data']);
  
    /*-----------------*/
   // echo"<br>";
    //echo"<b>$IDTG101</b> - Koneksi - <font color=#009966><b>".$jsonPost['responseDescription']."</b></font>";

    ?>
    	<h3>LAPORAN BRIVA HARIAN <?php echo"$TG01"; ?></h3>
    <form method="post">
    <table style="max-width:40rem" width="100%" border="0" class="table table-bordered table-striped table-sm">
          <tr class="table-info">
            <td width="4%">#</td>
            <td width="28%">custCode</td>
            <td width="38%">Nama</td>
            <td width="30%">Tellet ID</td>
            <td width="30%">Jumlah</td>
          </tr>
          <?php $no = 1; foreach($jsonPost['data'] as $baris){  ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $baris['custCode']; ?></td>
            <td><?php echo $baris['nama']; ?></td>
            <td><?php echo $baris['tellerid']; ?></td>
            <td><?php echo "Rp.".$baris['amount']; ?></td>
          </tr>
          <?php   $no++; } ?>
	</table>
    	
	<?php
		
  //mengubah data json menjadi data array asosiatif


/*
  //looping data menggunakan foreach
  foreach ($result as $value) {
   
   echo "status : ".$value['status']."<br>";
   echo "respon : ".$value['responseDescription']."<br>";
   echo "code : ".$value['responseCode']."<br>";
   //echo "Jurusan : ".$value['jurusan']."<br>";

   //karena data Mk didalam array, maka ambil data menggunakan foreach
   foreach ($value['data'] as $data) {
    # code...
    echo "nim : ".$data['brivaNo']."<br>";
    echo "nama : ".$data['custCode']."<br>";
   }
  }
  */
  
  
 ?>
<?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} }
?>