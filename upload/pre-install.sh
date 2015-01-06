#!/bin/bash
echo "Opencart Pre Install"

if [[ -f config.php ]]; then
echo "Catalog Config Found"
else
touch config.php
fi

if [[ -f admin/config.php ]]; then
echo "Admin Config Found"
else
touch admin/config.php
fi

echo "Setting up Permissions"
chmod -R 777 config.php
chmod -R 777 admin/config.php
chmod -R 777 image/
chmod -R 777 system/cache/
chmod -R 777 system/logs/
chmod -R 777 system/download/
chmod -R 777 system/upload/

echo "Pre Install Completed!!"
