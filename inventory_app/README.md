# Equipment Manager

Prosta aplikacja webowa do ewidencji wyposażenia firmy oparta o framework Slim oraz bazę MySQL.

## Wymagania
- PHP >= 8.2
- Composer
- MySQL

## Instalacja
1. Sklonuj repozytorium i przejdź do katalogu `inventory_app`.
2. Skopiuj plik `.env.example` do `.env` i uzupełnij dane dostępu do bazy.
3. Uruchom `composer install` aby pobrać zależności.
4. Utwórz bazę danych i zaimportuj plik `database/schema.sql`.
5. Uruchom wbudowany serwer PHP:
   ```bash
   php -S localhost:8080 -t public
   ```
6. Aplikacja będzie dostępna pod `http://localhost:8080`.

### Uwaga
Jeśli po uruchomieniu zobaczysz błąd o braku klasy `Dotenv`, upewnij się, że
wszystkie zależności zostały zainstalowane poleceniem `composer install` i w
katalogu znajduje się folder `vendor`.

## Struktura projektu
- `public/` – pliki dostępne publicznie (index.php, zasoby statyczne)
- `src/` – kontrolery i modele
- `database/` – plik z definicją bazy

## Rozwój
Możesz rozbudować aplikację o dodatkowe moduły, autoryzację użytkowników czy panel administracyjny.
