# PHP-MVC Project

## Description
This is a simple PHP-MVC project designed to demonstrate the basic structure and flow of an MVC application. The project includes user authentication (login and registration) and a dashboard view.

## Installation
To install and run the project, follow these steps:
1. Clone the repository: git clone https://github.com/BasharHabsh/PHP-MVC.git
2. Navigate to the project directory: cd PHP-MVC
3. Install dependencies using Composer: composer install
4. Set up the environment variables:
    - Rename the `.env.example` file to `.env`
    - Set the `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS` variables to the values of your MySQL database

## Usage
1. Start the development server using the following command: php -S localhost:8000 -t public
2. Open your web browser and navigate to `http://localhost:8000`.
3. Navigate to `http://localhost:8000/login` to view the login page.
4. Navigate to `http://localhost:8000/register` to view the registration page.
5. After successful login, you will be redirected to the dashboard.

## Project Structure
The project is structured as follows:
- `config/`: Contains configuration files such as `database.php`.
- `public/`: The public directory that includes the main entry point (`index.php`).
- `src/`: Contains the source code of the project.
    - `controllers/`: Includes controllers like `DashboardController.php` and `FormHandler.php`.
    - `models/`: Contains the data models such as `User.php`.
    - `views/`: Holds the view files.
        - `auth/`: Contains authentication views (`login.php`, `register.php`).
        - `dashboard/`: Contains the dashboard view (`index.php`).
- `vendor/`: Directory for Composer dependencies.
- `.env`: Environment variables file.
- `composer.json`: Composer configuration file.
- `composer.lock`: Composer lock file.

## Contributing
We welcome contributions from the community! If you have any suggestions or find any bugs, please feel free to open an issue or submit a pull request.







