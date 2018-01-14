Create a database named database.db (the name can be changed in classes/Login.php)

Create a Table named users with name as primary key and id as unique value
Create a Table named passwords with id as primary key and pwd_hash as binary(60)

The hashes for the passwords were generated using PHP-hash function
http://php.net/manual/en/function.hash.php

Currently the project is implemented in a way that users and hashes have to be made and inserted in the database manually.
