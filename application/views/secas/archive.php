<div class="content">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal007">
			Nouvelle Archive
			</button>
            <div class="container-fluid">
                <div class="row">
				<div class="container">
					<form  method="post" action="<?= site_url('Welcome/afficherArchive');?>">
						<h3>Rechercher</h3>
						<div class="row">
							<div class="col-md-1">
								<select name="date" style="">
									
									<?php foreach($dates as $d){ 
                                        if ($d->anneeDocument!="") {
                                            ?>

										<option value="<?= $d->anneeDocument; ?>" ><?= $d->anneeDocument; ?></option>
									<?php
                                        } }?>
								</select>
							</div>
							
							<div class=" col-md-3 mb-3">
								<input type="submit"   value="Voir Documents">
							</div> 
							</div>
					</form> 
				</div>
				</div>
			</div>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste Documents</h4>
                                <p class="category"></p>
                            </div>
							<div class="container-fluid">
								<div class="row">
									
									<?php $i=0; foreach($documents as $doc){
										
										?>
										<div class="col-md-3 ">

											<div class="card gradient-card">

												<div class="card-image" >

												<!-- Content -->
														<a data-toggle="modal" data-target="#modalCookie1<?= $doc->idDocument ?>" href="">
															<div class="text-white d-flex h-100 mask blue-gradient-rgba">
															<div class="first-content align-self-center p-3">
																<h3 class="card-title"><?= $doc->titreDocument ?></h3>
																<p class="lead mb-0"><?= $doc->dateDocument ?></p>
																									
															</div>
															<div class="second-content align-self-center mx-auto text-center">
																<i class="far fa-money-bill-alt fa-3x"></i>
															</div>
															</div>
														</a>

												</div>
											</div>
										</div>
																
														
													



										<div class="modal fade right" id="modalCookie1<?= $doc->idDocument ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-left:30%">
											<div class="modal-dialog modal-lg modal-top-right" role="document">
												<div class="modal-content">
												
												<div class="modal-body">
													<h4>Details Du Document</h4>
													<div class="row">
													<div class="col-lg-6">
														<!--Carousel Wrapper-->
														
																
															<img class="" src="<?= base_url('assets/img/documents/'.$doc->anneeDocument."/".$doc->imgDocument);?>"
																style="max-width:100%"alt="First slide">
															
														<!--/.Carousel Wrapper-->
													</div>
													<div class="col-lg-6">
														<h2 class="h2-responsive product-name">
														<strong> Titre: <?= $doc->titreDocument ?> </strong>
														</h2>
														<h4 class="h4-responsive">
														<span class="green-text">
															<strong>Type : <?= $doc->typeDocument ?></strong>
														</span>
														<span class="grey-text"> Du: 
															<small>
															<?= $doc->dateDocument ?>
															</small>
														</span>
														</h4>
														<h4>Description: </h4>
														<p><?= $doc->descDocument ?></p>
													</div>
													</div>
												</div>
												</div>
											</div>
										</div>





									<?php }?>

								</div>
                        	</div>
                    	</div>
					</div>
				</div>









		<div class="modal fade" id="basicExampleModal007" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

								<div class="col-lg-12 col-md-12">
									<div class="card">
										<div class="header">
											<h4 class="title">Nouvelle Archive de document </h4>
										</div>
										<div class="content">
											<form method="post" action="<?= site_url('Welcome/newArchive')?>" enctype="multipart/form-data">
												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Titre document</label>
															<input type="text" class="form-control border-input" placeholder="Titre" name="titre" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Type</label>
															<select id="inputState" class="form-control" name="type">
										
																<option value="Rente de survie">Rente de survie</option>
																<option value="Attestration de prise en charge">Attestation de prise en charge</option>
																
															
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-12">
														<div class="form-group">
															<label>Description</label>
															<input type="text" class="form-control border-input" placeholder="Decription" name="desc" required>
														</div>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label>Date</label>
															<input type="date" class="form-control border-input" placeholder="Date" name="date" value="<?= date('d-m-Y')?>" required>
														
														</div>
													</div>
													<input type="hidden" class="form-control border-input" placeholder="Date" name="annee" value="<?= date('Y')?>" required>
														
													<div class="col-md-6">
														<div class="form-group">
															<label>Fichier</label>
															<input type="file" class="form-control border-input" placeholder="fichier" name="doc" required>
														</div>
													</div>
													
												</div>

												<div class="text-center">
													<input type="submit" class="btn btn-info btn-fill btn-wd" value="Suivant"/>
												</div>
												<div class="clearfix"></div>
											</form>
										</div>
									</div>
								</div>
						</div>
					
				</div>
			</div>
		</div>

</div>         

