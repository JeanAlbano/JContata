<!DOCTYPE html>
<html lang="pt-br" class="no-js">
    
    <!-- Cabecalho -->
    <?php include_once 'elementos/cabecalho.html'; ?>
	<!-- Cabecalho -->

    <body>

		<!-- Slides -->
	    <?php include_once 'elementos/slides.html'; ?>
		<!-- Slides -->

		<!-- Formulário de contato -->
		<div class="container-fluid">
			<div class="col-md-6 col-md-offset-3">

				<h1 class="text-center">Fale conosco</h1>

				<form id="formContato">
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="Nome*: escreva seu nome" name="nome" maxlength="95" required oninvalid="this.setCustomValidity('Informe seu nome completo!')" onchange="this.setCustomValidity('')">
							<div class="help-block"></div>
						</div>
					</div>
					
					<div class="form-group">	
						<div class="col-md-12">
							<input type="email" class="form-control" placeholder="Email*: contato@cliente.com.br" name="email" maxlength="45" required oninvalid="this.setCustomValidity('Informe um e-mail válido!')" onchange="this.setCustomValidity('')">
							<div class="help-block"></div>
						</div>
					</div>

					<div class="form-group">	
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="Telefone: (48) 3432-0029" name="telefone" maxlength="15">
							<div class="help-block"></div>
						</div>				
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<textarea type="text" class="form-control" placeholder="Mensagem*: escreva sua mensagem" name="mensagem" maxlength="500" required oninvalid="this.setCustomValidity('Informe sua mensagem!')" onchange="this.setCustomValidity('')"></textarea>
							<div class="help-block"></div>
						</div>
					</div>

					<p>Campos com * são obrigatórios.</p>

					<div class="form-group">	
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-enviar">Enviar</button>
						</div>
					</div>
				</form>

			</div>	
		</div>
		<!-- Formulário de contato -->
		
		
		<!-- Rodape -->
		<?php include_once 'elementos/rodape.html'; ?>
		<!-- Rodape -->

	</body>
</html>