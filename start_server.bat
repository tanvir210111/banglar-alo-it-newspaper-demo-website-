@echo off
title News Website Server (Localhost)
echo ===================================================
echo Starting MariaDB Database in WSL...
echo ===================================================
wsl -u root service mariadb start

echo ===================================================
echo Starting PHP Web Server on http://localhost:8000
echo ===================================================
start http://localhost:8000

cd /d "%~dp0news1"
"C:\Users\tanvi\php82\php.exe" -S 127.0.0.1:8000 server.php
pause

