<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# 📦 Projet Laravel – Import et affichage de produits AliExpress depuis un fichier CSV

Ce projet est une application Laravel permettant d’importer des produits depuis un fichier CSV (provenant d’AliExpress), de les enregistrer dans la base de données et de les afficher dans une interface web moderne réalisée avec Blade et Tailwind CSS.

Le projet repose sur un Seeder personnalisé pour l’importation et une page Blade pour l’affichage des produits.

---

## 🚀 Fonctionnalités

- Importation automatique des produits depuis un fichier CSV
- Vérification de l’existence du fichier avant l’import
- Nettoyage et sécurisation des données (prix, réduction, nombre de ventes)
- Insertion des produits dans la table `product`
- Affichage des produits sous forme de cartes
- Interface responsive avec Tailwind CSS
- Affichage conditionnel du badge de réduction
- Correction automatique des URLs d’images (`http` vers `https`)
- Suppression de l’extension `.avif` si présente
- Image de secours en cas d’erreur de chargement

---

## 🧱 Technologies utilisées

- Laravel
- PHP 8+
- Blade
- Tailwind CSS (via CDN)
- MySQL (ou tout SGBD compatible Laravel)

---

## 📁 Structure du projet

```text
    app/
    └── Database/
        └── Seeders/
            └── ProductCsvSeeder.php
    
    resources/
    └── views/
        └── products.blade.php
    
    storage/
    └── app/
        └── product.csv
````

## 📄 Format du fichier CSV

Le fichier CSV doit être placé dans le dossier :

     storage/app/product.csv

### Ordre des colonnes attendu :

    Nom du produit
    Image (URL)
    Prix
    Pourcentage de réduction
    Nombre de ventes
La première ligne du fichier correspond à l’en-tête.

## ▶️ Démarrage rapide

Cloner le projet
### Installer les dépendances :
   composer install

Configurer la base de données dans le fichier .env
Créer la table product
Placer le fichier product.csv dans storage/app/
### Lancer l’import :
   php artisan db:seed --class=ProductCsvSeeder
### Lancer le serveur :
    php artisan serve

