# Laravel Project Setup Guide

## Steps to Clone and Set Up the Iot platforme

### 1. Clone the Repository
```bash
git clone https://github.com/yahiaAnes/Iotapp
cd your-repository
```

### 2. Copy the `.env` File
```bash
cp .env.example .env
```

### 3. Install Dependencies
```bash
composer install
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Configure the Database
- You should create database on your local machine
- Open the `.env` file and update database credentials:
```env
DB_DATABASE=your_database
```
### 6. Run Migrations
```bash
php artisan migrate --seed
```
- this migrate the database and create the admin account
### 7. Install NPM Dependencies (This project is using react ts)
```bash
npm install
```

### 8. Serve the Application
```bash
php artisan serve
```
-this should take you to http://127.0.0.1:8000/admin/login

### 9. Login Credentials (If Seeded)
```text
Email: admin@admin.com 
Password: password
```
### 10. Change app name
- Open the `.env` file and change it from APP_NAME=


---

_Update the repository URL and credentials as needed._ 🚀
