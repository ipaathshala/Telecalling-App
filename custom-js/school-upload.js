$(document).ready(function(){
	
	$("#invfile, #duplicate, #invalid, #fail, #success, #loader").hide();

	$('form').submit(function(){
		var fileType = $('#file').val();
		var extensions = [".csv"];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");

		if(fileType===''||!check.test(fileType.toLowerCase())){
			$('#invfile').delay(2000).show().slideUp('fast');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'ajax/school-upload',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().slideUp('fast');
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
					if(result == 2){
						$('#duplicate').delay(2000).show().slideUp('fast');
						return false;
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
					if(result == 0){
						$('#invalid').delay(2000).show().slideUp('fast');
						return false;
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
				},
				error:function(error){
					$('#loader').hide();
					$('button').show();
					$('#fail').delay(2000).show().slideUp('fast');
					return false;	
				},
				complete:function(result){
					$("#loader").hide();
					$('button').show();
				}
			});
			return false;
		}
	});
});