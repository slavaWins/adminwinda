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
   ``` 



4) В роутере routes/web.php удалить:
 добавить
 ```
    AdminWindaRoute::routes();
 ``` 



5) Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
