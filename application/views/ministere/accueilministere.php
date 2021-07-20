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

 
		<div class="row">
                    
					<div class="col-lg-12 col-md-7">
						<h4 style="text-align:center">TABLEAU DE BORD</h4>
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
																<?= $budjet->montant?>Fc
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
					
		<div class="row">
                    
					<div class="col-lg-6 col-md-7">
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
					<div class="col-lg-6 col-md-7">
						<div class="card">
							<div class="header">
								<h4 class="title">Statistique Annuel Prise en Charge
							</h4>
							</div>
							<div class="content">
							 
								<div class="progress">
									
									<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="212" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
		</div>
