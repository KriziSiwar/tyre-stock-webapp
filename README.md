# tyre-stock-webapp
# Application web de gestion du gardiennage de pneus

## Présentation

Cette application web permet de gérer le stock de pneus d’un garage agréé Mercedes-Benz à Sierre. Elle remplace l’ancien système Excel par une solution moderne, ergonomique et sécurisée, adaptée à chaque profil utilisateur (direction, logistique, bureau).

## Fonctionnalités principales

- Gestion des entrées/sorties de pneus (ajout, retrait, mise à jour)
- Consultation rapide via scan QR code ou saisie manuelle
- Historique complet des mouvements (stockage, déstockage, écrasement…)
- Génération automatique de QR code pour chaque pneu ou casier
- Recherche avancée par numéro de châssis, casier, date, type d’action
- Gestion des rôles (direction, logistique, bureau)
- Sécurité : authentification, validation d’email, contrôle des accès

## Stack technique

- **Backend** : Laravel (PHP)
- **Base de données** : MySQL
- **Frontend** : HTML, CSS, JavaScript (jQuery, Bootstrap 5)
- **Librairies** : Génération/scan QR code (simple-qrcode, jsQR)
- **Outils** : FontAwesome, AOS


## Utilisation

- Accéder à l’application via [http://localhost:8000](http://localhost:8000)
- Se connecter avec un compte existant ou s’inscrire (validation d’email requise)
- Naviguer selon le rôle utilisateur (direction, logistique, bureau)
- Scanner un QR code pour consultation rapide ou gestion de stock


## Licence

Projet privé – Garage Mercedes-Benz Sierre
© 2025 Krizi Siwar
