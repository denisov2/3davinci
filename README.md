# 3davinci

<p align="center">

    <h1 align="center">Тестово приложение для сохранения и обнавления списка пользователей Github</h1>

</p>

Установка
---------------------------------
Выполнить команду


php composer require denisov2/3davinci


Или добавить в секцию require composer.json

```
"denisov2/3davinci": "*",
```

И выполнить

```
php composer update
```

ЗАПУСК:
В командной строке набираем
php main run

Далее, мигрируем базу:

```
php main migrate
