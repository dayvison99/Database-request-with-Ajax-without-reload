<div class="wrapper">

	<?php

	#require("../controllers/conexao.php");
	require("../layout/topo.php");
	require("../layout/menu.php");


	?>


  <script src="../templates/ajaxtarefas.js"></script>
	<div id="layoutSidenav_content">
			<main>
					<div class="container-fluid px-4">
							<h1 class="mt-4">Tarefas Cadastradas</h1>
							<ol class="breadcrumb mb-4">

							</ol>

							<div class="card mb-4">
									<div class="card-header">
											<i class="fas fa-table me-1"></i>
									Listar de Tarefas
									</div>
									<div>
										<div class="col-sm-3">
											</div>
								<div class="col-sm-5">
									<a href="#tarefasaddEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Nova Tarefa</span></a>
									<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Excluir Tarefa</span></a>
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
	                        <th>Descrição</th>
													<th>RESPOSÁVEL</th>
	                        <th>Data Criação</th>
													<th>Data Da Tarefa</th>

													<th>AÇÕES</th>
	                    </tr>
	                </thead>
					<tbody>

					<?php
					$result = mysqli_query($con,"SELECT * FROM tarefas");
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
						<td><?php echo $row["descricao"]; ?></td>
						<td><?php echo $row["usuario"]; ?></td>
						<td><?php echo $row["datacriacao"]; ?></td>

						<td><?php echo date('d-m-Y', strtotime($row["datatarefa"])); ?></td>


						<td>
							<a href="#tarefaeditEmployeeModal" class="edit" data-toggle="modal">
								<i class="material-icons update" data-toggle="tooltip"
								data-id="<?php echo $row["id"]; ?>"
								data-descricao="<?php echo $row["descricao"]; ?>"
								data-datacriacao="<?php echo $row["datacriacao"]; ?>"
								data-usuario="<?php echo $row["usuario"]; ?>"
								data-datatarefa="<?php echo $row["datatarefa"]; ?>"
								title="Edit"></i>
								<?php $_SESSION['UserID'] = $row["usuario"] ;  ?>
							</a>
							<a href="#tarefasdeleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
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
		<div id="tarefasaddEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="user_form">
						<div class="modal-header">
							<h4 class="modal-title">INSERIR TAREFAS</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Descrição</label>
    							<textarea class="form-control" id="descricao" name="descricao" maxlength="200"  rows="5" cols="2" required></textarea>
							</div>
							<div class="form-group">

								<label for="exampleFormControlSelect1">USUÁRIO RESPOSÁVEL</label>
								<select class="form-control" id="usuario" name="usuario" required>
													<option disabled selected></option>
										<?php
														$data_tarefa = date("d-m-Y");
														date('d-m-Y', strtotime('NOW()'));
														$dataalteracao =date("Y-m-d");

														$query = $con->query("SELECT * FROM user");
														while($reg = $query->fetch_array())
													{
															echo '<option value="'.$reg["nome"].'">'.$reg["nome"].'</option>';

													}
										?>
									</select>
							</div>
							<div class="form-group">
								<label>DATA DE ENTREGA</label>
								<input type="date" id="datai" name="datai"  class="form-control" min="<?php echo $dataalteracao; ?>" required  value="<?php echo $dataalteracao; ?>" ></td>
							</div>
							</div>
						<div class="modal-footer">
						    <input type="hidden" value="1" name="type">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="button" class="btn btn-success" id="btn-add">INSERIR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="tarefaeditEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="update_form">
						<div class="modal-header">
							<h4 class="modal-title">ALTERAR TAREFA</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_u" name="id" class="form-control" required>
							<div class="form-group">
								<label>DESCRIÇÃO</label>
								<textarea class="form-control" id="descricao_u" name="descricao"  rows="4" required></textarea>
							</div>
							<div class="form-group">

								<label for="exampleFormControlSelect1">USUÁRIO RESPONSÁVEL</label>
								<select class="form-control" id="usuario_u" name="usuario" required>

										<?php
														$data_tarefa = date("d-m-Y");
														date('d-m-Y', strtotime('NOW()'));
														$dataalteracao =date("Y-m-d");

														$query = $con->query("SELECT * FROM user");
														while($reg = $query->fetch_array())
													{
															echo '<option value="'.$reg["nome"].'">'.$reg["nome"].'</option>';

													}
										?>
									</select>

							</div>
							<div class="form-group">
								<label>DATA DE ENTREGA</label>
								<input type="date" id="datatarefa_u" name="datai"  class="form-control" min="<?php echo $dataalteracao; ?>" required  value="<?php echo $dataalteracao; ?>" ></td>
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
		<div id="tarefasdeleteEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>

						<div class="modal-header">
							<h4 class="modal-title">EXCLUIR</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id_d" name="id" class="form-control">
							<p>DESEJA REALMENTE EXCLUIR ESSA TAREFA ?</p>
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


	<!-- /.content-wrapper -->

	<?php require("../layout/rodape.php"); ?>

</div>
<!-- ./wrapper -->
