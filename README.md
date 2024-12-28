# Inventory Management System API

The **Inventory Management System API** is a Laravel-based backend application designed to manage multiple inventories, transactions, and subscriptions. It supports user roles, stock tracking, supplier management, and a subscription-based system. This API is secured using Laravel Sanctum and designed for integration with a ReactJS frontend.

---

## Features

- **User Authentication**: Role-based access control using Laravel Sanctum.
- **Inventory Management**: Create and manage multiple inventories per subscription.
- **Stock Transactions**: Record stock in, stock out, and adjustments.
- **Subscription System**: Subscription-based system with inventory limits.
- **Activity Logs**: Logs for auditing user actions.
- **API Versioning**: Supports scalable and versioned APIs.

---

## Installation

### 1. Clone the Repository

```bash
git clone <repository_url>
cd inventory-management-api
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

- Copy the example environment file:
  ```bash
  cp .env.example .env
  ```
- Configure your database and application settings in the `.env` file.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Seed the Database

```bash
php artisan db:seed
```

### 7. Start the Application

```bash
php artisan serve
```

---

## API Endpoints

### **Authentication**
- `POST /api/v1/login` - User login (email and password).

### **Protected Routes (Require Bearer Token)**
- **Users**:
  - `GET /api/v1/users` - List all users.
  - `POST /api/v1/users` - Create a new user.
- **Inventories**:
  - `GET /api/v1/inventories` - List all inventories.
  - `POST /api/v1/inventories` - Create a new inventory.
- **Transactions**:
  - `GET /api/v1/transactions` - List all transactions.
  - `POST /api/v1/transactions` - Record a stock transaction.
- **Roles**:
  - `GET /api/v1/roles` - List all roles.
  - `POST /api/v1/roles` - Create a new role.

---

## Technologies Used

- **Backend**: Laravel 11
- **Authentication**: Laravel Sanctum
- **Database**: MySQL
- **Versioning**: API versioning with `v1` prefix.

---

## Future Enhancements

- Advanced analytics for inventories and transactions.
- Integration with a ReactJS frontend.
- Multi-language support.

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
