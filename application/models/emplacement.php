<?php

    class emplacement extends CI_Model
    {
        public $vendeur='vendeur';
        public $agent='agent';
        public $attribution='attribution';
        public $categorie='categorie';
        public $emplacement='emplacement';
        public $place='place';
        public $utilisateur='utilisateur';
        public function newEmplacement($data)
        {
            $this->db->insert($this->emplacement,$data);           
        }

        public function newPlace($data){
            $this->db->insert($this->place,$data);
            $id=$this->db->insert_id();
            return $id;
        }

        public function updateEmplacement($data,$id){
            $this->db->set($data);
            
            $this->db->where('idEmplacement', $id);
           
            $this->db->update($this->emplacement);
        }

        public function suppEmplacement($id)
        {
            $this->db->where('Emplacement_idEmplacement', $id);
            $this->db->delete($this->place);

            
            $this->db->where('idEmplacement', $id);

            $this->db->delete($this->emplacement);
        }
        public function expire($id)
        {
            $this->db->where('idattribution', $id);
            $this->db->set('state',1);
            
            $this->db->update($this->attribution);
        }
        public function getDates()
        {
            $this->db->select('date_debut,date_fin');
            $this->db->distinct();
            $this->db->from($this->attribution);
            $query=$this->db->get()->result();
            return $query;
            
        }
        public function getVendeurPlace($id){
            $this->db->select('idattribution');
            $this->db->where('vendeur_idvendeur', $id);
            $query=$this->db->get()->result();
            $query[0]->idattribution;
        }
        public function addAttribution($data){
            
            $this->db->insert($this->attribution,$data);

        }

        public function getPlaces(){
            $this->db->select('idPlace, description, definition');
            $this->db->from($this->place);
            $this->db->join($this->emplacement, $this->place.'.emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
            $query = $this->db->get()->result();
            return $query;
        }
       public function getPlacesEmplacement($emplacement){
        $this->db->select('idPlace');
        $this->db->from($this->place);
        $this->db->join($this->emplacement, $this->place.'.emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
        $this->db->where($emplacement);
        $query = $this->db->get()->result();
        return $query;
       }

        public function getEmplacement(){
            $this->db->select('idEmplacement, definition, nbreMaxP');
            $this->db->from($this->emplacement);
            $query = $this->db->get()->result();
            return $query;
        }

        public function getPlaces_Sur_Emplacement($idEmplacement){
            $this->db->select('idPlace, description');
            $this->db->from($this->place);
            $this->db->where($idEmplacement);
            $query = $this->db->get()->result();
            return $query;
        }
        public function getAttributionsEmplacement($emplacement){
            $this->db->select('idattribution, date_debut, date_fin, nom, definition,matricule,titre,description,etat,idEmplacement');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idplace');
            $this->db->join($this->emplacement, $this->place.'.Emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
            $this->db->join($this->vendeur, $this->attribution.'.Vendeur_idVendeur = '.$this->vendeur.'.idvendeur');
            $this->db->join($this->categorie, $this->vendeur.'.categorie_idcategorie = '.$this->categorie.'.idcategorie');
            $this->db->join($this->utilisateur,$this->vendeur.'.utilisateur_idutilisateur ='.$this->utilisateur.'.idutilisateur');
            $this->db->where($emplacement);
           
            $query = $this->db->get()->result();
           
            return $query;
        }
        public function getAttributions(){
            $this->db->select('idattribution, date_debut, date_fin, nom, definition,matricule,titre,description,etat,idEmplacement');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idplace');
            $this->db->join($this->emplacement, $this->place.'.Emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
            $this->db->join($this->vendeur, $this->attribution.'.Vendeur_idVendeur = '.$this->vendeur.'.idvendeur');
            $this->db->join($this->categorie, $this->vendeur.'.categorie_idcategorie = '.$this->categorie.'.idcategorie');
            $this->db->join($this->utilisateur,$this->vendeur.'.utilisateur_idutilisateur ='.$this->utilisateur.'.idutilisateur');
            
           
            $query = $this->db->get()->result();
           
            return $query;
        }
        public function getAttributionsEnCours(){
            $this->db->select('idattribution, date_debut, date_fin, nom, definition,matricule,titre,description');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idplace');
            $this->db->join($this->emplacement, $this->place.'.Emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
            $this->db->join($this->vendeur, $this->attribution.'.Vendeur_idVendeur = '.$this->vendeur.'.idvendeur');
            $this->db->join($this->categorie, $this->vendeur.'.categorie_idcategorie = '.$this->categorie.'.idcategorie');
            $this->db->join($this->utilisateur,$this->vendeur.'.utilisateur_idutilisateur ='.$this->utilisateur.'.idutilisateur');
           
            $this->db->order_by('date_debut', 'ASC');
            
            $this->db->where(['etat'=>1,'state'=>0]);
            $query = $this->db->get()->result();
            return $query; 
        }
        public function getAttributionsVendeurs(){
            $this->db->select('idattribution, date_debut, date_fin, nom, definition,matricule,titre,description,idemplacement,idcategorie');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idplace');
            $this->db->join($this->emplacement, $this->place.'.Emplacement_idEmplacement = '.$this->emplacement.'.idEmplacement');
            $this->db->join($this->vendeur, $this->attribution.'.Vendeur_idVendeur = '.$this->vendeur.'.idvendeur');
            $this->db->join($this->categorie, $this->vendeur.'.categorie_idcategorie = '.$this->categorie.'.idcategorie');
            $this->db->join($this->utilisateur,$this->vendeur.'.utilisateur_idutilisateur ='.$this->utilisateur.'.idutilisateur');
            $this->db->order_by('date_debut', 'ASC');
            $this->db->group_by('date_debut,idemplacement,idcategorie');
            

            $query = $this->db->get()->result();
            return $query;
        }
        public function getNbreAttbyEmplacement($idemplacement,$date_debut,$date_fin,$idcategorie){
            $data=array('idemplacement'=>$idemplacement,'date_debut'=>$date_debut,'date_fin'=>$date_fin,'idcategorie'=>$idcategorie);
            $this->db->select('idattribution');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idPlace');
            $this->db->join($this->vendeur, $this->attribution.'.Vendeur_idVendeur = '.$this->vendeur.'.idvendeur');
            $this->db->join($this->categorie, $this->vendeur.'.categorie_idcategorie = '.$this->categorie.'.idcategorie');
            $this->db->join($this->emplacement, $this->place.'.Emplacement_idEmplacement = '.$this->emplacement.'.idemplacement');
            $this->db->where($data);
            $query=$this->db->get()->result_array();
            
            $a=count($query);
            return $a;

        }

        public function getAttribution($date,$emplacement)
        {
            $this->db->select('idattribution, date_debut, date_fin');
            $this->db->from($this->attribution);
            $this->db->join($this->place, $this->attribution.'.Place_idPlace = '.$this->place.'.idplace');
            $this->db->where('date_debut',date($date));
           // $this->db->where('vendeur_idvendeur',$idvendeur);
            $this->db->where('Emplacement_idEmplacement', $emplacement);
            //$this->db->where('Place_idPlace', $i);
            $query = $this->db->get()->result();
            return count($query);
           
            
        }
        public function attribuer($data,$emplacement,$i){
            $i=$this->getAttribution($data['date_debut'],$data['vendeur_idvendeur'],$emplacement,$i);
            if($i==1){
                $this->db->insert($this->attribution,$data);
            }
            else{
               
                $name=array('Emplacement_idEmplacement '=>$emplacement);
                $this->db->insert($this->place,$name);
                $idp=$this->db->insert_id();
                $datas=array('vendeur_idvendeur'=>$data['vendeur_idvendeur'],
                'agent_idagent'=>$data['agent_idagent'],
                'date_debut'=>$data['date_debut'],
                'date_fin'=>$data['date_fin'],
                'Place_idPlace'=>$idp
                );
                $this->db->insert($this->attribution,$datas);
            }
        }
        public function getNbreMax($idEmplacement){
            $this->db->select('nbreMaxP');
            $this->db->from($this->emplacement);
            $this->db->where('idEmplacement',$idEmplacement);
            $query=$this->db->get()->row();
            if($query !=[]){
                return $query->nbreMaxP;
            }
            return 0;
        }
    }
    
?>