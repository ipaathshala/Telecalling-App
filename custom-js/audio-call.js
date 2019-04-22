$(document).ready(function(){
	$("#invtel, #invschool, #norecord, #invalid, #fail, #records").hide();
	$.ajax({
		type:'POST',
		url:'ajax/telecaller-dropdown',
		success:function(result){
			if(result!=0){
				$('#telecaller').html(result).show();
			}
			else{
				$("#telecaller").trigger(0);
			}
		},
		error: function(error){
			$('#fail').delay(2000).show().slideUp('fast');
			return false;
		}
	});

	$("#telecaller").change(function(){
		var telecaller = $("#telecaller option:selected").val();
		$.ajax({
			type:'GET',
			url:'ajax/teleschool-list',
			data:{telecaller: telecaller},
			success:function(result){
				if(result != 0){
					$("#school").html(result);
				}
				else{
					$("#school").trigger(0);
				}
			},
			error: function (error){
				$("#fail").delay(2000).show().slideUp('fast');
				return false;
			}
		});
	});

	$("#telecaller, #school, #from_dt, #to_dt").change(function(){
		var telecall_id = $("#telecaller option:selected").val();	
		var school_id = $("#school option:selected").val();
		var from_date = $("#from_dt").val();
		var to_date = $("#to_dt").val();

		if(telecall_id == 0){
			$("#invtel").delay(2000).slideUp('fast').show();
			return false;
		}
		if(school_id == 0){
			$("#invschool").delay(2000).slideUp('fast').show();
			return false;
		}
		if(from_date==='' || to_date===''){
			$("#invdate").delay(2000).slideUp('fast').show();
			return false;
		}
		else{
			$.ajax({
				type:'GET',
				url:'ajax/audio-report',
				data:{telecall_id: telecall_id, school_id: school_id, from_date: from_date, to_date: to_date},
				success:function(result){
					if(result != 0){
						$("#callreport").html(result);
					}
					else{
						$("#callreport").hide();
						$("#norecord").delay(2000).slideUp('fast').show();
						return false;
					}
				},
				error: function (error){
					$("#fail").delay(2000).show().slideUp('fast');
					return false;
				}
			});
		}
	});
});