# HomeServerProject

This is a project to run basic filedump home website using raspberry pi. 

Features so far are following:
-password and direct request protection
-User-database
-Uploading and viewing of basic image files (PNG,JPEG,PNP)
-Search feature to find specific file uploaded in the server

Passwords are generated hashes using php-hash library and stored in the database.db
The database.db file in this projects directory includes an example to show what form the data should be stored to the database
in order for it to work in the project. 

Displaying all images in a directory was made modifying the following github project by mikelothar:
https://github.com/mikelothar/show-all-images-in-a-folder-with-php

The server is currently running with apache2 at https://juhonkotiserveri.ddns.net

Languages used: PHP, Javascript, CSS, SQLite and HTML.
