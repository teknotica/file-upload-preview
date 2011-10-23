<?php

    // File object 
    $file = $_FILES['photo'];     
    
    // File types allowed to be uploaded
    $file_types_allowed = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/png", "image/x-png");			
   
    // Check if image is allowed
    if (in_array($file["type"], $file_types_allowed))  {				
      if ($file["error"] > 0) {
        echo "Return Code: " . $file["error"] . "<br />";
      }
      else {
        // TODO: resize image
        // Save image in uploads folder
        $path = 'uploads/' .$file["name"];
        move_uploaded_file($file["tmp_name"], $path);        
        echo $path;
        }
        
      }
    else {
      // Return error  
      echo "An error has occured - the file is invalid";
    }			
	
?>