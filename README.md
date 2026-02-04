<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Задание:

Есть роут, который возвращает список заметок


Route::get('/api/notes', function () {<br>
    return response()->json([<br>
        ['id' => 1, 'title' => 'Первая'],<br>
        ['id' => 2, 'title' => 'Вторая'],<br>
    ]);<br>
]);<br>


Нужно реализовать следующий мидлвар:
- Проверяет наличие заголовка X-User-Role
- Если роль "admin" - доступ разрешён всегда
- Если роль "user" - доступ разрешён только в рабочее время (09:00–18:00)
- В остальных случаях — вернуть 403 Forbidden

Требования:
- Логику нельзя писать в контроллере
- В middleware нельзя напрямую возвращать данные, только управлять доступом
- Время нужно брать на стороне сервера
- Middleware должно быть переиспользуемым (не привязано к конкретному маршруту)


## Результат выполнения:
- Контроллеры не использовались
- Роут размещен в файле routes/api.php
- Класс посредник назван RoleChecking, размещён в папке app\Http\Middleware

## Как запустить проект:
1. Скачать проект
2. Скопировать файл .env.example, вставить рядом, переименовать в .env 
3. Выполнить команды:

 - <code>composer install</code>
 - <code>php artisan key:generate</code>
 - <code>php artisan serve</code>

Далее тестировать через программу Postman по адресу http://127.0.0.1:8000
