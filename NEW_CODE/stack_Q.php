		<?php
		 //List query fuction DML AND DDL
        //List Call Syntax
        	//$call_sel = "select * from";
			$call_del = "delete from";   
			$ob = "order by";
			$in = "insert into";
			$up = "update";
			$del = "delete";
			$sl = "select";
			$call_sel = "select * FROM";
			
			/* MYSQL QUERYING */
       
       		 $call_q = @mysql_query;
       		 $call_fa = @mysql_fetch_array;
       		 $call_nr = @mysql_num_rows;
       		 $call_fr = @mysql_fetch_row;
			$call_fas = @mysql_fetch_assoc;
			$call_fob = @mysql_fetch_object;
			
			
		/*PostgreSQL */
			 //$pg_q = @pg_query;
       		// $pg_fa = @pg_fetch_array;
       		// $pg_nr = @pg_num_rows;
       		// $pg_fr = @pg_fetch_row;
			//$pg_fas = @pg_fetch_assoc;
			//$pg_fob = @pg_fetch_object;
		
		/*SQL SERVER */
			 //$sql_q = @mssql_query;
       		 //$sql_fa = @mssql_fetch_array;
       		 //$sql_nr = @mssql_num_rows;
       		// $sql_fr = @mssql_fetch_row;
			//$sql_fas = @mssql_fetch_assoc;
			//$sql_fob = @mssql_fetch_object;
		
				
			 ?>
			 
			 