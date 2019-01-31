## TestSymfony réalisé dans le cadre d'une demande de stage.

### Procedure à suivre pour set-up symfony.
* Installer les dépendances avec composer : ``composer update``
* Modifier le fichier ``.env`` et ajouter la configuration de votre base de données : ``DATABASE_URL={Votre configuration de base de données}``
* Executer les migrations de Doctrine : ``php bin/console doctrine:migrations:migrate``
* Vous pouvez maintenant utiliser l'application.

### Quelques screenshots

#### Liste des films
![Liste des films](https://image.noelshack.com/fichiers/2019/05/5/1548976826-siteliste.png)

#### Détail d'un film
![Détail d'un film](https://image.noelshack.com/fichiers/2019/05/5/1548976827-site1.png)

#### Ajout d'un film
![Ajout d'un film](https://image.noelshack.com/fichiers/2019/05/5/1548976827-site.png)
