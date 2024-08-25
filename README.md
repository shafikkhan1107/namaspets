# Namaspets

Namaspets is a PHP-based e-commerce platform designed to help you manage and grow your online pet store. It provides a range of features to streamline your business operations, from product management to customer interactions.

## Features

- **Product Management**: Easily add, update, and remove products.
- **Shopping Cart**: A user-friendly shopping cart for customers to manage their purchases.
- **Order Management**: Track and manage orders efficiently.
- **User Accounts**: Secure user authentication and account management.
- **Payment Integration**: Support for various payment gateways.
- **Responsive Design**: Optimized for both desktop and mobile devices.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or Nginx server
- Composer

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/namaspets.git
    ```

2. Navigate to the project directory:
    ```bash
    cd namaspets
    ```

3. Install dependencies using Composer:
    ```bash
    composer install
    ```

4. Create a `.env` file by copying the example:
    ```bash
    cp .env.example .env
    ```

5. Configure your database settings in the `.env` file.

6. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

- Access the application at `http://localhost:8000` in your web browser.
- Admin dashboard can be accessed at `http://localhost:8000/admin`.



## Contact

For any questions or feedback, please reach out to shafikkhan1107@gmail.com(mailto:shafikkhan1107@gmail.com).


