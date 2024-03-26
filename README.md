# Watchy

Watchy est une plateforme de partage de liens et de commentaires conçue pour faciliter la veille collaborative entre groupes d'utilisateurs. Avec Watchy, vous pouvez créer des groupes, inviter d'autres utilisateurs à rejoindre votre groupe, partager des liens, commenter les publications, réagir aux posts, et bien plus encore.

## Fonctionnalités

### Authentification
- [ ] **Créer un compte:** Les utilisateurs peuvent créer un compte en fournissant leur adresse e-mail et un mot de passe sécurisé.

### Gestion des Groupes
- [ ] **Créer un groupe:** Les utilisateurs peuvent créer un nouveau groupe en spécifiant un nom pour celui-ci.
- [ ] **Inviter des utilisateurs:** Les créateurs de groupe peuvent inviter d'autres utilisateurs en utilisant leur adresse e-mail.
- [ ] **Rejoindre un groupe:** Les utilisateurs peuvent rejoindre un groupe en acceptant une invitation.

### Partage de Liens
- [ ] **Poster un lien:** Les utilisateurs peuvent partager des liens en fournissant l'URL du site et une description.
- [ ] **Notification de groupe:** Les membres du groupe sont notifiés lorsqu'un nouveau lien est partagé.

### Commentaires et Réactions
- [ ] **Ajouter un commentaire:** Les utilisateurs peuvent ajouter des commentaires aux publications.
- [ ] **Répondre à un commentaire:** Les utilisateurs peuvent répondre aux commentaires existants.
- [ ] **Notification de commentaire:** Les membres du groupe sont notifiés lorsqu'un nouveau commentaire est ajouté.
- [ ] **Réagir au post:** Les utilisateurs peuvent réagir rapidement aux posts en utilisant des réactions.

### Gestion des Favoris et Recherche
- [ ] **Mettre en favori:** Les utilisateurs peuvent marquer des posts comme favoris pour les retrouver facilement.
- [ ] **Recherche de posts:** Les utilisateurs peuvent rechercher des posts en fonction de leur contenu ou de l'utilisateur qui a partagé le lien.

## Architecture

Dans le cadre de l'architecture logicielle de Watchy, nous suivons les principes du Clean Code tout en intégrant des éléments du modèle CQRS (Command Query Responsibility Segregation). Cette approche nous permet de maintenir un code clair, modulaire et facilement évolutif. Au cœur de notre architecture se trouve le domaine métier, où les règles métier et la logique applicative sont encapsulées dans des UseCases. Ces UseCases représentent des scénarios d'utilisation spécifiques de notre application. Ils prennent en entrée des commandes (pour les actions de modification) ou des requêtes (pour les consultations) et produisent des réponses en sortie. Cette division nette entre le domaine métier et l'infrastructure technique garantit une séparation des préoccupations claire. Les détails d'implémentation techniques, tels que la persistance des données ou les appels à des services externes, sont gérés dans la couche d'infrastructure. En adoptant cette approche, nous favorisons la maintenabilité, la testabilité et la scalabilité de notre code tout en assurant une bonne gestion de la complexité.
