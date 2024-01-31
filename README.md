# Фонд капитального ремонта многоквартирных домов Рязанской области

## Установка

1. **Клонировать репозиторий:**

    ```bash
    git clone https://github.com/BlazEffect/fondkr62.ru.git
    ```

2. **Перейти в директорию проекта:**

    ```bash
    cd fondkr62.ru
    ```

3. **Установить зависимости:**

    ```bash
    composer install
    ```

4. **Установить npm зависимости**

    ```bash
    npm install
    ```

5. **Скопировать файл `.env.example` в `.env` и настроить базу данных и другие параметры:**

    ```bash
    cp .env.example .env
    ```

6. **Сгенерировать ключ приложения:**

    ```bash
    php artisan key:generate
    ```

7. **Запустить миграции:**

    ```bash
    php artisan migrate
    ```

8. **Запустить vite**

    ```bash
    npm run dev
    ```

9. **Запустить локальный сервер:**

    ```bash
    php artisan serve
    ```

## Сборка стилей для продакшена

```bash
npm run build
```

## Использование

Этот проект разработан и протестирован с использованием PHP 8.2 и NodeJs 18.16.0

Если у вас возникли проблемы совместимости или вы хотите использовать другую версию PHP или Node, убедитесь, что ваша среда соответствует указанной версии.

Для установки необходимой версии PHP, вы можете использовать [инструкции по установке PHP](https://www.php.net/manual/ru/install.php).<br>
Для установки необходимой версии NodeJs, вы можете использовать [инструкции по установке NodeJs](https://nodejs.org/en/learn/getting-started/how-to-install-nodejs).
