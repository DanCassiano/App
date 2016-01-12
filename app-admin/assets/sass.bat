@echo off
title SASS APP

cd /wamp/www/app/app-admin/assets

sass --watch scss/app.scss:css/app.css --style compressed --no-cache
