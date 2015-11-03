echo "Updating Vendors...."
composer install --no-dev --optimize-autoloader
echo "Clear old cache...."
php app/console cache:clear --env=prod --no-debug
echo "Generate Assets...."
php app/console assetic:dump --env=prod --no-debug
echo "Done..."
