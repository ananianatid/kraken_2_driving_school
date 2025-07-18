# École de Conduite 

Ce projet est une application web développée avec le **framework Laravel** et utilisant **Filament PHP** pour l'interface d'administration. Il s'agit d'un système de gestion pour une auto-école, conçu pour faciliter la gestion des étudiants et potentiellement d'autres aspects liés à l'activité (bien que les sources fournies se concentrent principalement sur la gestion des étudiants).

## Installation et Utilisation

Pour configurer et lancer le projet sur votre machine après avoir cloné le dépôt Git, suivez les étapes ci-dessous :

### 1. Cloner le dépôt

Commencez par cloner le dépôt Git sur votre machine locale :
```bash
git clone https://github.com/ananianatid/kraken_2_driving_school.git
cd ananianatid-kraken_2_driving_school.git
```

### 2. Installer les dépendances PHP

Le projet utilise Composer pour gérer ses dépendances PHP. Installez-les en exécutant la commande suivante :
```bash
composer update
composer install
```
Cette commande installera les dépendances nécessaires au projet, y compris Laravel, Filament, et d'autres bibliothèques. Elle exécutera également des scripts post-installation importants.

### 3. Configurer l'environnement

Laravel nécessite un fichier d'environnement (`.env`) pour stocker les configurations spécifiques à votre installation (base de données, clés d'API, etc.). Un exemple de fichier est fourni :
```bash
cp .env.example .env
```
Ensuite, générez une clé d'application unique pour Laravel :
```bash
php artisan key:generate
```

### 4. Configurer et Migrer la Base de Données

Ce projet est configuré pour utiliser une base de données, potentiellement SQLite par défaut, mais vous pouvez le modifier dans votre fichier `.env` si vous préférez MySQL, PostgreSQL, etc..
Pour créer les tables de la base de données et les structures nécessaires, exécutez les migrations :
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