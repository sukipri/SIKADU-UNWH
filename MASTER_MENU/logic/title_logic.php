<?php
		//title
		  $fill = @$sql_escape($_GET['page']);
		   function judul(){
                if(empty($fill)){
                    return"MIX-CODE";
                }else{
                    
                    return"MIX-CODE-$fill";
                }
		}
			

?>
