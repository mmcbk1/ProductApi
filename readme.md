1. instalujemy paczki z composera
2. towrzymy bazę danych products
3. wprowadzamy konfigurację do pliku .env np.
4. DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=products
   DB_USERNAME=root
   DB_PASSWORD=
   
5. inicjujemy baze danych php artisan migrate --seed