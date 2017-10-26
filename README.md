# PHP CRUD API

- connected to Endora innoDb
- work with example table "Zamestnanec"
- run in localhost:8080 `php -S 127.0.0.1:8080`

##### GET /table/read.php
return: array of table objects


##### POST /table/create.php
body: raw object

##### POST /table/update.php
body: raw object with required id

##### POST /table/delete.php
body: raw object with required id
