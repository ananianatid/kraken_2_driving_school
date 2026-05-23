# Kraken 2 Driving School (v2)

Application web de gestion d'auto-cole (version 2 / reecriture de driving_school). Gere les eleves, permis, cartes d'identite, periodes, resultats et presence via un tableau de bord Filament.

## Stack technique

- PHP 8.2+
- Laravel 12
- Filament PHP 3 (admin panel)
- Tailwind CSS 4 / Vite

## Etat d'avancement

MVP -- structure de ressources comprehensive en place.

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
```

## Demarrage

```bash
npm run dev &
php artisan serve
```
```bash
php artisan migrate --graceful
```

Si vous souhaitez peupler la base de données avec des données de test (factories et seeders sont disponibles):
```bash
php artisan db:seed # ou php artisan db:seed --class=StudentSeeder pour des seeders spécifiques
```

### 5. Lancer les serveurs de développement

Le projet étant une application web Laravel avec des assets frontend gérés par Vite, vous devrez lancer deux serveurs distincts :

*   **Serveur Laravel :** Pour servir l'application PHP.
    ```bash
    php artisan serve
    ```

*   **Serveur Vite :** Pour compiler et servir les assets CSS et JavaScript.
    ```bash
    npm install # Si ce n'est pas déjà fait, pour installer les dépendances Node.js
    npm run dev
    ```

Alternativement, vous pouvez utiliser la commande `dev` définie dans `composer.json` pour lancer les deux serveurs simultanément, ainsi que la queue et les logs:
```bash
composer run dev
```

Une fois ces étapes terminées, votre application devrait être accessible via l'URL fournie par `php artisan serve` (généralement `http://127.0.0.1:8000`).

---