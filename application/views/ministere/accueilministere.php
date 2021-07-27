<div class="row">
<div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Nouvelle Budjet Année <?= date('Y')?>
                    </h4>
                    </div>
                    <div class="content">
                        <form method="post" action="<?= site_url('Welcome/newBidjet')?>">
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Montant</label>
                                        <input type="number" class="form-control border-input" placeholder="Company" value="" name="montant">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Année</label>
                                        <input type="text" class="form-control border-input"  placeholder="" value="<?=date('Y')?>" name="annee">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="Submit" class="btn" class="btn btn-primary btn-lg"
                                        value="Alouer">
                                    </div>
                                </div>
                            </div>
                        </form>
						
                    </div>
                </div>
				</div>
</div>



<input type="hidden" name="annee" value="annee"/>






                        
		
                    
					<div class="col-lg-12 col-md-7">
						<h4 style="text-align:center">TABLEAU DE BORD</h4>
					</div>
					<div class="row" style="padding:20px;">
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="content">
										<div class="row">
											<div class="col-xs-5">
												<div class="icon-big icon-warning text-center">
													<i class="ti-server"></i>
												</div>
											</div>
											<div class="col-xs-7">
												<div class="numbers">
													<p>Attestations Validées</p>
													<?= $attestv?>
												</div>
											</div>
										</div>
										<div class="footer">
											<hr>
											<div class="stats">
												<i class="ti-reload"></i> Updated now
											</div>
										</div>
									</div>
								</div>
							</div><div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="content">
										<div class="row">
											<div class="col-xs-5">
											
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    
											</div>
											<div class="col-xs-7">
												<div class="numbers">
													<p>Attestations En Cours</p>
													<?= $attests?>
												</div>
											</div>
										</div>
										<div class="footer">
											<hr>
											<div class="stats">
												<i class="ti-reload"></i> Updated now
											</div>
										</div>
									</div>
								</div>
							</div>
				</div>
						<div class="row" style="padding:20px;">
						<?php foreach ($budjets as $budjet){?>  
								
								<div class="col-lg-3 col-md-6">        
									<div class="card">
												<div class="content">
													<div class="row">
														<div class="col-xs-5">
															<div class="icon-big icon-success text-center">
																<i class="ti-wallet"></i>
															</div>
														</div>
														<div class="col-xs-7">
															<div class="numbers">
																<p>Prevision Budjetaire de l'Année <?= $budjet->annee?></p>
																<?= $budjet->montant?>$
															</div>
														</div>
													</div>
													<div class="footer">
														<hr>
														<div class="stats">
															<i class="ti-calendar"></i> <?= $budjet->annee?>
														</div>
													</div>
												</div>
									</div>
								</div>
							
							<?php }?>
						</div>
					
		<div class="row my-3" >
                    
					<div class="col-lg-10 col-md-10 py-3">
						<div class="card">
							<div class="header">
								<h4 class="title">Statistique Attribution Budjet Annuel
							</h4>
							</div>
							<div class="content">
							<?php foreach ($budjets as $budjet){?>
								
							<p><?=$budjet->annee?></p>
								<div class="progress">
									
									<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= ($budjet->montant*100)/100000?>%" aria-valuenow="<?= ($budjet->montant*100)/5000000?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								
								<?php }?>
							</div>
						</div>
					</div>

					
				
		</div>
		