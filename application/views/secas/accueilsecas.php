<div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nouvelle Rente de Survie/ 
                                Enregistrement Infos Officier </h4>
                            </div>
                            <div class="content">
                                <form method="post" action="<?= site_url('Welcome/newMilitaire')?>">
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Nom" name="nom" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Post Nom" name="pnom" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ville de Residence</label>
                                                <input type="text" class="form-control border-input" placeholder="Ville" name="ville" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Matricule</label>
                                                <input type="text" class="form-control border-input" placeholder="Matricule" name="matricule" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date de Naissance</label>
                                                <input type="date" class="form-control border-input" placeholder="Date Naissance" name="date"required>
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

