<?php
/* MYSQL */
	//SQL INJECTION DEFFENDER->
        $sql_escape = @mysql_real_escape_string;
        $sql_tag = @strip_tags;
        $sql_slash = @addslashes;
		$sql_trim = @trim;
		$sql_html = @htmlentities;
		$sql_char = @htmlspecialchars;
			//full anti injection
		function sql_full($inject){
		$sql_in = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($inject))));
				return $sql_in;
		}	
	//ENCRIPTIONS HASHING->
		/* add , ENT_QUOTES to more secure */
		function hs($data_hs){
		$filter_hs = sha1($data_hs); 
		return $filter_hs; 
			} 
			function md($data_md){
		$filter_md = md5($data_md); 
		return $filter_md; 
			} 
		function cr($data_cr){
		$filter_cr = crc32($data_cr); 
		return $filter_cr; 
			} 
			function cp($data_cr){
		$filter_cp = crypt($data_cr); 
		return $filter_cp; 
			} 
		
		
		
		
		
	//ENCRIPTION CHIPER JULIUSv ->
		//   $td = mcrypt_module_open('rijndael-256', '', 'ofb', '');  
   
	 	//	$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);  
		//	 $ks = mcrypt_enc_get_key_size($td);  
   		//	 $key = substr(md5(@$_GET['']), 0, $ks);  
	/* Intialize encryption */  
		//	  mcrypt_generic_init($td, $key, $iv);  
		//	 $plaintext = @$_GET[''];  
	 /* Encrypt data */  
		//	 $encrypted = @mcrypt_generic($td, $plaintext);  
	 /* Terminate encryption handler */  
		//	 mcrypt_generic_deinit($td);  
	 /* Initialize encryption module for decryption */  
		//	 mcrypt_generic_init($td, $key, $iv);  
	 /* Decrypt encrypted string */  
		//	 $decrypted = @mdecrypt_generic($td, $encrypted);  
	/* Terminate decryption handle and close module */  
		//	 mcrypt_generic_deinit($td);  
		//	 mcrypt_module_close($td);  
					/* how to use */
						// echo "teks = ".$plaintext."<br/>";   
     					// echo "teks yang dienkripsi : ".$encrypted."<br/>";  
  						// echo "teks yang didekripsi kembali :".trim($decrypted) . "\n";  
						
						
						
						
						/*PostgreSQL*/
						 //$pg_escape = @pg_escape_string;
						   //$pg_tag = @strip_tags;
        					//$pg_slash = @addslashes;
							//$pg_trim = @trim;
							//$pg_html = @htmlentities;
							//$pg_char = @htmlspecialchars;
	 
?>
