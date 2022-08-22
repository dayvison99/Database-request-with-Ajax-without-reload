<div class="wrapper">

	<?php

	#require("../controllers/conexao.php");
	require("../layout/topo.php");
	require("../layout/menu.php");


	?>

  <script src="../templates/ajax.js"></script>
	<div id="layoutSidenav_content">
			<main>
					<div class="container-fluid px-4">
							<h1 class="mt-4">Usuários Cadastrados</h1>
							<ol class="breadcrumb mb-4">

							</ol>

							<div class="card mb-4">
									<div class="card-header">
											<i class="fas fa-table me-1"></i>
									Listar de Usuários
									</div>
									<div>
										<div class="col-sm-3">
											</div>
								<div class="col-sm-5">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Novo Usuário</span></a>
							<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Excluir Usuário</span></a>
						</div>

	                </div>
	            </div>
	            <table class="table table-striped table-hover">
	                <thead>
	                    <tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							
													<th>ID</th>
	                        <th>NOME</th>
	                        <th>EMAIL</th>
													<th>USUÁRIO</th>

													<th>AÇÕES</th>
	                    </tr>
	                </thead>
					<tbody>

					<?php
					$result = mysqli_query($con,"SELECT * FROM user");
					 $i=1;
						while($row = mysqli_fetch_array($result)) {
					?>
					<tr id="<?php echo $row["id"]; ?>">
					<td>
								<span class="custom-checkbox">
									<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
									<label for="checkbox2"></label>
								</span>
							</td>

						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["nome"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["usuario"]; ?></td>


						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons update" data-toggle="tooltip"
								data-id="<?php echo $row["id"]; ?>"
								data-name="<?php echo $row["nome"]; ?>"
								data-email="<?php echo $row["email"]; ?>"
								data-usuario="<?php echo $row["usuario"]; ?>"
								data-senha="<?php echo $row["senha"]; ?>"
								title="Edit"></i>
							</a>
							<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
							 title="Delete"></i></a>
	                    </td>
					</tr>
					<?php
					$i++;
					}
					?>
					</tbody>
				</table>

	        </div>
	    </div>

		<!-- Add Modal HTML -->
		<div id="addEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="user_form" >
						<div class="modal-header">
							<h4 class="modal-title">INSERIR USUÁRIOS</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>NOME</label>
								<input type="text" id="name" name="name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" id="email" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>USUÁRIO</label>
								<input type="usuario" id="usuario" name="usuario" class="form-control" required>
							</div>
							<div class="form-group">
								<label>SENHA</label>
								<input type="password" id="senha" name="senha" class="form-control" required>
							</div>
							</div>
						<div class="modal-footer">
						    <input type="hidden" value="1" name="type">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="button" class="btn btn-success" id="btn-add" onClick="validarSenha()">INSERIR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</form>
		<!-- Edit Modal HTML -->
		<div id="editEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="update_form">
						<div class="modal-header">
							<h4 class="modal-title">ALTERAR USUÁRIO</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_u" name="id" class="form-control" required>
							<div class="form-group">
								<label>NOME</label>
								<input type="text" id="name_u" name="name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" id="email_u" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>USUÁRIO</label>
								<input type="usuario" id="usuario_u" name="usuario" class="form-control" required>
							</div>
							<div class="form-group">
								<label>SENHA</label>
								<input type="password" id="senha_u" name="senha" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
						<input type="hidden" value="2" name="type">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="button" class="btn btn-info" id="update">ALTERAR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<div id="deleteEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>

						<div class="modal-header">
							<h4 class="modal-title">EXCLUIR</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_d" name="id" class="form-control">
							<p>DESEJA REALMENTE EXCLUIR ESSE USUÁRIO??</p>
							<p class="text-warning"><small>Ação não poderár se desfeita.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="button" class="btn btn-danger" id="delete">EXCLUIR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>




	<?php require("../layout/rodape.php"); ?>

</div>
<!-- ./wrapper -->
