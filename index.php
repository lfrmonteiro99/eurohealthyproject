<?php
	session_start();

	if($_SESSION['login'] != 1){
		header("Location: login.html");
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title>EuroHealthy</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="estilos1.css" media="screen" />


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!--<script src="http://malsup.github.com/jquery.form.js"></script>-->
</head>

<body>
<script src="main.js"></script>
<script src="index.js"></script>
	<div id="centernologin">
		<div id="wrappermiddlenologin">
		<h4 style="text-align:center">ALPHANUMERIC DATA</h4>



<form action="#">

	<p style="font-weight:bold">CSV FILE: </p>
    <div id="csv">
			<input type="file" class="input" id="csvfile" name="image" >
			<button  id="submitcsv" class="btn btn-sm btn-success upload" type="submit" disabled>Upload</button>
			<button type="button" id="cancelcsv" class="btn btn-sm btn-danger cancel">Cancel</button>
			<img src="images/processing.gif" alt="processing..." style="display: none;">
			

			<!--<a href="#" class="success" id="successcsv" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="display: none;color: green">
				<span class="glyphicon glyphicon-ok"></span>
			</a>
			
			<a href="#" class="insuccess" id="insuccesscsv" data-toggle="popover" data-trigger="hover" style="display: none; color: #D4614A">
				<span id="formatcsv" class="glyphicon glyphicon-exclamation-sign" ></span>
				
			</a>-->


			<?php if($_SESSION['alfanumerico'] === 1){ ?>
				<a href="#" class="success" id="successcsv1" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="color: green">
				<span class="glyphicon glyphicon-ok"></span>


				</a>
				<button id="downRep" class="btn btn-sm btn-seccess download" type="submit" style="margin-left: 10px">Download Report</button>
				<a href="#" class="downcsvsuccess" id="downcsvsuccess" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="display: none;color: green">
					<span class="glyphicon glyphicon-ok"></span>
				</a>
				<a href="#" class="downcsvinsuccess" id="downcsvinsuccess" data-toggle="popover" data-trigger="hover" style="display: none; color: #D4614A">
					<span id="formatcsv" class="glyphicon glyphicon-exclamation-sign" ></span>
					
				</a>
			<?php } ?>
	</div>

	 
		</form>








		<form action="#">
			<p style="font-weight:bold">TXT FILE: </p>
	      	<div>
		      	<input type="file" id="txt1" class="input" name="image" >
		      	<button id="submitTxt1" class="btn btn-sm btn-success upload" type="submit" disabled>Upload</button>
		        <button type="button" id="cancelTxt" class="btn btn-sm btn-danger cancel">Cancel</button>
				<img src="images/processing.gif" alt="processing..." style="display: none;">

				
				<a href="#" class="success" id="successtxt" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="color: green; margin-left: 15px; display: none;">
					<span class="glyphicon glyphicon-ok"></span>
				</a>
			
			<a href="#" class="insuccess" id="insuccesstxt" data-toggle="popover" data-trigger="hover" style="display: none; color: #D4614A">
				<span id="formatcsv" class="glyphicon glyphicon-exclamation-sign" ></span>
				
			</a>
	      	</div>


		</form>






		<br>





		<h4 style="text-align:center">GEOGRAPHICAL DATA</h4>

		<form action="#">
			<p style="font-weight:bold">SHAPE FILE: </p>
          	<div>
          			
                        <label id="shapelabel" name="shapelabel" class="radio_inline">
                            <input id="single" type="radio" name="optionsRadios" value="single">
                            Single File
                        </label>

                        <label id="shapelabel1" name="shapelabel1" class="radio_inline">
                            <input id="multiple" type="radio" name="optionsRadios" value="multiple">
                            Multiple Files
                        </label>
                        <p>
                            <select name="anos" id="anos" style="display: none; margin-left: -20px;">
								<option>Select ...</option>
                                <option>2001</option>
                                <option>2002</option>
                                <option>2003</option>
                                <option>2004</option>
                                <option>2005</option>
                                <option>2006</option>
                                <option>2007</option>
                                <option>2008</option>
                                <option>2009</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                            </select>
                        </p>
        			<input id="shape" class="input" type="file" name="image" style="display: none">
        			<button id="submitshape" class="btn btn-sm btn-success upload" style="display: none" type="submit"  disabled>Upload</button>
        			<button type="button" id="cancelshape" style="display: none" class="btn btn-sm btn-danger cancel" >Cancel</button>
        			<img src="images/processing.gif" alt="processing..." style="display: none;">

             		<a href="#" class="success" id="successshape" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="display: none;color: green">
						<span class="glyphicon glyphicon-ok"></span>
					</a>
			
					<a href="#" class="insuccess" id="insuccessshape" data-toggle="popover" data-trigger="hover" style="display: none; color: #D4614A">
						<span id="formatcsv" class="glyphicon glyphicon-exclamation-sign" ></span>
						
					</a>
					<?php if($_SESSION['meta'] === 1){ ?>
					<a href="#" class="success" id="successshape" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="color: green">
						<span class="glyphicon glyphicon-ok"></span>
					</a>
			  <button id="shapedownrep" class="btn btn-sm btn-seccess download" type="submit" style="margin-left: 10px">Download Report</button>
			  		<?php } ?>

    		</div>
		</form>






		<form action="#">
			<p style="font-weight:bold">TXT FILE: </p>
      <div>
  			<input id="txt2" class="input" type="file" name="image" >
  			<button id="submitTxt2" class="btn btn-sm btn-success upload" type="submit" disabled>Upload</button>
  			<button type="button" id="cancelTxt2" class="btn btn-sm btn-danger cancel">Cancel</button>
  			<img src="images/processing.gif" alt="processing..." style="display: none;">
			
			<a href="#" class="success" id="successtxt1" data-toggle="popover" data-trigger="hover" data-content="Upload successed" style="display: none;color: green">
						<span class="glyphicon glyphicon-ok"></span>
					</a>
			
					<a href="#" class="insuccess" id="insuccesstxt1" data-toggle="popover" data-trigger="hover" style="display: none; color: #D4614A">
						<span id="formatcsv" class="glyphicon glyphicon-exclamation-sign" ></span>
						
					</a>
       

      </div>

		</form>

		<hr>

		<!--<button class="btn btn-sm btn-success upload-all" disabled>Upload All</button>-->
		<button class="btn btn-sm btn-danger cancel-all" id="cancelall">Cancel All</button>
		<button class="btn btn-sm btn-danger cancel-all" id="logout">Log out</button>

	
	</div>


		<script>
$(document).ready(function(){
	
    $('[data-toggle="popover"]').popover();
	$('.glyphicon-leaf').hide();
	$('.glyphicon-leaf').hide();
});


</script>
    </div>
</body>
</html>
