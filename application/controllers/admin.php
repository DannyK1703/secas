<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


	public function index()
	{
		$this->load->view('inc/header');
		$this->load->view('admin/connexion');
		$this->load->view('inc/footer');
	}
	public function deconnexion(){
        session_destroy();
        redirect('admin/index');
    }
	public function connexion()
	{
		$login=$this->input->post('login');
		$pwd=$this->input->post('pwd');
		$data=array('login' =>$login, 'pwd' =>$pwd);
		$this->load->model('utilisateur');
		$res=$this->utilisateur->AuthAdmin($data);
		if($res==1)
		{
			$logi=array('login'=>$login);
			
			$data=$this->utilisateur->getAdmin($logi);
			$user=$data[0];
			$info=array('numero'=>$user->numero, 'email'=>$user->email, 'nom'=>$user->nom, 'login'=>$login);
			
			$this->session->set_userdata($info);
			
			$this->accueil();
			
		}
		else{
			echo('erreur');
			$this->index();
		}
	}
	public function accueil()
	{
		$this->load->model('utilisateur');
		$data['agents']=$this->utilisateur->getAgents();
		
		$this->load->view('inc/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/accueil',$data);
		$this->load->view('inc/footer');
	}

	public function nouvAgent(){
		$this->load->view('inc/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/newAgent');
			$this->load->view('inc/footer');
	}

	
	
	public function SuppAgent($id)
	{
		$this->load->model('utilisateur');
		$this->utilisateur->suppAgent(['idagent'=>$id]);
		$this->accueil();

	}
	public function NewAgent(){
		$nom=$this->input->post('nom');
		$email=$this->input->post('email');
		$adresse=$this->input->post('adresse');
		$phone=$this->input->post('phone');
		$login=$this->input->post('login');
		$pwd=$this->input->post('pwd');
		$cpwd=$pwd;
		$type='agent';
		if($pwd==$cpwd){
			$data=array(
				'nom'=>$nom,
				'adresse'=>$adresse,
				'phone'=>$phone,
				'matricule'=>$login,
				'email'=>$email,
				'type'=>$type,	
				'pwd'=>$pwd
			);

			$this->load->model('utilisateur');
			$this->utilisateur->addUtilisateur($data);
			$this->accueil();
		}
		else{
			echo 'mot de passes non conformes';
		}
	}

	

	public function ReinitialiserAgent($id){
		$this->load->model('utilisateur');
		$mat=$this->utilisateur->getMatriculeAgent(['idagent'=>$id]);
		
		$login=$mat;
		$pwd=$mat.'Pwd';
		$cpwd=$mat.'Pwd';
		if($pwd==$cpwd){
			$data=array(
				
				'matricule'=>$login,
				'pwd'=>$pwd
			);

			
			$this->utilisateur->reinitAgent($id,$data);
			$this->accueil();
		}
		else{
			echo 'mot de passes non conformes';
		}
	}

	
}
