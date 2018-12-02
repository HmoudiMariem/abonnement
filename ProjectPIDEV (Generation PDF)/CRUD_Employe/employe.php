<?php
include 'config.php';
class Employer
{
    private $cin;
    private $nom;
    private $prenom;
    private $nbHeur;
    private $tarifHoraire;
    private $db;
    
    public function __construct($cin, $nom, $prenom, $nbHeur, $tarifHoraire)
    {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nbHeur = $nbHeur;
        $this->tarifHoraire = $tarifHoraire; 
         //1- creer une instance de la classe config
        $this->db=new config();
        //2-faire la cnx avec la base de donnée
        $this->db=$this->db->getCnx();
    }
    
    public function getCin()
    {
        return $this->cin;
    }
    
     public function setCin($cin)
    {
        $this->cin = $cin;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNbHeur()
    {
        return $this->nbHeur;
    }
    public function getTarifHoraire()
    {
        return $this->tarifHoraire;
    }
    
    
   
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom =$prenom;
    }
    public function setNbHeur($nbHeur)
    {
        $this->nbHeur = $nbHeur;
    }
    public function setTarifHoraire( $tarifHoraire)
    {
         $this->tarifHoraire = $tarifHoraire;
    }
    public function afficher()
    {
        echo "Le cin : ".$this->cin."<br>";
        echo "Le nom : ".$this->nom."<br>";
        echo "Le prenom : ".$this->prenom."<br>";
        echo "Le nbHeur : ".$this->nbHeur."<br>";
        echo "Le tarif horaire : ".$this->tarifHoraire."<br>";
    }
    public function calculer()
    {
        return $this->tarifHoraire*$this->nbHeur;
    }
    public function ajouterDB($employe){
       
        //3-preparation de notre requete sql
        $sql="insert into employe (cin,nom,prenom,nbHeur,tarifHoraire) values (:cin, :nom,:prenom,:nbH,:tarifH)";
        //4-preparation avec PDO
        $req=$this->db->prepare($sql);
        //5-recupération des valeurs
        $cin=$employe->getCin();
        $nom=$employe->getNom();
        $prenom=$employe->getPrenom();
        $nb=$employe->getNbHeur();
        $tarif=$employe->getTarifHoraire();
        //6-Association des valeurs
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nbH',$nb);
		$req->bindValue(':tarifH',$tarif);
        //7-execute 
        $req->execute();       
    }
    
    public function afficherdb(){
        //1-preparattion 
        $sql="select * from employe";
        $employes=$this->db->query($sql);
        return $employes;   
    }
	
	public function supprimerdb($cin){
		//1-preparation de sql
		$sql="delete  from employe where cin=$cin";
		$this->db->exec($sql);
	}
    
     public function chercher($cin){
        //1-preparattion 
        $sql="select * from employe where cin=$cin";
        $employes=$this->db->query($sql);
        return $employes;   
    }
    function modifierEmploye($employe,$cin){
        $sql="UPDATE employe SET nbHeur=:nbH,
                     tarifHoraire=:tarifH WHERE cin=:cin";
            $req=$this->db->prepare($sql);
            $nb=$employe->getNbHeur();
            $tarif=$employe->getTarifHoraire();
            $req->bindValue(':cin',$cin);
            $req->bindValue(':nbH',$nb);
            $req->bindValue(':tarifH',$tarif);
            return $req->execute();
    }
}
    
?>