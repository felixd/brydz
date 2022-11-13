#!/bin/bash
chown root:root * -R
git pull

cd rejestracja1
npm run build
mkdir dist/app
cp ../app/*.php dist/app
cd ..

cd rejestracja2
npm run build
mkdir dist/app
cp ../app/*.php dist/app
cd ..

chown -R www-data:www-data *
