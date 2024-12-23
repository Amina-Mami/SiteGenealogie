<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur le site de généalogie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 2em;
        }

        p {
            font-size: 1.2em;
            margin: 20px 0;
            text-align:center;
        }

        h2 {
            color: #4CAF50;
            font-size: 1.5em;
            margin-bottom: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            margin-left:500px;
            text-align: center;
            
           
        
        }

        li {
            margin: 10px 0;
            justify-content:center;
          
           


        }

        a {
            display: block;
            text-align:center;
           
            text-decoration: none;
            color: #fff;
            background-color: blue;
            padding: 15px;
            width: 250px;
           
            font-size: 1.2em;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            text-decoration: underline;
        }

        .image-section {
            margin-top: 30px;
            text-align: center;
        }

        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }

    </style>
</head>
<body>

<header>
    <h1>Bienvenue sur le site de généalogie</h1>
</header>

<p>Ce site permet de créer des fiches de personnes et de gérer les relations familiales. Vous pouvez commencer dès maintenant !</p>

<h2>Que voulez-vous faire ?</h2>
<ul >
    <li><a href="{{ route('people.create') }}">Créer une fiche de personne</a></li>
    <li><a href="{{ route('people.index') }}">Voir la liste des fiches de personnes</a></li>
</ul>

<!-- Réponse de la partie 3 -->
<div class="image-section">
    <h2>Réponse à la Partie 3 :</h2>
    <p>Voici le diagramme de la base de données qui répond au problème posé.</p>
    <img src="diag.png" alt="Diagramme de la base de données">
    <h2>Description:</h2>
    <p>1. Proposition de Modification: <br>

Quand un utilisateur suggère une modification (ajout ou mise à jour d'un lien de parenté ou d'une fiche), une entrée est insérée dans la table modifications_proposals avec le statut 'en attente'.
<br>
Exemple : rose03 établit un lien entre Rose PERRET et Jean PERRET dans la table des propositions de modifications.
<br>

2. Votation <br>
Les utilisateurs impliqués votent sur la proposition. Leurs suffrages sont consignés dans la table modification_votes avec le statut 'accepted' ou 'rejected'.
<br>
Exemple : jean01 accepte, marie02 accepte, et paul20 refuse la proposition.

<br>
3. Validation/Rejet <br>
Si un nombre suffisant de votes est validé (par exemple, trois acceptations), la modification est approuvée : le statut dans modifications_proposals devient 'accepted', et la relation se retrouve ajoutée dans relationships.
<br>
Si un nombre suffisant de votes est rejeté (par exemple, trois refus), la proposition est disqualifiée : l'état dans modifications_proposals change pour 'rejected' et aucune modification n'est mise en œuvre.



</p>

</div>

<div class="footer">
    <p>&copy; 2024 Site de Généalogie. Tous droits réservés.</p>
</div>

</body>
</html>
