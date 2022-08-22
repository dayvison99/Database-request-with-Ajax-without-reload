$(document).on('click','#btn-add',function(e) {
				var data = $("#user_form").serialize();
				var id=$(this).attr("data-id");
				var name=$('#name').val();
				var email=$('#email').val();
				var usuario=$('#usuario').val();
				var senha=$('#senha').val();

		if(name!="" && email!="" && usuario!="" && senha!=""){
			$.ajax({
			data: data,
			name: name,
			email: email,
			usuario: usuario,


			type: "post",
			url: "../classes/manipularusuarios.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide');
						alert('Dados Cadastrados com Sucesso !');
                        location.reload();
					}
					else if(dataResult.statusCode==201){
							alert('Email Já Existe !');

					}
					else if(dataResult.statusCode==202){
							alert('Usuário Já Existe !');

					}
			}
				});
			}
		else{
			alert('Preencha todos os campos !');
		}

	});
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var email=$(this).attr("data-email");
		var usuario=$(this).attr("data-usuario");
		var senha=$(this).attr("data-senha");
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#email_u').val(email);
		$('#usuario_u').val(usuario);
		$('#senha_u').val(senha);
	});

	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "../classes/manipularusuarios.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						alert('Dados Alterados com Sucesso !');
                        location.reload();
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}

			}
		});
	});
	$(document).on("click", ".delete", function() {
		var id=$(this).attr("data-id");
		$('#id_d').val(id);

	});
	$(document).on("click", "#delete", function() {
		$.ajax({
			url: "../classes/manipularusuarios.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
					location.reload();

			}
		});
	});
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Selecione os Cadastros.");
		}
		else {
			WRN_PROFILE_DELETE = "Tem certeza de que deseja excluir "+(user.length>1?"Cadastros":" Cadastro")+" ?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "../classes/manipularusuarios.php",
					cache:false,
					data:{
						type: 4,
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {
							$("#"+ids[i]).remove();
						}
					 alert('Dados Excluídos com Sucesso !');
										}
				});
			}

			location.reload();
			require("../templates/usuario.php");
		}
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;
				});
			} else{
				checkbox.each(function(){
					this.checked = false;
				});
			}
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});
