<?php
require_once(__DIR__ . '/includes/db_fns.php');
if(isset($_SESSION['valid_user'])){$old_user = $_SESSION['valid_user'];
}
// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

if (!empty($old_user)) {
				  if ($result_dest)  {
					// if they were logged in and are now logged out
					echo"<script>window.location.href = \"index.php\";</script>";exit;
				
				  
				  } else {
				   // they were logged in and could not be logged out
						echo"<script>window.location.href = \"index.php\";</script>";exit;
				  	}
					} else {
				  // if they weren't logged in but came to this page somehow
					echo"<script>window.location.href = \"index.php\";</script>";exit;
			}
					

?>