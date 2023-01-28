<p align="center">
<img src="info/logo.png">
</p>
 
## Admin Winda
Кароч изи пакет для админки. Просто тупо шаблон. Не каких функций, нефига нет.
   

## Установка
1) Установить из композера 
```  
composer require slavawins/adminwinda
```

2) Опубликовать js файлы, вью и миграции необходимые для работы пакета.
Вызывать команду:
   ```
   php artisan vendor:publish --provider="SlavaWins\AdminWinda\Providers\AdminWindaServiceProvider"
   php artisan vendor:publish --provider="SlavaWins\EasyAnalitics\Provid[AuthenticateAdmin.php](src%2Fcopy%2FMiddleware%2FAuthenticateAdmin.php)ers\EasyAnaliticsServiceProvider"
   ``` 




4) В роутере routes/web.php удалить:
 добавить
 ```
    use SlavaWins\AdminWinda\Library\AdminWindaRoute;
    Route::group(['middleware' => 'auth_admin'], function () { 
        AdminWindaRoute::routes(); 
    });
    
 ``` 

Что бы пользоватеься правами мидлвери, добавьте это в app\Http\Kernel.php
 ```
 protected $routeMiddleware = [
        'auth_admin' => \App\Http\Middleware\AuthenticateAdmin::class,
    
 ``` 

 <BR> Дотсуп пользвоателя к админке защищен middleware. И требует что у user был параметр is_admin=true
 <BR> Найти это можно в middleware - auth_admin. Можно найти его в Http/Middleware/AuthenticateAdmin.
<BR> Можно просто октлючить на крайняк


 Если вы хотите что бы адмника была не по адресу /admin то добавьте в енв это
 ```
   ADMIN_URL=xzrandomadminurl
 ``` 



5) Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
