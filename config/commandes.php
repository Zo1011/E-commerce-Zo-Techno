<?php

include("connexionBd.php");


function ajouter($image, $nom, $prix, $desc, $categorie_id)
{
    if (require("connexionBd.php")) {
        $req = $access->prepare("INSERT INTO produits (img, nom, prix, description, categorie_id) 
        VALUES (:image, :nom, :prix, :description, :categorie_id)");
        $req->execute([
            'image' => $image,
            'nom' => $nom,
            'prix' => $prix,
            'description' => $desc,
            'categorie_id' => $categorie_id
        ]);
        $req->closeCursor();
    }
}

function afficher()
{
    if (require("connexionBd.php")) {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function afficherParId($id)
{
    if (require("connexionBd.php")) {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_OBJ);
    }
}

function modifier($id, $img, $nom, $prix, $description)
{
    if (require("connexionBd.php")) {
        $req = $access->prepare("UPDATE produits SET img = ?, nom = ?, prix = ?, description = ? WHERE id = ?");
        $req->execute([$img, $nom, $prix, $description, $id]);
        $req->closeCursor();
    }
}


function supprimer($id)
{
    if (require("connexionBd.php")) {
        $req = $access->prepare("DELETE FROM produits WHERE id = ?");
        $req->execute([$id]);
        $req->closeCursor();
    }
}



function getProduitById($id)
{
    if (require("connexionBd.php")) {

        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_OBJ);
    }
}

#Ajout produit par les champs valider par le bouton 'Valider"
if (isset($_POST['valider'])) {
    if (isset($_POST['productImage']) and isset($_POST['productName'])  and isset($_POST['productPrice']) and isset($_POST['productDescription']) and isset($_POST['categorie_id'])) {
        $image = htmlspecialchars($_POST["productImage"]);
        $nom = htmlspecialchars($_POST["productName"]);
        $prix = htmlspecialchars($_POST["productPrice"]);
        $desc = htmlspecialchars($_POST["productDescription"]);
        $categorie_id = htmlspecialchars($_POST["categorie_id"]);

        try {
            ajouter($image, $nom, $prix, $desc, $categorie_id);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}


#Suppresion de prouit par id par le bouton submit
if (isset($_POST['supprimer']) && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    try {
        supprimer($id);
        // Recharge les produits mis à jour
        $mesProduits = afficher();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
// Exécution d'une requête pour récupérer, par exemple, les 4 derniers produits
$stmt = $access->query("SELECT * FROM produits ORDER BY date_ajout DESC LIMIT 6");
$recentProducts = $stmt->fetchAll(PDO::FETCH_OBJ);

# Requête PHP pour récupérer les catégories
$req = $access->query("SELECT * FROM categories");
$categories = $req->fetchAll(PDO::FETCH_OBJ);


// Vérifier si un ID de catégorie est passé dans l'URL
$categorie_id = isset($_GET['categorie']) ? intval($_GET['categorie']) : 0;

// Récupérer les produits de la catégorie
$req = $access->prepare("SELECT * FROM produits WHERE categorie_id = ?");
$req->execute([$categorie_id]);
$produits = $req->fetchAll(PDO::FETCH_OBJ);

// Récupérer le nom de la catégorie pour l'afficher dans le titre
$cat_req = $access->prepare("SELECT nom FROM categories WHERE id = ?");
$cat_req->execute([$categorie_id]);
$category = $cat_req->fetch(PDO::FETCH_OBJ);

// Lien active
$current_page = basename($_SERVER['PHP_SELF']);
