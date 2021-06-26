<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agent extends CI_Controller {


	public function index(){
		$this->load->view('inc/header');
		$this->load->view('agent/connexion');
		$this->load->view('inc/footer');
	}
	public function deconnexion(){
        session_destroy();
        redirect('agent/index');
    }
	public function connexion(){
		$login=$this->input->post('login');
		$pwd=$this->input->post('pwd');
		$data=array('matricule' =>$login, 'pwd' =>$pwd);
		$this->load->model('utilisateur');
		$res=$this->utilisateur->AuthAgent($data);
		if($res==1)
		{
			$logi=array('matricule'=>$login);
			
			$data=$this->utilisateur->getAgent($logi);
			$user=$data[0];
			$info=array('phone'=>$user->phone, 'email'=>$user->email, 'nom'=>$user->nom, 'matricule'=>$login,'idagent'=>$user->idagent);
			
			$this->session->set_userdata($info);
			
			$this->accueil();
			
		}
		else{
			echo('erreur');
			$this->index();
		}
	}

	public function majAgent($id){
		$pwd=$this->input->post('pwd');
		$data=['pwd'=>$pwd,'idagent'=>$id];
		$this->load->model('utilisateur');
		$this->utilisateur->ChangeMdpAgent($data);
		$this->accueil();
	}

	public function accueil(){
		$this->load->model('utilisateur');
		$data['vendeurs']=$this->utilisateur->getVendeurs();
		$data['categories']=$this->utilisateur->getCategories();
		$this->load->view('inc/header');
		$this->load->view('agent/navbar');
		$this->load->view('agent/accueil',$data);
		$this->load->view('inc/footer');
	}
	
	public function categories(){
		$this->load->model('utilisateur');
		
		$data['categories']=$this->utilisateur->getCategories();
		$this->load->view('inc/header');
		$this->load->view('agent/navbar');
		$this->load->view('agent/categories',$data);
		$this->load->view('inc/footer');
	}
	

	public function emplacements(){
		$this->expireAttribution();
		$this->load->model('emplacement');
		$data['emplacements']=$this->emplacement->getEmplacement();
		$this->load->model('utilisateur');
		$data['categories']=$this->utilisateur->getCategories();
		
		foreach($data['categories'] as $categorie){
			$data['nbvendeurs'][$categorie->idcategorie]=$this->utilisateur->CountVendeurbyCat($categorie->idcategorie);
			$data['nbvendeursatt'][$categorie->idcategorie]=$this->utilisateur->CountVendeurbyAttrib($categorie->idcategorie);
			
		}
		
		$this->load->view('inc/header');
		$this->load->view('agent/navbar');
		$this->load->view('agent/emplacements',$data);
		$this->load->view('inc/footer');
	}

	public function NewEmplacement(){
		$description=$this->input->post('definition');
		$nbreMaxP=$this->input->post('nbrP');
		$data=array(
			'definition'=>$description,
			'nbreMaxP'=>$nbreMaxP
		);
		$this->load->model('emplacement');
		$this->emplacement->newEmplacement($data);
		$this->emplacements();
	}
	public function suppVendeur($id){
		$this->load->model('utilisateur');
		$this->utilisateur->suppVendeur(['idVendeur'=>$id]);
		$this->accueil();
	}

	public function NewVendeur(){
		$nom=$this->input->post('nom');
		$email=$this->input->post('email');
		$adresse=$this->input->post('adresse');
		$phone=$this->input->post('phone');
		$login=$this->input->post('matricule');
		$pwd=$this->input->post('categorie');
		
		$type='vendeur';
		
			$data=array(
				'nom'=>$nom,
				'adresse'=>$adresse,
				'phone'=>$phone,
				'matricule'=>$login,
				'email'=>$email,
				'type'=>$type,	
				'categorie_idcategorie'=>$pwd
			);
			
			$this->load->model('utilisateur');
			$this->utilisateur->addUtilisateur($data);
			$this->accueil();
	
	}

	public function expireAttribution(){
		$this->load->model('emplacement');
		$data['emplacements']=$this->emplacement->getAttributions();
		foreach($data['emplacements'] as $query){
			if($query->date_fin<=date('Y-m-d')){
				$this->emplacement->expire($query->idattribution);
			}
		}
			
	}
	public function updateVendeur($id){
		$nom=$this->input->post('nom');
		$email=$this->input->post('email');
		$adresse=$this->input->post('adresse');
		$phone=$this->input->post('phone');
		$login=$this->input->post('matricule');
		$pwd=$this->input->post('categorie');
		
		$type='vendeur';
		
			$data=array(
				'nom'=>$nom,
				'adresse'=>$adresse,
				'phone'=>$phone,
				'matricule'=>$login,
				'email'=>$email,
				'type'=>$type,	
				'categorie_idcategorie'=>$pwd
			);
			
			$this->load->model('utilisateur');
			$this->utilisateur->updateVendeur($data,$id);
			$this->accueil();
	
	}
	public function suppCategorie($id){
		$this->load->model('utilisateur');
		$this->utilisateur->suppCategorie($id);
		$this->categories();
        
	}

	public function newCategorie(){
		$titre=$this->input->post('titre');
		$desc=$this->input->post('desc');
		$data=array('titre'=>$titre, 'descriptions'=>$desc);
		$this->load->model('utilisateur');
		$this->utilisateur->newCategorie($data);
		$this->categories();
        
	}

	public function majCategorie($id){
		$titre=$this->input->post('titre');
		$desc=$this->input->post('desc');
		$data=array('titre'=>$titre, 'descriptions'=>$desc);
		$this->load->model('utilisateur');
		$this->utilisateur->updateCategorie($data,$id);
		$this->categories();
	}
	public function payer($id,$idEmplacement){
		$data=array('etat'=>1);
		$this->load->model('utilisateur');
		$this->utilisateur->updateVendeurPaiment($data,$id);
		$this->listeVendeurEmplacement($idEmplacement);
	}
	public function majEmplacement($id){
		$titre=$this->input->post('definition');
		$desc=$this->input->post('nbrP');
		$data=array('definition'=>$titre, 'nbreMaxP'=>$desc);
		$this->load->model('emplacement');
		$this->emplacement->updateEmplacement($data,$id);
		$this->emplacements();
	}

	public function suppEmplacement($id){
		$this->load->model('emplacement');
		$this->emplacement->suppEmplacement($id);
		$this->emplacements();
	}

	public function attribution(){
		
		$this->load->model('emplacement');
		$data['emplacements']=$this->emplacement->getAttributions();
		$this->load->view('inc/header');
		$this->load->view('agent/navbar');
		$this->load->view('agent/emplacements',$data);
		$this->load->view('inc/footer');
	}
	
	public function attributionPlace($idagent){
		$categorie=$this->input->post('categorie');
		$emplacement= $this->input->post('emplacement');
		$date_debut=$this->input->post('datedebut');
		$date_fin=$this->input->post('datefin');
		$idCategorie=array('categorie_idcategorie'=>$categorie);
		$nbrevend=$this->input->post('nbrevend');
		$this->load->model('utilisateur');
		$allVendeursCat=$this->utilisateur->getVendeurs_Par_Categorie($idCategorie);
		$allvendeursCatAttribues=$this->utilisateur->getUtilisateurAttribuerbyCat($idCategorie);
		$tvcat=array();
		$tvcata=array();
		if($allVendeursCat!=[]){
			foreach($allVendeursCat as $cat){
				array_push($tvcat,$cat->idVendeur);
			}
		}
		if($allvendeursCatAttribues !=[]){ 
			foreach($allvendeursCatAttribues as $cati){
				array_push($tvcata,$cati->idVendeur);
			}
		}
		$vendeursNArt=array_diff($tvcat,$tvcata);
		$vendeursNArtt=array();
		foreach($vendeursNArt as $ap){
			array_push($vendeursNArtt,$ap);
		}
		$this->load->model('emplacement');
		$nbreMaxP=$this->emplacement->getNbreMax($emplacement);
		$npa=count($tvcata);
		$np=$this->emplacement->getPlaces_Sur_Emplacement($emplacement);
		$newPlace=0;
		foreach($np as $n){
			$newPlace=$n->description;
		}
		$nvna=count($vendeursNArtt);
		
		if($nbrevend<=$nvna){
			$conteur=$nbrevend;
		}else{
			$conteur=$nvna;
		}
		
		$a=1;
		
		for($i=0;$i<$conteur;$i++){
			$plac=array(
				'description'=>$newPlace+$a,
				'emplacement_idemplacement'=>$emplacement
			);
			$idPlace=$this->emplacement->newPlace($plac);
			$a=$a+1;
			$data=array(
				'vendeur_idvendeur'=>$vendeursNArtt[$i],
				'agent_idagent'=>$idagent,
				'date_debut'=>$date_debut,
				'date_fin'=>$date_fin,
				'Place_idPlace'=>$idPlace,
				'etat'=>0
				);
			$this->emplacement->addAttribution($data);
		}
		$this->emplacements();
		
	}

	public function listeVendeurEmplacement($idEMplacement){
		$this->load->model('emplacement');
		$data['emplacements']=$this->emplacement->getAttributionsEmplacement(['idEmplacement'=>$idEMplacement]);
		$this->load->view('inc/header');
		$this->load->view('agent/navbar');
		$this->load->view('agent/emplacementCat',$data);
		$this->load->view('inc/footer');
	}
}
