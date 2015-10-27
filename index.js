/*$('.upload-all').click(function(){
			//submit all form
			$('form').submit();
		});
		
$('.cancel-all').click(function(){
	//submit all form
	$('form .cancel').click();
});

*/


var uploadAlfanumerico = 0;


    $(document).on('submit', 'form', function(e){
        e.preventDefault();
        $form = $(this);

        uploadImage($form);
    });
    
    function uploadImage($form){

        var formdata = new FormData($form[0]);
        
        var request = new XMLHttpRequest();
        var uploadDone = 0;

        request.upload.addEventListener('progress', function(e){
            var percent = Math.round(e.loaded/e.total * 100);

            $form.find('img').show();
        });
        
        request.addEventListener('load', function(e){
        	$form.find('img').hide();
           
			if(request.responseText === "isto foi feito csv"){
				$form.find('.insuccess').hide();
				 $form.find(".upload").attr('disabled', 'disabled');
				$form.find('.success').fadeIn();
               
                $form.find('.download').fadeIn();
                window.location = "report.php";
                uploadAlfanumerico = 1;
			}else if(request.responseText === "isto foi feito shape"){
				$form.find('.insuccess').hide();
                 $form.find(".upload").attr('disabled', 'disabled');
                $form.find('.success').fadeIn();
               
                $form.find('.download').fadeIn();
                window.location = "reportshape.php";
			}else if(request.responseText === "isto foi feito"){
                $form.find('.insuccess').hide();
                 $form.find(".upload").attr('disabled', 'disabled');
                $form.find('.success').fadeIn();
               
               // $form.find('.download').fadeIn();
            }else{
                $form.find(".success").hide();
                $form.find(".insuccess").fadeIn();
                $form.find(".insuccess").attr('data-content', 'File has Incorrect Data');
               $form.find(".upload").attr('disabled', 'disabled');
               $form.find('.download').hide();
               uploadAlfanumerico = 0;
            }
	   });



        request.open('post', 'upload.php');
        request.send(formdata);

       

        
        $form.on('click', '.cancel', function(){
            request.abort();
            $form.find('.upload').attr('disabled', 'disabled');
			$form.find('.input').val('');
			$form.find('.alert').hide();
			$form.find('img').hide();
			$form.find('.glyphicon').hide();
            $form.find(".success").hide();
            $form.find('.insuccess').hide();
            $form.find('.download').hide();
        });
			
    }

    $(document).on('change', '#csvfile', function(e){
    	e.preventDefault();
    	if($(this).val() !== ''){ //se não for vazio

	    	var ext = $(this).val().split('.').pop().toLowerCase(); //apanha a extensão do ficheiro
	    		
	    		if(ext !== 'csv') { //se NÃO for csv

	    			//vai mostra a caixa de erro de extensão
					
					$("#insuccesscsv").fadeIn();
					$("#insuccesscsv").attr('data-content', 'File has Incorrect Extension');
					$("#downRep").hide();
					$("#submitcsv").attr('disabled', 'disabled');
                    $("#successcsv1").hide();
	    		}else{
	    			$("#submitcsv").removeAttr('disabled'); //activa o botão upload
    			     $("#successcsv").hide();
                    $("#insuccesscsv").hide();
                    $("#successcsv1").hide();
                    $("#downRep").hide();
	    		}

	    	}
    });

   

    $(document).on('click', '#cancelcsv', function(e){
    	e.preventDefault();
    	$("#submitcsv").attr('disabled', 'disabled');
    	$("#csvfile").val('');
    	$("#insuccesscsv").hide();
        $("#successcsv").hide();
    	$("#successcsv1").hide();
        $("#downRep").hide();
    });



    $(document).on('change', '#txt1', function(e){

    	e.preventDefault();
	
    	if($(this).val() !== ''){ //se não for vazio

	    	var ext = $(this).val().split('.').pop().toLowerCase(); //apanha a extensão do ficheiro
	    		
	    		if(ext !== 'txt') { //se NÃO for txt
					
	    			//vai mostra a caixa de erro de extensão
					$("#insuccesstxt").fadeIn();
                    $("#insuccesstxt").attr('data-content', 'File has Incorrect Extension');//vai mostra a caixa de erro de extensão

	    		}else{
	    			$("#submitTxt1").removeAttr('disabled'); //activa o botão upload
	    			$("#insuccesstxt").hide();
                     $("#successtxt").hide();
	    		}

	    	}
    });

    $(document).on('click', '#cancelTxt', function(e){
    	e.preventDefault();
    	$("#submitTxt1").attr('disabled', 'disabled');
    	$("#txt1").val('');
    	$("#insuccesstxt").hide();
         $("#successtxt").hide();
    });


    $(document).on('change', '#shape', function(e){
    	e.preventDefault();
    	if($(this).val() !== ''){ //se não for vazio
	    	var ext = $(this).val().split('.').pop().toLowerCase(); //apanha a extensão do ficheiro
	    
	    		if(ext === 'zip') { //se for zip

					$("#submitshape").removeAttr('disabled'); //activa o botão upload
                    $("#insuccessshape").hide();
                     $("#successshape").hide();
					
	    		}

	    		else if(ext === 'rar'){
					$('#glyphiconshapefalse').hide();
					$("#submitshape").removeAttr('disabled');
	    		}

	    		else if(ext === '7z'){
    				$('#glyphiconshapefalse').hide();
    				$("#submitshape").removeAttr('disabled');
	    		}

	    		else{
	    			//activa o botão upload
	    			$("#insuccessshape").fadeIn();
                    $("#insuccessshape").attr('data-content', 'File has Incorrect Extension');
	    		}

	    	}
    });

    $(document).on('click', '#cancelshape', function(e){
    	e.preventDefault();
    	$("#submitshape").attr('disabled', 'disabled');
    	$("#shape").val('');
    	$("#glyphiconshapefalse").hide();
    	$("#shape").hide();
        $("#submitshape").hide();
        $("#cancelshape").hide();
        $("#anos").hide();
        $("#shapelabel").show('slow');
        $("#shapelabel1").show('slow');
        $("#single").show('slow');
        $("#multiple").show('slow');
        $("#single").show('slow');
        $("#insuccessshape").hide();
        $("#successshape").hide();
    });



	$(document).on( 'click',".radio_inline input[type='radio']", function(e){
		e.preventDefault();
        if ($("#single").is(":checked")) {
            $(this).hide();
            $("#shapelabel").hide();
            $("#multiple").hide();
            $("#shapelabel1").hide();
            $("#shape").show('slow');
            $("#submitshape").show('slow');
            $("#cancelshape").show('slow');
            $("#barshape").show('slow');

        } else if ($("#multiple").is(":checked")) {
            $(this).hide();
            $("#shapelabel").hide();
            $("#shapelabel1").hide();
            $("#single").hide();
            
            $("#anos").show('slow');
            $("#shape").show('slow');
            $("#submitshape").show('slow');
            $("#cancelshape").show('slow');
        }
	});
	
	$(document).on('change', '#txt2', function(e){
		e.preventDefault();
		$('#glyphicontxt2false').hide();
		$('#glyphicontxt2true').hide();
		$("#submitTxt1").attr('disabled', 'disabled');
    	if($(this).val() !== ''){ //se não for vazio
	    	var ext = $(this).val().split('.').pop().toLowerCase(); //apanha a extensão do ficheiro
	    		
	    		if(ext !== 'txt') { //se NÃO for txt

	    			//vai mostra a caixa de erro de extensão
                    $("#insuccesstxt1").fadeIn();
                    $("#insuccesstxt1").attr('data-content', 'File has Incorrect Extension');//vai mostra a caixa de erro de extensão
	    		}else{
	    			$("#submitTxt2").removeAttr('disabled'); //activa o botão upload
                    $("#insuccesstxt1").hide();
                     $("#successtxt1").hide();
	    		}

	    	}
	});
	
	$(document).on('click', '#cancelTxt2', function(e){
    	e.preventDefault();
        $("#submitTxt2").attr('disabled', 'disabled');
        $("#txt2").val('');
        $("#insuccesstxt1").hide();
         $("#successtxt1").hide();
    });
	

    $(document).on('click', '#cancelall', function(e){
        e.preventDefault();
        $("#submitTxt2").attr('disabled', 'disabled');
        $("#txt2").val('');
        $("#insuccesstxt1").hide();
        $("#successtxt1").hide();

        $("#submitshape").attr('disabled', 'disabled');
        $("#shape").val('');
        $("#glyphiconshapefalse").hide();
        $("#shape").hide();
        $("#submitshape").hide();
        $("#cancelshape").hide();
        $("#anos").hide();
        $("#shapelabel").show('slow');
        $("#shapelabel1").show('slow');
        $("#single").show('slow');
        $("#multiple").show('slow');
        $("#single").show('slow');
        $("#insuccessshape").hide();
        $("#successshape").hide();

        $("#submitTxt1").attr('disabled', 'disabled');
        $("#txt1").val('');
        $("#insuccesstxt").hide();
        $("#successtxt").hide();

        $("#submitcsv").attr('disabled', 'disabled');
        $("#csvfile").val('');
        $("#insuccesscsv").hide();
        $("#successcsv").hide();
    });

$(document).on('click', '#logout', function(e){
    e.preventDefault();
    window.location='logout.php';
});

$(document).on('click', '#downRep', function(e){
    e.preventDefault();
    /*var request = new XMLHttpRequest();

    request.upload.addEventListener('progress', function(e){
            var percent = Math.round(e.loaded/e.total * 100);
            $form.find('img').show();
            $('#downRep').hide();
        });
        
        request.addEventListener('load', function(e){
           
           
            if(request.responseText === "isto foi feito"){
               
                $("#downRep").fadeOut();
            }
       });



        request.open('post', 'downcsv.php');
        request.send();*/

        window.location = 'downcsv.php';
        $("#downRep").hide();

        
});

$(document).on('click', '#shapedownrep', function(e){

	e.preventDefault();

	window.location = 'downshape.php';
	$('#shapedownrep').hide()
});