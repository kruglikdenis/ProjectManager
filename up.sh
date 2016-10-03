#!/bin/bash

# забираем изменения из git
git pull

if [ $? -eq 0 ]; then
    # выполняем миграции
    php app/console doctrine:migrations:migrate

    if [ $? -eq 0 ]; then
        # чистим кеш
        php app/console cache:clear
        php app/console cache:clear --env=prod
    else
        echo Migration fail
    fi
else
    echo Git fail
fi