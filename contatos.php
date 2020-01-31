<!DOCTYPE html>
<html lang="pt-br" class="no-js">

    <!-- Cabecalho -->
    <?php include_once 'elementos/cabecalho.html'; ?>
	<!-- Cabecalho -->
	 
    <body>

		<div class="container-fluid">
			<div class="col-md-6 col-md-offset-3">
				<div id="listaContatos">

					<h2 class="text-center">Contatos cadastrados</h2>
					
					<div class="row">
						<div class="col-md-12">
							<a href="index.php" class="btn btn-info right">
								<p class="text-center">Voltar a página inicial</p>
							</a>
						</div>
					</div>
					

					<?php

						include "config/conexao.php";
						
						$query = "SELECT * FROM contato ORDER BY nomecontato";	//recebendo todos os contatos e ordenando-os pelo nome
						$result = mysqli_query($con, $query);
						if($result->num_rows){	//se existem contatos
							echo "<ul id='listaUsuarios'>";
							while($row = mysqli_fetch_assoc($result)){	//percorrendo todos os contatos cadastrados
								$id = $row['idcontato'];
								$nome = $row['nomecontato'];
								$email = $row['emailcontato'];
								$telefone = $row['telefonecontato'];
								$mensagem = $row['mensagemcontato'];

								//listando todos os atributos do contato
								echo "<li>Id: $id</li>
									  <li>Nome: $nome</li>
									  <li>Email: $email</li>
									  <li>Telefone: $telefone</li>
									  <li>Mensagem: $mensagem</li>
									  <hr>";
							}
							echo "</ul>";
						}else{	//não existem contato cadastrados ainda
							echo "Nenhum contato cadastrado.";
						}

					?>
					
				</div>

			</div>	
		</div>

		<!-- Rodape -->
		<?php include_once 'elementos/rodape.html'; ?>
		<!-- Rodape -->

    </body>
</html>