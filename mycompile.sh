php bin/magento maintenance:enable
php -d memory_limit=10G bin/magento setup:upgrade
php -d memory_limit=10G bin/magento setup:di:compile
php -d memory_limit=10G bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
# php -d memory_limit=10G bin/magento indexer:reset
# php -d memory_limit=10G bin/magento indexer:reindex
php bin/magento maintenance:disable
chmod -R 777 var/