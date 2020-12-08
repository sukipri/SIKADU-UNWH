<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex, nofollow" />

<link href="css/css/demo.css" rel="stylesheet" type="text/css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script>
$(function(){
    $('#wrapper-fade, h1, #skin, #back').fadeIn(4000);
});

</script>





</head>

<body>





<div id="content" class="cf"> <!-- START CONTENT -->
<div class="col3">

<div class="faq">
   <ul>
   <li><h4><a href="?aka=vprofil_dosen" class="btn btn-success"><img src="../img/address-book-32.png" width="32" height="32" border="0"><br>
    Input Jadwal Perkuliahan </a></h4>   
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

   </li>     
   <li><h4>Question 2</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
   </li>
   <li><h4>Question 3</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

   </li>
   <li><h4>Question 4</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

   </li>
   <li><h4>Question 5</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

   </li>
   <li><h4>Question 6</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

   </li>
   </ul>  
</div>

</div>
</div> <!-- END CONTENT -->








</body>

<footer>

<script>
$(document).ready(function(){

	$('li h4').click(function(){
	if( $(this).next().is(':hidden') )
		{
		$('li h4').removeClass('active').next().slideUp();		
		$(this).addClass('active').next().slideDown();
		}
		return false;
	});
});
</script>


<script type="text/javascript">
    $('.popup').click(function(event) {
      var width  = 560,
          height = 400,
          left   = ($(window).width()  - width)  / 2,
          top    = ($(window).height() - height) / 2,
          url    = this.href,
          opts   = 'status=1' +
                   ',width='  + width  +
                   ',height=' + height +
                   ',top='    + top    +
                   ',left='   + left;

      window.open(url, 'twitter', opts);

      return false;
    });
  </script>
</footer>
</html>
