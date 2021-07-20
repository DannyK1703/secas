<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste des Utilisateurs</h4>
                                <p class="category">Here is a subtitle for this table</p>
								<a  class="btn btn-success" href="#" data-toggle="modal" data-target="#newUser">Nouvel Utilisateur</a>
                            
							
								
							</div>
							
							
						</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        
										<th>Matricule</th>
                                    	<th>Nom</th>
										<th>Phone</th>
										<th>Type</th>
										<th>Province</th>
										<th>Fonction</th>
										<th>Login</th>
										<th>Mot de passe</th>
                                    	<th>Actions</th>
                                    </thead>
                                    <tbody>
									
									<?php $i=1; foreach ($agents as $agent){?>
                                        <tr>
                                        	
                                        	<td><?= $agent->matriculeAgentSECAS?></td>
											<td><?= $agent->nomUtilisateur?></td>
											<td><?= $agent->phone?></td>
											<td><?= $agent->typeUser?></td>
                                        	<td><?= $agent->provinceAgentSECAS?></td>
											<td>-</td>
											<td><?= $agent->login?></td>
											<td><?= $agent->pwd?></td>
											
                                        	<td>
												<a  class="btn btn-danger" href="#" data-toggle="modal" data-target="#Modifsecas<?= $agent->idUtilisateur?>">Modifier</a>
												</td>
                                        	</tr>
										
										<div class="modal fade" id="Modifsecas<?= $agent->idUtilisateur;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                			<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Modifier Agent SECAS</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body" >
												

												<form method="post" action="<?= site_url("Welcome/updateUser/".$agent->idUtilisateur);?>">


															<div class="row">
																<div class="col-md-8">
																	<div class="form-group">
																		<label>nom</label>
																		<input type="texte" class="form-control border-input" placeholder="" value="<?= $agent->nomUtilisateur?>" name="nom">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>phone</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->phone?>" name="phone">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Matricule</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->matriculeAgentSECAS?>" name="matricule">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Type</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->typeUser?>" name="type" readonly>
																	
																	</div>
																</div>
															</div>
															<div class="row">
																
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Province</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->provinceAgentSECAS?>" name="prov">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Login</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->login?>" name="login">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Mot de passe</label>
																		<input type="text" class="form-control border-input"  placeholder="" value="<?= $agent->pwd?>" name="pwd">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		
																		<input type="Submit" class="btn" class="btn btn-primary btn-lg"
																		value="Valider">
																	</div>
																</div>
															</div>
												</form>



												</div>
												
												</div>
											</div>
										</div>


										
                                        
										<?php $i++;}?>
										<?php $i=1; foreach ($mins as $min){?>
                                        <tr>
                                        	
                                        	
                                        	<td><?=$min->matriculeAgentMin?></td>
											<td><?=$min->nomUtilisateur?></td>
											<td><?=$min->phone?></td>
											<td><?=$min->typeUser?></td>
											<td>-</td>
                                        	<td><?=$min->fonctionAgentMin?></td>
											
											<td><?=$min->login?></td>
											<td><?=$min->pwd?></td>
                                        	<td>
												<a  class="btn btn-danger" href="#" data-toggle="modal" data-target="#Modifmin<?=$min->idUtilisateur?>">Modifier</a>
												</td>
											</tr>
											
										<div class="modal fade" id="Modifmin<?= $min->idUtilisateur;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                			<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Modifier Agent Ministere </h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body" >
												


												<form method="post" action="<?= site_url("Welcome/updateUser/".$min->idUtilisateur);?>">


													<div class="row">
														<div class="col-md-8">
															<div class="form-group">
																<label>nom</label>
																<input type="texte" class="form-control border-input" placeholder="" value="<?= $min->nomUtilisateur?>" name="nom">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>phone</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->phone?>" name="phone">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Matricule</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->matriculeAgentMin?>" name="matricule">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Type</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->typeUser?>" name="type" readonly>
															
															</div>
														</div>
													</div>
													<div class="row">
														
														<div class="col-md-4">
															<div class="form-group">
																<label>Fonction</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->fonctionAgentMin?>" name="fonction">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Login</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->login?>" name="login">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Mot de passe</label>
																<input type="text" class="form-control border-input"  placeholder="" value="<?= $min->pwd?>" name="pwd">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																
																<input type="Submit" class="btn" class="btn btn-primary btn-lg"
																value="Valider">
															</div>
														</div>
													</div>
												</form>



												</div>
												
												</div>
											</div>
										</div>


									
											
										
                                        	
                                        
										<?php $i++;}?>
										<?php $i=1; foreach ($notaires as $notaire){?>
                                        <tr>
										
                                        	<td><?=$notaire->matriculeNotaire?></td>
											<td><?=$notaire->nomUtilisateur?></td>
											<td><?=$notaire->phone?></td>
											<td><?=$notaire->typeUser?></td>
                                        	<td><?=$notaire->provinceNotaire?></td>
											<td>-</td>
											<td><?=$notaire->login?></td>
											<td><?=$notaire->pwd?></td>
											
                                        	<td>
												<a  class="btn btn-danger" href="#" data-toggle="modal" data-target="#Modifnotaire<?= $notaire->idUtilisateur?>">Modifier</a>
												</td>

										<div class="modal fade" id="Modifnotaire<?= $notaire->idUtilisateur;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                			<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Modifier Notaire</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body" >
												

												<form method="post" action="<?= site_url("Welcome/updateUser/".$notaire->idUtilisateur);?>">


														<div class="row">
															<div class="col-md-8">
																<div class="form-group">
																	<label>nom</label>
																	<input type="texte" class="form-control border-input" placeholder="" value="<?= $notaire->nomUtilisateur?>" name="nom">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>phone</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->phone?>" name="phone">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Matricule</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->matriculeNotaire?>" name="matricule">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Type</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->typeUser?>" name="type" readonly>
																
																</div>
															</div>
														</div>
														<div class="row">
															
															<div class="col-md-4">
																<div class="form-group">
																	<label>Province</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->provinceNotaire?>" name="prov">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>Login</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->login?>" name="login">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>Mot de passe</label>
																	<input type="text" class="form-control border-input"  placeholder="" value="<?= $notaire->pwd?>" name="pwd">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	
																	<input type="Submit" class="btn" class="btn btn-primary btn-lg"
																	value="Valider">
																</div>
															</div>
														</div>
												</form>

												</div>
												
												</div>
											</div>
										</div>
	
                                        </tr>
										<?php $i++;}?>
                                    </tbody>
                                </table>

                            </div>
                    </div>
                </div>


                    

            </div>
</div>
</div>

										
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Nouvel Utilisateur</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body" >
	

	<form method="post" action="<?= site_url("Welcome/newUser");?>">


			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label>nom</label>
						<input type="texte" class="form-control border-input" placeholder="" value="" name="nom">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>phone</label>
						<input type="text" class="form-control border-input"  placeholder="" value="" name="phone">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Matricule</label>
						<input type="text" class="form-control border-input"  placeholder="" value="" name="matricule">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Type</label>
						<select id="inputState" class="form-control" name="type">
	
							<option value="Agent">Agent SECAS</option>
							<option value="Notaire">Notaire</option>
							<option value="Min">Agent Ministère</option>
						
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Fonction</label>
						<input type="text" class="form-control border-input"  placeholder="" value="" name="fonction">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Province</label>
						<input type="text" class="form-control border-input"  placeholder="" value="" name="prov">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						
						<input type="Submit" class="btn" class="btn btn-primary btn-lg"
						value="Creer">
					</div>
				</div>
			</div>
	</form>



	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
	</div>
	</div>
	</div>
</div>





										



											







											






