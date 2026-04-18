# EcoFleury - Plateforme E-commerce

---

## Contexte

Ce dépôt héberge le code source du site e-commerce d'**EcoFleury**, une entreprise spécialisée dans la vente de fleurs biologiques et locales. L'application est conçue pour être légère afin de servir de support à l'apprentissage de l'intégration continue (CI) et du déploiement continu (CD).

Le projet met l'accent sur la fiabilité du code grâce à une suite de tests unitaires automatisés et un pipeline d'orchestration **Jenkins** (via le `Jenkinsfile`) qui assure la livraison vers les environnements de pré-production (Staging) et de production.

---

## Structure

```
.ecofleury_website
├── src/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
├── database/
│   └── ecofleury.sqlite
├── tests/
│   └── Unit/
├── public/
│   └── index.php
└── Jenkinsfile
```

  - **`src/`** : Contient la logique métier de l'application (Architecture MVC simplifiée).
  - **`database/`** : Contient la base de données SQLite permettant une gestion légère et persistante des stocks et produits.
  - **`tests/`** : Regroupe les tests unitaires (PHPUnit) vérifiant les règles de gestion (ex: calcul carbone, validation de stock).
  - **`public/`** : Point d'entrée de l'application web et ressources statiques.
  - **`Jenkinsfile`** : Fichier de définition du pipeline CI/CD (Pipeline as Code) décrivant les étapes de test et de déploiement.

---

## Comment utiliser le projet

1.  **Cloner le dépôt localement**

```bash
git clone https://github.com/FireToak/ecofleury_website.git
cd ecofleury_website
```

  * `git clone` : Copie le dépôt distant sur votre machine locale.
  * `cd` : Vous déplace dans le répertoire du projet.

2.  **Installer les dépendances et initialiser l'environnement**

```bash
composer install
```

  * `composer install` : Installe toutes les bibliothèques PHP nécessaires (comme PHPUnit pour les tests) définies dans le fichier de configuration.

3.  **Exécuter les tests unitaires localement**

```bash
./vendor/bin/phpunit tests
```

  * `phpunit` : Lance la suite de tests automatisés pour s'assurer qu'aucune régression n'est présente avant d'envoyer le code vers GitHub.

---

## Mainteneurs

**Louis MEDO** | [Linkedin](https://www.linkedin.com/in/louismedo/) | [Portfolio](https://louis.loutik.fr/) | [GitHub](https://github.com/FireToak)

---

<div align="center"\>
  <br>
  <small\>\<i\>Dernière mise à jour : 21 mars 2026\</i\>\</small\>
</div\>

---