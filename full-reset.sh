echo "Clearing production cache..."
php app/console cache:clear --env=prod --no-debug
echo "Generating new assets...."
php app/console assetic:dump --env=prod --no-debug
echo "Done..."

