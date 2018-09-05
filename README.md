# rapd-shopping-list
Web-based collaborative shopping list

## Quick start
```sh
composer install
rm app.sqlite3 ; php gensql.php | sqlite3 app.sqlite3 && php setup.php
grep -i -e username -e password setup.php
php -S localhost:8080 --docroot=public/ &
```
