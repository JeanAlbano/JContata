//função para validar o telefone.
function validaNumero(tel){
	exp = /^\([1-9]{2}\) [2-9][0-9]{3}\-[0-9]{4}|(^\([1-9]{2}\) [2-9][0-9]{4}\-[0-9]{4})$/;	//expresão regular para (xx) xxxx-xxxx ou (xx) xxxxx-xxxx
	if(!exp.test(tel)){	//inválido
		return false;
	}else{	//válido
		return true;	
	}
}

$(document).ready(function(){
	//mascara para os números de telefone
	$("input[name=telefone]").mask("(00) 0000-00009");
	$("input[name=telefone]").blur(function(event) {
	   if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
		  $("input[name=telefone]").mask('(00) 00000-0009');
	   } else {
		  $("input[name=telefone]").mask('(00) 0000-00009');
	   }
	});

	$("#formContato").submit(function(e){	//validação do formulário de contato
		e.preventDefault();	//para evitar o submit do formulário
		var erro = 0;	//variavel para confirmar que não houve nenhum erro
		
		//campos obrigatorios
		var nome = $("input[name=nome]").val();
		var email = $("input[name=email]").val();
		var mensagem = $("textarea[name=mensagem]").val();

		//validação do nome
		if(nome.trim().length){		//verifica se não existem apenas espaços em branco
			$("input[name=nome]").parent().removeClass("has-error");	//removendo o erro se houver
			$("input[name=nome]").next().hide();
		}else{
			$("input[name=nome]").parent().addClass("has-error");
			$("input[name=nome]").next().show().html("Nome inválido!");	//informando o erro
			erro++;
		}

		//campo opcional
		var telefone = $("input[name=telefone]").val();

		//validação do telefone caso tenha sido informado
		if(telefone.trim().length){	//verifica se o campo esta preenchido
			if(!validaNumero(telefone)){	//telefone inválido
				$("input[name=telefone]").parent().addClass("has-error");
				$("input[name=telefone]").next().show().html("Telefone inválido!");	//informando o erro
				erro++;
			}else{
				$("input[name=telefone]").parent().removeClass("has-error");	//removendo o erro se houver
				$("input[name=telefone]").next().hide();
			}	
		}

		//se não houve nenhum erro nos inputs
		if(erro == 0){
			$.ajax({	//envia para página PHP que inserira os dados no banco de dados
				url: "controller/insereContato.php",
				method: "POST",
				data:  { nome: nome, email: email, mensagem: mensagem, telefone: telefone},
				success: function(res){	//contato registrado
					if(res == 1){
						$("#formContato").html("<h4 class='alert alert-success'>Mensagem enviada.</h4>");
					}else{	//contato não registrado
						$("#formContato").html("<h4 class='alert alert-danger'>Mensagem não pode ser enviada.</h4>");
					}
				}
			});		
		}
	});	
});