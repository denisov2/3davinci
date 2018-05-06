# Тестовое задание для 3davinci (Денисов Д.)


 Тестово приложение для сохранения и обнавления списка пользователей Github</h1>


Установка
---------------------------------

1) Клонируем себе репозиторий (например в папку test-app)

```
git clone https://github.com/denisov2/3davinci.git test-app
```

2) Перейти в папку test-app и запустить composer install

```
composer install
или в зависимости от окружения
php composer install
```

3) В корне проекта в файле .env указываем настройки подключения к Базе Данных MySql
```
# .env
DB_HOST=127.0.0.1
DB_BASE=3davinci
DB_USER=root
DB_PASS=
```

4) Создаем таблицу со следубщей структурой
```
CREATE TABLE `user` (
  `github_id` int(11) UNSIGNED NOT NULL,
  `github_login` varchar(255) NOT NULL,
  PRIMARY KEY (github_id)
) ENGINE=InnoDB;
```

ЗАПУСК
---------------------------------

В командной строке набираем
php main run

```
php main migrate
```