Інструкція по встановленню

1. Клонувати репозиторій
2. Запустити 'composer setup'
   - Для нього потрібно мати встановлений composer + php
   - У межах сетап відбудеться встановлення пакетів, створення .env файлу та генерація ключа
   - Можлива помилка генерації ключа. Якщо це трапиться, треба після підняття проекту
   в докер-композ по ссш під'єднатися до пхп контейнера "docker exec -it <container_name> bash"
   і там виконати "php artisan key:generate --ansi"
3. Підняти проект через докер-композ "docker-compose up" або "docker-compose up -d".
   Процес може зайняти деякий час
   - у межах підняття буде виконана міграція у файлі "run.sh" 
4. Після підняття проекту потрібно зробити "npm run dev" для компіляції фронтенду
"npm run dev" можна робити як на робочій машині, так і в середині контейнера
