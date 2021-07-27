<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->accueil();
	}
	public function accueil(){
		$this->load->view('index');
	}
	public function deconnexion(){
        session_destroy();
        redirect('Welcome/accueil');
    }
	public function connexion()
	{
		$login=$this->input->post('login');
		$pwd=$this->input->post('pwd');
		$data=array('login' =>$login, 'pwd' =>$pwd);
		$this->load->model('utilisateur');
		
		$res=$this->utilisateur->AuthUser($data);
		
		if($res==1)
		{
			$logi=array('login'=>$login);
		
			$data=$this->utilisateur->getUser($logi);

			$user=$data[0];
			//$info=array();
			if($user->typeUser=='Agent'){
				$id=array('Utilisateur_idUtilisateur'=>$user->idUtilisateur);
				$this->load->model('utilisateur');
				$agent=$this->utilisateur->getAgentSecas($id);
				$mat=$agent->matriculeAgentSECAS;
				$prov=$agent->provinceAgentSECAS;
				$info=array('idag'=>$agent->idAgentSECAS,'id'=>$user->idUtilisateur,'matricule'=>$mat,'province'=>$prov,'typeUser'=>$user->typeUser, 
				'nom'=>$user->nomUtilisateur, 'login'=>$login,'phone'=>$user->phone);
				$this->session->set_userdata($info);
				$this->accueilAgent();
			}
			else if($user->typeUser=='Notaire'){
				$id=array('Utilisateur_idUtilisateur'=>$user->idUtilisateur);
				$agent=$this->utilisateur->getNotaire($id);
				$mat=$agent->matriculeNotaire;
				$prov=$agent->provinceNotaire;
					
				$info=array('id'=>$user->idUtilisateur,'matricule'=>$mat,'province'=>$prov,'typeUser'=>$user->typeUser, 
				'nom'=>$user->nomUtilisateur, 'login'=>$login,'phone'=>$user->phone);
				$this->session->set_userdata($info);
				$this->accuielNotaire();
			}
			else if($user->typeUser=='Min'){
				$id=array('Utilisateur_idUtilisateur'=>$user->idUtilisateur);
				$agent=$this->utilisateur->getAgentmin($id);
				$mat=$agent->matriculeAgentMin;
				
				$info=array('id'=>$user->idUtilisateur, 'matricule'=>$mat, 'fonction'=>$agent->fonctionAgentMin,'nom'=>$user->nomUtilisateur, 'login'=>$login,'phone'=>$user->phone);
				$this->session->set_userdata($info);
				$this->accueilMin();
			}else if($user->typeUser=='Admin'){
				$id=array('Utilisateur_idUtilisateur'=>$user->idUtilisateur);
				$agent=$this->utilisateur->getAdmin($id);
				$mat=$agent->matriculeAdmin;
				
				$info=array('id'=>$user->idUtilisateur, 'matricule'=>$mat, 'nom'=>$user->nomUtilisateur, 'login'=>$login,'phone'=>$user->phone);
				$this->session->set_userdata($info);
				$this->accueilAdmin();
			}
			
			$this->session->set_userdata($info);
		
	
		}
		else{
			echo('erreur');
			$this->index();
		}
	}
	public function afficherArchive(){
		$a=$this->input->post('date');
		$this->listeDocument($a);
	}
	public function listeDocument($dat){
		$b['a']=3;
		$this->load->model('utilisateur');
		$date=array('anneeDocument'=>$dat);
		$data['documents']=$this->utilisateur->getDocuments($date);
		$data['dates']=$this->utilisateur->getAnnes();
		$this->load->view('secas/head',$b);
		$this->load->view('secas/archive',$data);
		$this->load->view('secas/footer');
	}
	public function fetch_data(){
		$this->load->model('utilisateur');
		$data=$this->utilisateur->getBugets();
		
		echo json_encode($data);
	}
	public function accueilMin()
	{
		$this->load->model('utilisateur');
		$b['a']=1;
		$data['budjets']=$this->utilisateur->getBugets();
		$data['attests']=$this->utilisateur->getNbrAttest(['etat'=>0]);
		$data['attestv']=$this->utilisateur->getNbrAttest(['etat'=>1]);
		$this->load->view('ministere/head',$b);
		$this->load->view('ministere/accueilministere',$data);
		$this->load->view('ministere/footer');
	}
	public function accueilAdmin(){
		$this->load->model('utilisateur');
		$b['a']=1;
		$data['agents']=$this->utilisateur->getInfosAgentSecas();
		$data['mins']=$this->utilisateur->getInfosAgentmin();
		$data['notaires']=$this->utilisateur->getInfosNotaire();
		$this->load->view('admin/head',$b);
		$this->load->view('admin/accueilAdmin',$data);
		$this->load->view('admin/footer');
	}
	public function attestationsMin(){
		$this->load->model('utilisateur');
		$d=$this->utilisateur->getAttestationMin();
		$data['rentes']=[];
		foreach($d as $r){
			$data['rentes']=$data['rentes']+$this->utilisateur->getInfosRente(array('idRenteSurvie'=>$r->RenteSurvie_idRenteSurvie));
		}
		$this->load->model('utilisateur');
		$b['a']=2;
		$this->load->view('ministere/head',$b);
		$this->load->view('ministere/attestencours',$data);
		$this->load->view('ministere/footer');
	}
	public function genererCarte($id){
		$this->load->model('utilisateur');
		$this->utilisateur->updateAttestation($id,array('etat'=>1));
		$this->attestationsMin();
	}
	public function newBidjet(){
		$mont=$this->input->post('montant');
		$annee=$this->input->post('annee');
		
		$this->load->model('utilisateur');
		$agent=$this->utilisateur->getAgentmin(array('Utilisateur_idUtilisateur'=>$this->session->id));
		
		$rpr=array('periode'=>$annee,'destinataire'=>'SECAS','AgentMin_idAgentMin'=>$agent->idAgentMin);
		$id=$this->utilisateur->newRapport($rpr);
		$data=array('montant'=>$mont,'Rapport_idRapport'=>$id,'annee'=>$annee);
		$this->utilisateur->newBidjet($data);
		$this->accueilMin();

	}
	public function accueilAgent(){
		$b['a']=1;
		$this->load->view('secas/head',$b);
		$this->load->view('secas/accueilsecas');
		$this->load->view('secas/footer');
	}
	public function listeRentes(){
		$this->load->model('utilisateur');
		$data['rentes']=$this->utilisateur->getRentes();
		$b['a']=2;
		$this->load->view('secas/head',$b);
		$this->load->view('secas/listeRente',$data);
		$this->load->view('secas/footer');
	}
	public function consultRente($id){
		$this->load->model('utilisateur');
		$infos=$this->utilisateur->getInfoRente(array('idRenteSurvie'=>$id));
		$data['membres']=$this->utilisateur->getMembre(array('Militaire_idMilitaire'=>$infos->idMilitaire));
		$n=$this->utilisateur->getMilitaire(array('idMilitaire'=>$infos->idMilitaire));
		$data['militaire']=$n[0];
		$data['agent']=$this->utilisateur->getAgent(array('idAgentSECAS'=>$infos->idAgentSECAS));
		$a=$this->utilisateur->getMembre(array('idMembre'=>$infos->liquidateur));
		$data['liquid']=$a[0];
		$data['dates']= array('date'=>$infos->date);
		$b['a']=2;
		$this->load->view('secas/head',$b);
		$this->load->view('secas/rente',$data);
		$this->load->view('secas/footer');
	}
	public function voirDetailRente($id){
		$this->load->model('utilisateur');
		$infos=$this->utilisateur->getInfoRente(array('idRenteSurvie'=>$id));
		$data['membres']=$this->utilisateur->getMembre(array('Militaire_idMilitaire'=>$infos->idMilitaire));
		$n=$this->utilisateur->getMilitaire(array('idMilitaire'=>$infos->idMilitaire));
		$data['militaire']=$n[0];
		$data['id']=$id;
		$data['agent']=$this->utilisateur->getAgent(array('idAgentSECAS'=>$infos->idAgentSECAS));
		$a=$this->utilisateur->getMembre(array('idMembre'=>$infos->liquidateur));
		$data['liquid']=$a[0];
		$b['a']=2;
		$this->load->view('notaire/head',$b);
		$this->load->view('notaire/rente',$data);
		$this->load->view('notaire/footer');
	}
	public function voirDetailAttestation($id){
		$this->load->model('utilisateur');
		$infos=$this->utilisateur->getInfosRente(array('idRenteSurvie'=>$id))[0];
		echo $infos->idMilitaire;
		$data['membres']=$this->utilisateur->getMembre(array('Militaire_idMilitaire'=>$infos->idMilitaire));
		$n=$this->utilisateur->getMilitaire(array('idMilitaire'=>$infos->idMilitaire));
		$data['militaire']=$n[0];
		$data['id']=$id;
		$i=$this->utilisateur->getNotaireId(array('Utilisateur_idUtilisateur'=>$this->session->id));
		$data['dates']= array('date'=>$infos->date,'dateValidation'=>$infos->dateValidation);
		$data['agent']=$this->utilisateur->getAgent(array('idAgentSECAS'=>$infos->idAgentSECAS));
		$data['notaire']=$this->utilisateur->getNotaire(array('idNotaire'=>$i->idNotaire));
		$a=$this->utilisateur->getMembre(array('idMembre'=>$infos->liquidateur));
		$data['liquid']=$a[0];
		$b['a']=1;
		$this->load->view('notaire/head',$b);
		$this->load->view('notaire/attestation',$data);
		$this->load->view('notaire/footer');
	}
	public function voirDetailAttestationMin($id){
		$this->load->model('utilisateur');
		$infos=$this->utilisateur->getInfosRente(array('idRenteSurvie'=>$id))[0];
		//echo $infos->idMilitaire;
		$data['membres']=$this->utilisateur->getMembre(array('Militaire_idMilitaire'=>$infos->idMilitaire));
		$n=$this->utilisateur->getMilitaire(array('idMilitaire'=>$infos->idMilitaire));
		$data['militaire']=$n[0];
		$data['id']=$id;
		
		$data['dates']= array('date'=>$infos->date,'dateValidation'=>$infos->dateValidation);
		$data['agent']=$this->utilisateur->getAgent(array('idAgentSECAS'=>$infos->idAgentSECAS));
		
		$a=$this->utilisateur->getMembre(array('idMembre'=>$infos->liquidateur));
		$data['liquid']=$a[0];
		$b['a']=2;
		$this->load->view('ministere/head',$b);
		$this->load->view('ministere/attestation',$data);
		$this->load->view('ministere/footer');
	}
	public function listeCartes(){
		$this->load->model('utilisateur');
		$d=$this->utilisateur->listeCartes();
		$data['rentes']=[];
		foreach($d as $r){
			$data['rentes']=$data['rentes']+$this->utilisateur->getInfosRente(array('idRenteSurvie'=>$r->RenteSurvie_idRenteSurvie));
		}
		$this->load->model('utilisateur');
		$b['a']=3;
		$this->load->view('ministere/head',$b);
		$this->load->view('ministere/listeCartes',$data);
		$this->load->view('ministere/footer');
	}
	public function accuielNotaire()
	{
		$this->load->model('utilisateur');
		$data['rentes']=$this->utilisateur->getRentesEnCours();
		$b['a']=2;
		$this->load->view('notaire/head',$b);
		$this->load->view('notaire/accueilNotaire',$data);
		$this->load->view('notaire/footer');
	}
	public function listeAttestations(){
		$this->load->model('utilisateur');
		$d=$this->utilisateur->listeAttestations();
		$data['rentes']=[];
		foreach($d as $r){
			$data['rentes']=$data['rentes']+$this->utilisateur->getInfosRente(array('idRenteSurvie'=>$r->RenteSurvie_idRenteSurvie));
		}
		
		$b['a']=1;
		$this->load->view('notaire/head',$b);
		$this->load->view('notaire/attestations',$data);
		$this->load->view('notaire/footer');
	}
	public function newMilitaire()
	{
		$name=$this->input->post('nom');
		$pnom=$this->input->post('pnom');
		$date=$this->input->post('date');
		$matricule=$this->input->post('matricule');
		$ville=$this->input->post('ville');
		$nom=$name.' '.$pnom;
		$data=array('NomMilitaire'=>$nom, 'Matricule'=>$matricule,'villeResidance'=>$ville,'dateNaiss'=>$date);
		$this->load->model('utilisateur');
		$id=$this->utilisateur->newMilitaire($data);
		$militaire=array('idMilitaire'=>$id,'matriculeMilitaire'=>$matricule,'nomMilitaire'=>$nom);
		$this->session->set_userdata($militaire);
		$date=array('Militaire_idMilitaire'=>$id,'etat'=>1);
		$mbr['membre']=$this->utilisateur->getMembres($date);
		$this->load->view('secas/head');
		$this->load->view("secas/famille",$mbr);
		$this->load->view('secas/footer');
				
	}
	public function validerRente($id){
		$this->load->model('utilisateur');
		$i=$this->utilisateur->getNotaireId(array('Utilisateur_idUtilisateur'=>$this->session->id));
		
		$data=array('RenteSurvie_idRenteSurvie'=>$id,'Notaire_idNotaire'=>$i->idNotaire,'dateValidation'=>date("d-m-Y"),'etat'=>0);
		$this->utilisateur->newAttestation($data);
		$this->utilisateur->validerRente(array('idRenteSurvie'=>$id));
		$this->accuielNotaire();
	}
	public function addMembre()
	{
		$name=$this->input->post('nom');
		$pnom=$this->input->post('pnom');
		$parente=$this->input->post('parente');
		$date=$this->input->post('date');
		$id=$this->input->post('idmilit');
		$nom = $name.' '.$pnom;
		
		$data=array('nomMembre'=>$nom,'dateNMembre'=>$date,'parente'=>$parente,'Militaire_idMilitaire'=>$id,'etat'=>0);
		
		$this->load->model('utilisateur');
		$this->utilisateur->newMembre($data);
		
		$date=array('Militaire_idMilitaire'=>$id,'etat'=>0);
		$mbr['membre']=$this->utilisateur->getMembres($date);
		$this->load->view('secas/head');
		$this->load->view("secas/famille",$mbr);
		$this->load->view('secas/footer');

	}
	public function ModifMembre()
	{
		$name=$this->input->post('nom');
		$pnom=$this->input->post('pnom');
		$parente=$this->input->post('parente');
		$date=$this->input->post('date');
		$id=$this->input->post('idmilit');
		$nom = $name.' '.$pnom;
		
		$data=array('nomMembre'=>$nom,'dateNMembre'=>$date,'parente'=>$parente,'Militaire_idMilitaire'=>$id,'etat'=>0);
		
		$this->load->model('utilisateur');
		$this->utilisateur->updateMembre($data);
		
		$date=array('Militaire_idMilitaire'=>$id,'etat'=>0);
		$mbr['membre']=$this->utilisateur->getMembres($date);
		$this->load->view('secas/head');
		$this->load->view("secas/famille",$mbr);
		$this->load->view('secas/footer');

	}
	public function SuppMembre($id,$idmilit){
		$data=array('idMembre'=>$id);
		$this->load->model('utilisateur');
		$this->utilisateur->suppMembre($data);
		$date=array('Militaire_idMilitaire'=>$idmilit,'etat'=>0);
		$mbr['membre']=$this->utilisateur->getMembres($date);
		$this->load->view('secas/head');
		$this->load->view("secas/famille",$mbr);
		$this->load->view('secas/footer');
	}
	public function NewRente(){
		$liquid=$this->input->post('liquid');
		$idmilitaire=$this->session->idMilitaire;
		$idagent=$this->session->id;
		
		$date= date("Y-m-d");
		
		$data=array(
			'Militaire_idmilitaire'=>$idmilitaire,
			'AgentSECAS_idAgentSECAS'=>$idagent,
			'date'=>$date,
			'liquidateur'=>$liquid
		);
		$this->load->model('utilisateur');
		$this->utilisateur->newRente($data);
		$this->listeRentes();
	}
	public function newArchive(){
		$titre=$this->input->post('titre');
		$type=$this->input->post('type');
		$desc=$this->input->post('desc');
		$date=$this->input->post('date');
		$annee=$this->input->post('annee');
		$fichier=$this->input->post('fichier');
		
		$config['upload_path']          = './assets/img/documents/'.date('Y');
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;
		$config['file_name'] 			= $type."_".$date."_".$fichier;
        $this->load->library('upload', $config);
		if (!is_dir('./assets/img/documents/'.date('Y'))) {
			mkdir('./assets/img/documents/' . date('Y'), 0777, TRUE);
		
		}
        if ( ! $this->upload->do_upload('doc'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            //echo 'reussite';
			$idagent=$this->session->idag;
			$date=array(
				"titreDocument"=>$titre,
				"typeDocument"=>$type,
				"dateDocument"=>$date,
				"descDocument"=>$desc,
				'imgDocument'=>$ty['file_name'],
				'anneeDocument'=>$annee,
				'AgentSECAS_idAgentSECAS'=>$idagent
			);
			$this->load->model('utilisateur');
			$this->utilisateur->newDocument($date);
			$this->listeDocument(date('Y'));
        }
	}
	public function newUser(){
		$nom=$this->input->post('nom');
		$phone=$this->input->post('phone');
		$type=$this->input->post('type');
		$matricule=$this->input->post('matricule');
		$fonction=$this->input->post('fonction');
		$prov=$this->input->post('prov');
		$pwd=$nom."@".$matricule;
		$data=array(
			"nomUtilisateur"=>$nom,
			"phone"=>$phone,
			"typeUser"=>$type,
			"login"=>$matricule,
			"pwd"=>$pwd
		);
		$this->load->model("utilisateur");
		$id=$this->utilisateur->newUser($data);
		if($type=="min"){
			$min=array(
				"matriculeAgentMin"=>$matricule,
				"fonctionAgentMin"=>$fonction,
				"Utilisateur_idUtilisateur"=>$id
			);
			$this->utilisateur->newAgentMin($min);
		}else if($type="secas"){
			$secas=array(
				"matriculeAgentSECAS"=>$matricule,
				"provinceAgentSECAS"=>$prov,
				"Utilisateur_idUtilisateur"=>$id
				
			);
			$this->utilisateur->newAgentSecas($secas);
		}else if($type=="notaire"){
			$notaire=array(
				"matriculeNotaire"=>$matricule,
				"provinceNotaire"=>$prov,
				"Utilisateur_idUtilisateur"=>$id
			);
			$this->utilisateur->newNotaire($notaire);
		}
		$this->accueilAdmin();
	}
	public function updateUser($ids){
		$id=array("Utilisateur_idUtilisateur"=>$ids);
		$nom=$this->input->post('nom');
		$phone=$this->input->post('phone');
		$type=$this->input->post('type');
		$matricule=$this->input->post('matricule');
		$fonction=$this->input->post('fonction');
		$prov=$this->input->post('prov');
		$login=$this->input->post('login');
		$pwd=$this->input->post('pwd');
		$data=array(
			"nomUtilisateur"=>$nom,
			"phone"=>$phone,
			"typeUser"=>$type,
			"login"=>$login,
			"pwd"=>$pwd
		);
		$this->load->model("utilisateur");
		$this->utilisateur->updateUser(["idUtilisateur"=>$ids],$data);
		if($type=="min"){
			$min=array(
				"matriculeAgentMin"=>$matricule,
				"fonctionAgentMin"=>$fonction,
				"Utilisateur_idUtilisateur"=>$ids
			);
			$this->utilisateur->updateAgentMin($id,$min);
		}else if($type="secas"){
			$secas=array(
				"matriculeAgentSECAS"=>$matricule,
				"provinceAgentSECAS"=>$prov,
				"Utilisateur_idUtilisateur"=>$ids
				
			);
			$this->utilisateur->updateAgentSecas($id,$secas);
		}else if($type=="notaire"){
			$notaire=array(
				"matriculeNotaire"=>$matricule,
				"provinceNotaire"=>$prov,
				"Utilisateur_idUtilisateur"=>$ids
			);
			$this->utilisateur->updateNotaire($id,$notaire);
		}
		$this->accueilAdmin();
	}
	public function suppUser($id,$type){
		$this->load->model("utilisateur");
		$data=array("Utilisateur_idUtilisateur"=>$id);
		$id=array("idUtilisateur"=>$id);

		if($type="notaire"){
			$this->utilisateur->suppNotaire($data);
		}
		else if($type="secas"){
			$this->utilisateur->suppAgentsecas($data);
		}else if($type="min"){
			$this->utilisateur->suppAgentmin($data);
		}
		$this->utilisateur->suppUser($id);
		$this->accueilAdmin();
	}
	
}


