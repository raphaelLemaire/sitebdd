<?php
session_start();
$titre="Connexion";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> Connexion';
echo '<h1>Connexion</h1>';
if ($id!=0) erreur(ERR_IS_CO);
else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo
        FROM forum_membres WHERE membre_pseudo = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['membre_mdp'] == md5($_POST['password'])) // Acces OK !
	{
	    $_SESSION['pseudo'] = $data['membre_pseudo'];
	    $_SESSION['level'] = $data['membre_rang'];
	    $_SESSION['id'] = $data['membre_id'];
	    $message = '<p>Bienvenue '.$data['membre_pseudo'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';
    <input type="hidden" name="page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
    $page = htmlspecialchars($_POST['page']);
echo 'Cliquez <a href="'.$page.'">ici</a> pour revenir à la page précédente';
?>
