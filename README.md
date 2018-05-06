# Тестовое задание для 3davinci (Денисов Д.)


 Тестовое приложение для сохранения и обновления списка пользователей Github


Установка
---------------------------------

1) Склонировать себе репозиторий (например в папку test-app)
```
git clone https://github.com/denisov2/3davinci.git test-app
```

2) Перейти в папку test-app и запустить composer install
```
composer install
```
или в зависимости от окружения
```
php composer install
```

3) В корне проекта в файле .env указать настройки подключения к Базе Данных MySql, например
```
# .env
DB_HOST=127.0.0.1
DB_BASE=3davinci
DB_USER=root
DB_PASS=
```

4) Создать таблицу со следующей структурой
```
CREATE TABLE `user` (
  `github_id` int(11) UNSIGNED NOT NULL,
  `github_login` varchar(255) NOT NULL,
  PRIMARY KEY (github_id)
) ENGINE=InnoDB;
```

ЗАПУСК
---------------------------------

В командной строке набрать
php main run

```
php main run
```