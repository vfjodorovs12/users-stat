# Users Stat

Users Stat is a plugin module for the SeAT platform that provides extended statistical insights and reporting features for user activity. The module integrates with SeAT, adding custom routes, views, and database migrations to enable advanced user data analysis and visualization.

## Features

- Registers custom routes for module-specific functionality
- Loads dedicated views under the `usersstat` namespace
- Applies necessary database migrations for user statistics storage
- Integrates configuration options for sidebar navigation in SeAT
- Provides essential metadata for package management and repository linking

## Installation

1. **Require the package via Composer**:

   ```bash
   composer require vfjodorovs12/users-stat
   ```

2. **Publish configuration, views, and migrations (if required):**

   ```bash
   php artisan vendor:publish --provider="Vfjodorovs12\UsersStat\ServiceProvider"
   ```

3. **Run the migrations:**

   ```bash
   php artisan migrate
   ```

4. **Configure the module in SeAT as needed.**

## Repository

- **GitHub:** [https://github.com/vfjodorovs12/users-stat](https://github.com/vfjodorovs12/users-stat)
- **Packagist:** [vfjodorovs12/users-stat](https://packagist.org/packages/vfjodorovs12/users-stat)

## License

This project is open-sourced software licensed under the MIT license.
