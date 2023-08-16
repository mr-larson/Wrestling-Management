# Wrestling-Management 🚀

![Version](https://img.shields.io/badge/version-0.1.0-blue.svg?cacheSeconds=2592000)
![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)

> Une plateforme de gestion de promotions et de travailleurs, permettant de gérer les statistiques de match et le classement global et par promotions. 

## Fonctionnalités 🌱

- Création et gestion de promotion et de travailleurs.
- Gestion du classement en fonction des victoires, des null et des défaites. 

## Installation 🔧

**Pré-requis**:  Avoir Docker installé et en cours d'exécution, [Composer](https://getcomposer.org/) et [Node.js](https://nodejs.org/) installés.

```bash
# Cloner le répertoire
git clone https://github.com/mr_larson/Wrestling-Management.git

# Se déplacer dans le dossier
cd Wrestling-Management

# Installer les dépendances PHP avec Sail
./vendor/bin/sail composer install

# Installer les dépendances JavaScript
npm install

# Construire les assets
npm run dev

# Configurer l'environnement
cp .env.example .env
# Générer une clé d'application
./vendor/bin/sail php artisan key:generate

# Lancer l'environnement de développement Sail
./vendor/bin/sail up

