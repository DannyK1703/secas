<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste Attestations En Cours</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        
                                    	<th>Matricule Defunt</th>
                                    	<th>Nom Defunt</th>
										<th>Date</th>
                                    	<th>Actions</th>
                                    </thead>
                                    <tbody>
									
									<?php $i=1; foreach ($rentes as $rente){?>
                                        <tr>
                                        	<td><?=$i?></td>
                                        	<td><?=$rente->Matricule?></td>
                                        	<td><?=$rente->NomMilitaire?></td>
											<td><?=$rente->date?></td>
                                        	<td><a href="<?= site_url('Welcome/voirDetailAttestationMin/'.$rente->idRenteSurvie)?>" class="btn btn-link">Consulter</a>
                                        	<a type="button" href="<?= site_url('Welcome/genererCarte/'.$rente->idRenteSurvie);?>" class="btn btn-danger ">Genenrer Carte Ayant Droit</a></td>
                
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


                </div>
            </div>
        </div>
