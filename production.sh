#!/bin/bash
echo "Files to root:root"
chown root:root * -R
git pull

echo "Rejestracja 1"
cd rejestracja1
npm run build
mkdir dist/app
echo "Rejestracja 1 PHP"
cp ../php_app/*.php dist/app
cp ../secrets/secrets1.php dist/app/secrets.php
cd ..

echo "Rejestracja 2"
cd rejestracja2
npm run build
mkdir dist/app
echo "Rejestracja 2 PHP"
cp ../php_app/*.php dist/app
cp ../secrets/secrets2.php dist/app/secrets.php
cd ..

echo "Files to www-data:www-data"
chown -R www-data:www-data *
