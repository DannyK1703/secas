


    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nouvelle Rente de Survie/ 
                                Enregistrement Infos Famille:<br/> Militaire: <?= $this->session->nomMilitaire?> <br/>Matricule:<?= $this->session->matriculeMilitaire?></h4>
                            </div>
                            <div class="content">
                                <form method="post" action="<?= site_url('Welcome/addMembre')?>">
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Nom" name="nom"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="hidden" name="idmilit" value="<?= $this->session->idMilitaire?>">
                                                <input type="text" class="form-control border-input" placeholder="PostNom" name="pnom" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Date Naissance</label>
                                                <input type="date" class="form-control border-input" placeholder="Date de Naissance" name="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
											<?php $a=$this->session->idAgentSECAS;?>
					
                                                <label>Parenté</label>
                                                <input type="text" class="form-control border-input" placeholder="Parenté" name="parente" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Ajouter"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
					<?php $a=$this->session->id;?>
					<form method="post" action=" <?= site_url('Welcome/NewRente');?>">
					<div class="form-group col-md-4">
					<label for="inputState">Liquidateur</label>
					<select id="inputState" class="form-control" name="liquid">
									
					<?php foreach($membre as $mbr){?>
						<option value="<?= $mbr->idMembre;?>"><?= $mbr->nomMembre;?></option>
					<?php }?>
					</select>
					</div>
					<div class="form-group col-md-4">
						<input  type="submit" class="btn btn-info btn-sm" value='Terminer'/>
					</div>
					</form>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Striped Table </h4>
                                            <p class="category">Here is a subtitle for this table</p>
                                        </div>
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-striped">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Date Naissance</th>
                                                    <th>Parenté</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;foreach($membre as $mbr){?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?= $mbr->nomMembre?></td>
                                                        <td><?= $mbr->dateNMembre?></td>
                                                        <td><?= $mbr->parente?></td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#SuppModal<?=$i?>">
                                                            Supprimer</button>

<!-- Modal -->
                                                        <div class="modal fade" id="SuppModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Voule-vous vraiment supprimer <?= $mbr->nomMembre?> ? 
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= site_url('Welcomme/SuppMembre/'.$mbr->idMembre.'/'.$this->session->idMilitaire)?>" type="button" class="btn btn-primary">Supprimer</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>




                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifModal<?=$i?>">
                                                            Modifier</button></td>
                                    

<!-- Modal -->
                                                        <div class="modal fade" id="modifModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifier Infos Membres:</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form method="post" action="<?= site_url('Welcome/ModifMembre')?>">
                                                                                            

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input type="text" class="form-control border-input" value="<?= $mbr->nomMembre?>" placeholder="Nom" name="nom"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input type="hidden" name="idmilit" value="<?= $this->session->idMilitaire?>">
                                                                                <input type="text" class="form-control border-input" value="<?= $mbr->nomMembre?>"placeholder="PostNom" name="pnom" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Date Naissance</label>
                                                                                <input type="date" class="form-control border-input" placeholder="Date de Naissance" name="date" value="<?php echo $mbr->dateNMembre?>"required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Parenté</label>
                                                                                <input type="text" class="form-control border-input" <?= $mbr->parente?> placeholder="Parenté" name="parente" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <div class="text-center">
                                                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Ajouter"/>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    
                                                    
                                                    
                                                    </tr>
                                                    <?php
													 $i++;}?>
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div>
                               

                </div>
            </div>
        </div>

