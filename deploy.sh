#!/bin/bash
git pull
npm run build
mkdir dist/cezar
cp ../cezar.php dist/index.php
