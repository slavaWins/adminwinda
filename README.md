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
   php artisan vendor:publish --provider="SlavaWins\EasyAnalitics\Providers\EasyAnaliticsServiceProvider"
   ``` 




4) В роутере routes/web.php удалить:
 добавить
 ```
    AdminWindaRoute::routes();
 ``` 




 Если вы хотите что бы адмника была не по адресу /admin то добавьте в енв это
 ```
   ADMIN_URL=xzrandomadminurl
 ``` 



5) Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
