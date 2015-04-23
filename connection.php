<?php

$con=mysql_connect("localhost","root","root");
			if(!$con )
			{
				die("connot connect: ".mysql_error());
			}

		mysql_select_db("domitaryproject"); 

?>