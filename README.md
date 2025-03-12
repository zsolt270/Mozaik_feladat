# PHP fejlesztő munkakör feladat - Balogh Zsolt

Ez a repo tartalmazza a megoldásomat a PHP fejlesztő munkakör feladathoz.

### Telepítés

1.  **A projekt klónozása**

    ```bash
    git clone https://github.com/<username>/<project-name>.git
    ```

2.  **Composer csomagok telepítése**

    ```bash
    composer install
    ```

3.  **NPM csomagok telepítése**

    ```bash
    npm install
    ```

4.  **Környezeti változók beállítása**

    ```bash
    cp .env.example .env
    ```

    Továbbá a .env fájlba az adatbázis adatainak konfigurálása:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mozaik_feladat
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Migrációk futtatása, adatbázis seedeléssel**

    ```bash
    php artisan migrate --seed
    ```

6.  **Futtatás**

    ```bash
    npm run dev
    ```
