<!DOCTYPE html>

<html>
<head>
	<title>Teknotica's blog | File Upload by AJAX</title>
    <link href='http://fonts.googleapis.com/css?family=Delius+Swash+Caps' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.6.4.js"></script>
	<script src="js/jquery.form.js"></script>
	<style>
		* {
			padding:0;
			margin:0;
		}
		body {
			font-family: Georgia, serif;
			font-size: 16px;
		}
		h1, h3 {
			font-family: 'Delius Swash Caps', cursive;
		}
		h1 {
			font-size:2em;			
		}
		h3{
			font-size:1em;
		}
		 a {
			color:#47B8F9;
		}  
		#center {
			width:500px;
			margin:60px auto;
		}
		.text-field {
			width: 100%;
			border: 1px solid #CCC;
			padding: 10px;
		}
		label {
			display:block;
			margin-top:20px;
		}
		#upload {
			border: 1px solid #CCC;
			padding: 10px;
			background-color: #47B8F9;
			width:155px;
			cursor:pointer;
			display:none;
		}
		#preview {
			position:relative;
			width:70px;
		}
		#clear {
			position: absolute;
			right: 0;
			top: 0;
			cursor: pointer;
			display:none;
		}
		#save {
			display:block;
		}
		
	</style>
    <script>
        $(function(){
			
           // Options for Ajax submittion
			var options = { 
				beforeSubmit: showRequest,  
				success: showResponse,  
				url: 'service.php',
				type: 'post'   
			}; 
		 
			// bind to the form's submit event 
			$('#photo-frm').submit(function() { 
				$(this).ajaxSubmit(options); 
				return false; 
			}); 
			
			// Before submitting
			function showRequest(formData, jqForm, options) {        
				// TODO: Do some validation before submitting
			} 
			
			// After submitting
			function showResponse(responseText, statusText, xhr, $form)  {
				// Preview file
				$('#file-preview').attr('src', responseText);
				// Assign file path to hidden input to be saved
				$('#photo-filepath').val(responseText);
				// Show X image to clear image
				$('#clear').show();
				// Hide upload button
				$('#upload').hide();
			}
			
			$('#photo').change(function(){
				// Show upload submit button
				$('#upload').show();
			});
			
			// Remove picture clicked
			$('#clear').click(function(){
				// TODO: Remove file from server
				
				// Remove preview image
				$('#file-preview').attr('src', 'default.png');
				// Clear hidden and file input
				$('#photo').val('');
				$('#photo-filepath').val('');
				// Hide X image
				$('#clear').hide();
				$('#upload').show();
			});
        });
    </script>
</head>

<body>
	<div id="center">
		<h1>File upload preview using Ajax</h1>
		<h3>by <a href="http://twitter.com/#!/teknotica">@teknotica</a></h3>
		<form id="photo-frm" method="post" enctype="multipart/form-data">
			<label for="photo">Photo</label>
			<input type="file" size="16" name="photo" id="photo" />
			<input type="submit" id="upload" value="Upload your photo" />
			<div id="preview">
				<img src="clear.png" alt="Remove file" id="clear" width="16" height="16" />
				<img src="default.png" class="default" alt="File preview" id="file-preview" width="50" height="50" />
			</div>	
		</form>
		<form id="data-frm" method="post">
			<label for="photo-title">Photo title</label>
            <input type="text" name="photo-title" id="photo-title" class="text-field" placeholder="Your photo title here" />
			<label for="photo-description">Photo description</label>
			<textarea name="photo-description" id="photo-description" class="text-field" cols="30" rows="5" placeholder="200 characters"></textarea>
			<input type="hidden" name="photo-filepath" id="photo-filepath" />
			<input type="submit" id="save" value="Save entry" />
		</form>
	</div>
</body>
</html>
