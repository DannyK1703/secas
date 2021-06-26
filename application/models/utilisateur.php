<?php

    class utilisateur extends CI_Model
    {
        public $vendeur='vendeur';
        public $agent='agent';
        public $utilisateur='utilisateur' ;  
        public $agentmin='agentmin';
        public $agentsecas='agentsecas';
        public $notaire='notaire' ;
        public $militaire='militaire' ;
        public $membre='membre';
        public $rentesurvie='rentesurvie' ;
		public $attestation='attestation';
		public $budjet='budjet' ;
		public $rapport='rapport' ;
		

        public function getUser($login){
            
            $this->db->select('idUtilisateur,nomUtilisateur,phone,typeUser');
            $this->db->from($this->utilisateur);
            $this->db->where($login);
            $query = $this->db->get()->result();
           
            
            return $query;
        } 
        public function getAgentmin($id){
            $this->db->select('idAgentMin,matriculeAgentMin,fonctionAgentMin');
            $this->db->from( $this->agentmin);
            $this->db->join($this->utilisateur,$this->utilisateur.'.idUtilisateur='.$this->agentmin.'.Utilisateur_idUtilisateur');
            $this->db->where($id);
            $res=$this->db->get()->result();
            return $res[0];
        }
		public function getMilitaire($id){
			$this->db->select('idMilitaire,NomMilitaire,Matricule,dateNaiss');
            $this->db->from($this->militaire);
            $this->db->where($id);
            $query = $this->db->get()->result();
			return $query;
		}
		public function getInfosRente($id){
			$this->db->select('idRenteSurvie,date,NomMilitaire,Matricule,idMilitaire,idAgentSECAS,liquidateur,date,dateValidation');
            $this->db->from($this->rentesurvie);
            $this->db->join($this->militaire, $this->rentesurvie.'.Militaire_idMilitaire = '.$this->militaire.'.idMilitaire');
            $this->db->join($this->agentsecas,$this->rentesurvie.'.AgentSECAS_idAgentSECAS = '.$this->agentsecas.'.idAgentSECAS');
			$this->db->join($this->attestation,$this->rentesurvie.'.idRenteSurvie = '.$this->attestation.'.RenteSurvie_idRenteSurvie');
			$this->db->where($id);
			$query = $this->db->get()->result();
            return $query;
		}
		public function getInfoRente($id){
			$this->db->select('idRenteSurvie,date,NomMilitaire,Matricule,idMilitaire,idAgentSECAS,liquidateur,date');
            $this->db->from($this->rentesurvie);
            $this->db->join($this->militaire, $this->rentesurvie.'.Militaire_idMilitaire = '.$this->militaire.'.idMilitaire');
            $this->db->join($this->agentsecas,$this->rentesurvie.'.AgentSECAS_idAgentSECAS = '.$this->agentsecas.'.idAgentSECAS');
			$this->db->where($id);
			$query = $this->db->get()->result();
            return $query[0];
		}
		public function validerRente($id){
			$this->db->set(array('etatRente'=>1));
            $this->db->where($id);
            $this->db->update($this->rentesurvie);
		}
		public function listeAttestations(){
			$this->db->select('idAttestation,Notaire_idNotaire,etat,RenteSurvie_idRenteSurvie');
			$this->db->from($this->attestation);
			$res=$this->db->get($this->utilisateur)->result();
            return $res;
		}
		public function getBugets(){
			$this->db->select('idBudjet,montant,annee');
            $this->db->from($this->budjet);
			$res=$this->db->get()->result();
            return $res;
		}
		public function getAttestationMin(){
			$this->db->select('idAttestation,Notaire_idNotaire,etat,RenteSurvie_idRenteSurvie');
			$this->db->from($this->attestation);
			$this->db->where(array('etat'=>0));
			$res=$this->db->get($this->utilisateur)->result();
            return $res;
		}
		public function updateAttestation($id,$data){
			$this->db->set($data);
            
            $this->db->where(array('RenteSurvie_idRenteSurvie'=>$id));
           
            $this->db->update($this->attestation);
		}
		public function listeCartes(){
			$this->db->select('idAttestation,Notaire_idNotaire,etat,RenteSurvie_idRenteSurvie');
			$this->db->from($this->attestation);
			$this->db->where(array('etat'=>1));
			$res=$this->db->get($this->utilisateur)->result();
            return $res;
		}
		public function getNotaireId($id){
			$this->db->select('idNotaire');
            $this->db->from($this->notaire);
            $this->db->where($id);
			$res=$this->db->get($this->utilisateur)->result();
            return $res[0];
		}
        public function getAgentSecas($id){
            $this->db->select('idAgentSECAS,matriculeAgentSECAS,provinceAgentSECAS');
            $this->db->from($this->agentsecas);
            $this->db->where($id);
            $res=$this->db->get($this->utilisateur)->result();
            return $res[0];
        }
		public function getAgent($id){
            $this->db->select('idAgentSECAS,matriculeAgentSECAS,provinceAgentSECAS,nomUtilisateur');
            $this->db->from($this->agentsecas);
			$this->db->join($this->utilisateur, $this->utilisateur.'.idUtilisateur='.$this->agentsecas.'.Utilisateur_idUtilisateur');
            $this->db->where($id);
            $res=$this->db->get()->result();
            return $res[0];
        }
        public function getNotaire($id){
            $this->db->select('idNotaire,matriculeNotaire,provinceNotaire,nomUtilisateur');
            $this->db->from($this->notaire);
            $this->db->join($this->utilisateur, $this->utilisateur.'.idUtilisateur='.$this->notaire.'.Utilisateur_idUtilisateur');
            $this->db->where($id);
            $res=$this->db->get()->result();
            return $res[0];
        }
        public function AuthUser($data){
            $this->db->where($data);
            $res=$this->db->get($this->utilisateur)->result();
            if($res!=null)
                return 1;
            return 0;
        }
		public function newAttestation($data){
			$this->db->insert($this->attestation,$data);
			
		}
		public function newRapport($rpr){
			$this->db->insert($this->rapport,$rpr);
			$id=$this->db->insert_id();
			return $id;
		}
		public function newBidjet($data){
			$this->db->insert($this->budjet,$data);
		}
		public function getMembre($id){
			$this->db->select('idMembre,nomMembre,dateNMembre,parente');
            $this->db->from($this->membre);
            $this->db->where($id);
            $query = $this->db->get()->result();
			return $query;
		}
        public function suppMembre($id){

            $this->db->where($id);
            $this->db->delete($this->membre);
            echo($id);die();
        }
        public function newMilitaire($data){
            $this->db->insert($this->militaire,$data);
            $id=$this->db->insert_id();
            return $id;
        }
        public function getRentes(){
            $this->db->select('idRenteSurvie,date,NomMilitaire,Matricule,idMilitaire');
            $this->db->from($this->rentesurvie);
            $this->db->join($this->militaire, $this->rentesurvie.'.Militaire_idMilitaire = '.$this->militaire.'.idMilitaire');
            $query = $this->db->get()->result();
            
            return $query;
        }
		public function getRentesEnCours(){
			$this->db->select('idRenteSurvie,date,NomMilitaire,Matricule,idMilitaire');
            $this->db->from($this->rentesurvie);
            $this->db->join($this->militaire, $this->rentesurvie.'.Militaire_idMilitaire = '.$this->militaire.'.idMilitaire');
            $this->db->where(array('etatRente'=>0));
			$query = $this->db->get()->result();
            
            return $query;
		}
        public function newRente($data){
            $this->db->insert($this->rentesurvie,$data);
        }
        public function newMembre($data){
            $this->db->insert($this->membre,$data);
        }
        public function updateMembre($data,$id){
            $this->db->set($data);
            
            $this->db->where($id);
           
            $this->db->update($this->attribution);
        }
        public function CountVendeurbyCat($id){
            
            $this->db->select('idVendeur');
            $this->db->from($this->vendeur);
            $this->db->where('categorie_idcategorie', $id);
            $query =$this->db->count_all_results();
            return $query;
        }
        public function getMembres($data) {
            $this->db->select('idMembre,nomMembre,dateNMembre,parente');
            $this->db->from($this->membre);
            $this->db->where($data);
            $query = $this->db->get()->result();
            return $query;
        }

        
        
        
    }?>
