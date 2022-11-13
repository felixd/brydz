#!/bin/bash
echo "Files to root:root"
chown root:root * -R
git pull

echo "Rejestracja 1"
cd rejestracja1
npm run build
mkdir dist/app
echo "Rejestracja 2 PHP"
cp ../php_app/*.php dist/app
cd ..

echo "Rejestracja 2"
cd rejestracja2
npm run build
mkdir dist/app
echo "Rejestracja 2 PHP"
cp ../php_app/*.php dist/app
cd ..

echo "Files to www-data:www-data"
chown -R www-data:www-data *
