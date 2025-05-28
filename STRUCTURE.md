```
users-stat/
├── src/
│   ├── Config/
│   │   └── usersstat.sidebar.php           # Sidebar configuration for SeAT navigation
│   ├── Http/
│   │   └── Controllers/
│   │       └── UsersStatController.php     # Main controller for user statistics
│   ├── Models/
│   │   ├── FleetAttendance.php             # Model for fleet attendance records
│   │   └── Pilot.php                       # Model for pilot information
│   └── ServiceProvider.php                 # Main service provider registering routes, views, migrations, config
├── database/
│   └── migrations/                         # Database migration files
├── resources/
│   └── views/                              # Blade templates for the module UI
├── routes/
│   └── web.php                             # Route definitions for the module
├── composer.json
├── README.md
```
- `src/ServiceProvider.php`: Registers routes, views, migrations, and configuration.
- `src/Config/usersstat.sidebar.php`: Configures the module’s appearance in the SeAT sidebar.
- `src/Http/Controllers/UsersStatController.php`: Handles logic for viewing and processing user statistics.
- `src/Models/`: Contains Eloquent models for database interaction.
- `database/migrations/`: Defines the database schema for the module.
- `resources/views/`: Blade templates for displaying module pages.
- `routes/web.php`: All HTTP routes for the module.

_Note: The structure may change in future versions. For the latest structure, check the [GitHub repository](https://github.com/vfjodorovs12/users-stat)._
