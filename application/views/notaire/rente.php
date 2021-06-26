<div class="content">
<a class="btn btn-primary" href="#" style="margin-left:80%;" onClick="imprimer('rapport_commande')">Imprimer</a>
    
    
            <div class="container-fluid">
			
                <div id="document">
                <div class="row" id="rapport_commande">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">REPUBLIQUE DEMOCRATIQUE DU CONGO</h4> 
                                <h4 class="title">PROVINCE DU HAUT-KATANGA</h4> 
                                <h4 class="title">VILLE DE LUBUMBASHI</h4> <br/>

                               <div style="text-align:right"> <h4 class="title" >  Defunt :<?=$militaire->NomMilitaire?><br/>Matricule:<?=$militaire->Matricule?><h4>
                                <br/><br/><br/></div>
                                
                            </div>
                            <u><h5 style="text-align:center"><b>Rente de Survie</b></h5></u>
                            <div class="content table-responsive table-full-width">
                               <div class="container"> <p>Nous membre de la famille de l'officier <?=$militaire->NomMilitaire?> reconnaissons avons fournis les informations suivantes conformement au P.V du conseil de fammille en rapport avec la prise en charge de la famille du defunt :
                                </p></div>
								<div class="container">
                                <table class="table table-striped">
                                    <thead>
                                        
                                    	
                                    </thead>
                                    <tbody>
                                        <tr><th>Ayant Droit</th></tr>
                                        <tr><td>0</td>
										<td><?= $liquid->nomMembre?></td><td><?=$liquid->parente?></td>
                                        	
                                        	
                                        </tr>
                                        <tr><th>Liste des Membres de famille a prendre en charge</th></tr>
										<?php $i=1;foreach ($membres as $membre){?>
                                        <tr>
											
                                        	<td><?= $i?></td>
                                        	<td><?=$membre->nomMembre?></td>
                                        	<td><?=$membre->parente?></td>
                                        	
                                        </tr>
                                    <?php $i++;}?>
                                        
                                    </tbody>
                                </table></div>
                                <div class="header">
                                    <div style="text-align:right;">
                                    <p> Fait a Lubumbashi le <?= date("d-m-Y")?><br/>Agent: <?=$agent->nomUtilisateur?><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p>
                                    </div>
                                
                            
                        </div>
                    </div>


                </div>
                
                <div class="row">
                    <a type="button" href="<?= site_url('Welcome/validerRente/'.$id);?>" class="btn btn-default btn-block">Valider et Generer Attestation</a><br/><br/><br/>
                    
                </div>
            </div>
            </div>
        </div>
