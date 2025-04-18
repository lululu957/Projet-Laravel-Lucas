📦 Coding Tool Box - By Lucas
🎯 Objectif du Projet
Coding Tool Box est une plateforme web centralisée destinée à la gestion des étudiants, enseignants, promotions et activités au sein de la Coding Factory. Elle vise à fluidifier les processus administratifs et renforcer la collaboration entre les différents acteurs de l'école à travers des outils modernes (IA, Kanban, tableaux de bord personnalisés...).

✅ Fonctionnalités Réalisées

🎛️ Dashboard Admin
- Vue d'ensemble avec les compteurs de promotions, étudiants, enseignants et groupes.

- Accès rapide à la gestion des entités principales.

- Données dynamiques sauf le compteur de groupes (statisé comme demandé).

🎓 Gestion des Étudiants
- Création, modification et suppression d’un étudiant.

- Assignation d’un étudiant à une promotion.

- Informations collectées : nom, prénom, date de naissance, email.

- Génération de mot de passe automatisée (backend).

🏫 Gestion des Promotions
- Création, modification et suppression d’une promotion.

- Interface intuitive via modale.

👨‍🏫 Gestion des Enseignants
- Création, modification et suppression d’un enseignant.

- Informations collectées : nom, prénom, email.

🧑‍💻 Espace Utilisateur
L’utilisateur peut :

- Modifier son email et son mot de passe.

🧩 Fonctionnalités Partiellement Implémentées

| Fonctionnalité                                   | État     | Remarques                                                                 |
|--------------------------------------------------|----------|---------------------------------------------------------------------------|
| Requêtes AJAX pour les modales (CRUD)            | ❌ Non   | Interface prête, logique backend existante, mais pas d’AJAX intégré       |
| Photo de profil (upload utilisateur)             | ❌ Non   | Route existante mais fonctionnalité non finalisée                         |
| Story 2 – Vue enseignant sur ses promotions      | ❌ Non   | Structure des tables prête, mais affichage côté enseignant manquant       |
💡 À propos de l’UI


Utilisation des classes CSS du thème pour gagner du temps dans le front.

Design simple et épuré, possibilité d'améliorations futures.

🧪 Technologies Utilisées
Frontend : HTML / CSS / JavaScript

Backend : PHP / Laravel 

Base de données : MySQL / MariaDB


🚧 À compléter si évolution
Intégration complète des actions via AJAX pour éviter les rechargements de page.

Fichier de seed ou fixtures pour peupler la base de données.

Sécurité renforcée sur les formulaires (CSRF, validation côté serveur).


🔚 Conclusion
J'ai bien mieux compris Laravel, son utilisation, la compréhension des routes et des contrôleurs qui agissent avec le Blade (la vue). Mes premières difficultés ont été l'adaptation au nouveau backlog, la story 2, car je n'ai pas trouvé pendant longtemps les promotions lorsque l'on se connectait à Teachers (problème de policies à ce que j'ai entendu) et l'adaptation à un code préfait.

🗓️ Deadline
Date de rendu : 18 avril 2025 à 16h00
Rendu sur Blackboard
