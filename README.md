# Genealogy Website

A simple genealogy website.
This application supports viewing, adding, and editing profiles, as well as displaying details for each individual.

## Features

- **Create New Person Profile**: Add a new person to the genealogy database.
- **View People List**: See a list of all people in the database with basic details.
- **View Person Details**: Click to view more details of each individual.
- **Responsive Design**: Mobile-friendly layout.

## Technologies Used

- **Frontend**:
  - HTML
  - CSS
  - JavaScript (for interactivity)
- **Backend**:
  - Laravel 
  - MySQL 
- **Version Control**:
  - Git

<!-- Réponse de la partie 3 -->
<div class="image-section">
    <h2>Réponse à la Partie 3 :</h2>
    <p>Voici le diagramme de la base de données qui répond au problème posé.</p>
   <img src="genealogie-project/public/diag.png" alt="Diagramme de la base de données">

  
    Description:
    1. Proposition de Modification: 

    Quand un utilisateur suggère une modification (ajout ou mise à jour d'un lien de parenté ou d'une fiche), une entrée est insérée dans la table modifications_proposals avec le statut 'en attente'.
    Exemple : rose03 établit un lien entre Rose PERRET et Jean PERRET dans la table des propositions de modifications.

    2. Votation 
    Les utilisateurs impliqués votent sur la proposition. Leurs suffrages sont consignés dans la table modification_votes avec le statut 'accepted' ou 'rejected'.
    Exemple : jean01 accepte, marie02 accepte, et paul20 refuse la proposition.

    3. Validation/Rejet 
    Si un nombre suffisant de votes est validé (par exemple, trois acceptations), la modification est approuvée : le statut dans modifications_proposals devient 'accepted', et la relation se retrouve ajoutée dans relationships.
    Si un nombre suffisant de votes est rejeté (par exemple, trois refus), la proposition est disqualifiée : l'état dans modifications_proposals change pour 'rejected' et aucune modification n'est mise en œuvre.
   
</div>




