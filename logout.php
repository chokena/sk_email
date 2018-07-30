<? 
session_start();
 

session_unset(); 

// destroy the session 
session_destroy();
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';

?>