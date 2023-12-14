<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h2 {
    color: #333;
}

.form-label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.btn-primary {
    background-color: #777;
    color: #333;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.btn-primary:hover {
    background-color: #777;
}

.invalid-feedback {
    color: #dc3545;
}
.valid-feedback {
    color: #28a745;
}
</style>
<?php
require_once('../controllers/commandes.php');

require_once('../models/produits.php');
$commandes=new Commandes();
$produits=new Produits();

if(isset($_GET['id']))
{
    $pdo =new PDO('mysql:host=localhost;dbname=monoshop','root','');
    $id = $_GET['id'];
    $produit = $pdo->prepare("SELECT * FROM produit WHERE id=?");
    $produit->execute(array($id));
    $data = $produit->fetch();
}
?>
<div class="container mt-5">
    <h2>Editer Produit</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="mb-3">
            <label for="image" class="form-label">Image du produit</label>
            <input type="text" class="form-control" name="image" value="<?php echo $data['image'] ?>">
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" name="nom" value="<?php echo $data['nom']; ?>">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" value="<?php echo $data['prix']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" required><?php echo $data['description']; ?></textarea>
        </div>
        <button type="submit" class="btn-primary">Enregistrer les modifications</button>
    </form>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $produits->setId($_POST['id']);
    $produits->setNom($_POST['nom']);
    $produits->setImage($_POST['image']);
    $produits->setPrix($_POST['prix']);
    $produits->setDescription($_POST['description']);
    try 
    {
        $commandes->editer($produits);
        header('Location: afficher.php');
    } 
    catch (Exception $e) 
    {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
