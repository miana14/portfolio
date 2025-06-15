# Mon Portfolio Laravel

Ce projet est un **portfolio dynamique** développé avec **Laravel**, servant à présenter mes réalisations professionnelles, mes compétences, et permettre aux utilisateurs de me contacter ou demander un devis via une interface claire, moderne et responsive.

---

## Fonctionnalités principales

### Front Office
- Page d’accueil **one-page** avec sections dynamiques : Projets, Compétences, Contact.
- Page **détail de chaque projet** accessible via un lien unique.
- Formulaire de contact avec envoi d’e-mail via SMTP.
- Calculatrice de **devis estimatif dynamique**.

### Back Office (Admin)
- Tableau de bord dynamique avec **statistiques** (projets, services, devis, etc.).
- Gestion des **projets** (CRUD complet).
- Gestion des **services** proposés (CRUD complet).
- Gestion des **devis** envoyés via le front (CRUD lecture uniquement).
- Interface propre en **Tailwind CSS**, avec design responsive et moderne.
- Gestion du **profil utilisateur** et des paramètres généraux du site.
- Sidebar responsive fixe pour la navigation admin.

### Contact
- Formulaire de contact avec :
  - Validation côté serveur
  - Notification de succès/erreur
  - Envoi d’email via SMTP (testé avec Gmail)

### API
- Endpoint `GET /api` via **API Platform** (ou contrôleur API Laravel si standalone).
- JSON retournant tous les services, devis et projets disponibles.

---

##  Technologies utilisées

- **Laravel 10**
- **Blade** (moteur de template)
- **Tailwind CSS** pour le back-office
- **FontAwesome** pour les icônes
- **Chart.js** pour les graphiques du dashboard
- **Eloquent ORM**
- **SQLite** en développement
- **API REST** via contrôleurs Laravel
- **Mailable** pour le formulaire de contact
- **Seeder + Factory** pour les données de démonstration

---

## Installation & Lancement

### 1. Cloner le dépôt

```bash
git clone https://github.com/ton-utilisateur/portfolio.git
cd portfolio
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l’environnement

Copier le fichier `.env.example` :

```bash
cp .env.example .env
```

Générer la clé d'application :

```bash
php artisan key:generate
```

Configurer dans `.env` :
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=/chemin/vers/database/database.sqlite`
- `MAIL_MAILER=smtp`
- `MAIL_HOST=smtp.gmail.com`
- `MAIL_PORT=587`
- `MAIL_USERNAME=tonemail@gmail.com`
- `MAIL_PASSWORD=mot_de_passe_application`
- `MAIL_ENCRYPTION=tls`

Créer le fichier SQLite :

```bash
touch database/database.sqlite
```

### 4. Lancer les migrations et seeders

```bash
php artisan migrate:fresh --seed
```

### 5. Lier le dossier `storage`

```bash
php artisan storage:link
```

### 6. Démarrer le serveur

```bash
php artisan serve
```

---

## Accès admin

Un utilisateur admin peut être créé avec :
- Email : `admin@example.com`
- Mot de passe : `password` (via `tinker` ou enregistrement manuel)

---

## Structure principale

```
app/
    Http/Controllers/ (front, admin, api)
    Models/ (Project, Service, Skill, QuoteRequest)
resources/views/
    layouts/
    admin/
    public home.blade.php
routes/
    web.php
    api.php
database/
    migrations/
    seeders/
```

---

## Améliorations possibles

- Ajouter un système de **tracking de visiteurs**.
- Statistiques avancées dans le dashboard (visites réelles, évolution des projets).
- Intégrer une authentification API + documentation Swagger avec Laravel API Resources.
- Upload d’images sécurisé dans les projets.


