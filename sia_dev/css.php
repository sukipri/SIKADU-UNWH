<?php
    /* 
        Penempatan file Layouting dan fungsi Layouting
        *CSS
        *JS
        *DLL
    */
?>
<!-- LIBRARY CSS DAN JS-->
    <!--  -->
    <link rel="icon" href="../img/logokecil.png"> 
    <title>MAHASISWA</title>
    <!-- CSS -->
        <link href="<?php echo"LAYOUT/CSS/CSS_LITERA.css"; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo"LAYOUT/CSS/NA-MIX-01.css"; ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- --JS -->
         <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
         <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
         <script src="<?php echo"LAYOUT/JS/JS_ANGULAR.js"; ?>"></script>
         <script src="<?php echo"LAYOUT/JS/JS_BOOTSTRAP.js"; ?>"></script>
          <script src="<?php echo"LAYOUT/JS/JS_01.js"; ?>"></script> 
         <!-- <script src="<?php //echo"http://$MY_HOST/NA-MIX-01/LAYOUT/JS/JS_02.js"; ?>"></script> -->
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- close -->

    <!-- Function JS -->
    <script type="text/javascript" language="JavaScript">
            function konfirmasi_del()
            {
                tanya = confirm("are you sure to cancel / delete data ?");
            if (tanya == true) return true;
            else return false;
        }
        </script>
        <script type="text/javascript" language="JavaScript">
            function konfirmasi_save()
            {
                tanya = confirm("are you sure to save  data ?");
            if (tanya == true) return true;
            else return false;
        }
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
 <script type="text/javascript" language="JavaScript">
		function konfirmasi()
		 {
			tanya = confirm("Anda Yakin Akan Menghapus Data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi_simpan()
		 {
			tanya = confirm("Anda Yakin Akan Menyimpan Data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
    
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
    <!-- -->