users-stat/
├── src/
│   ├── Config/
│   │   └── usersstat.sidebar.php           # Конфиг для отображения в сайдбаре SeAT
│   ├── Http/
│   │   └── Controllers/
│   │       └── UsersStatController.php     # Контроллер модуля
│   ├── Models/
│   │   ├── FleetAttendance.php             # Модель посещаемости флотов
│   │   └── Pilot.php                       # Модель пилота
│   └── ServiceProvider.php                 # Главный сервис-провайдер пакета
├── database/
│   └── migrations/                         # Миграции для БД
├── resources/
│   └── views/                              # Blade-шаблоны модуля
├── routes/
│   └── web.php                             # Роуты модуля
├── composer.json
├── README.md
