# 🎓 Student Management System

A web-based **Student Management System** built with **Laravel** to manage students, courses, authentication, profiles, and REST APIs.

## 🚀 Features

* 🔐 User Registration & Login
* 👤 User Profile Management
* 🎓 Student CRUD Operations
* 📚 Course Management
* 🔗 Student–Course Relationship
* 🛡️ Role-Based Access
* 🖼️ Student Profile Image
* 🌐 RESTful API
* 🔑 Laravel Sanctum API Authentication
* ✅ API Request Validation
* 📦 API Resources
* 🗄️ Database Migrations & Seeders

## 🛠️ Technologies Used

* **Laravel**
* **PHP**
* **MySQL / SQLite**
* **Blade**
* **Bootstrap / CSS**
* **JavaScript**
* **Laravel Sanctum**
* **REST API**
* **Composer**
* **NPM**

## 📂 Project Structure

```text
Student-Management-System/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   ├── Requests/
│   │   └── Resources/
│   └── Models/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── public/
├── config/
├── tests/
├── composer.json
└── package.json
```

## 🔌 REST API

The project includes RESTful APIs for student management.

### Student API

| Method | Endpoint             | Description      |
| ------ | -------------------- | ---------------- |
| GET    | `/api/students`      | Get all students |
| POST   | `/api/students`      | Create a student |
| PUT    | `/api/students/{id}` | Update a student |
| DELETE | `/api/students/{id}` | Delete a student |

### Authentication API

The project also uses **Laravel Sanctum** for secure API authentication.

Protected API routes require a valid Sanctum authentication token.

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/themeerdev/Laravel-Journey.git
```

### 2. Open the Project

```bash
cd Laravel-Journey
```

If the project is being maintained as the `Student-Management-System` directory locally, open that directory before running Laravel commands.

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Create Environment File

```bash
cp .env.example .env
```

On Windows, you can also copy `.env.example` manually and rename it to `.env`.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Configure Database

Update the database settings in `.env`.

Example:

```env
DB_CONNECTION=sqlite
```

Or configure MySQL according to your local environment.

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Start Laravel Server

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

## 🧪 API Testing

The APIs can be tested using tools such as:

* Postman
* PowerShell
* Thunder Client
* Any REST API client

Example:

```text
GET /api/students
```

## 🔐 Security

The project uses:

* Laravel authentication
* Laravel Sanctum
* Request validation
* Authentication middleware
* Protected API routes

Sensitive environment configuration should remain inside `.env` and should **not** be committed to GitHub.

## 📸 Screenshots

Screenshots of the application can be added here to showcase:

* Login/Register
* Dashboard
* Student List
* Add Student
* Edit Student

Example:

![Register](image.png)
![Login](image-1.png)
![Dashboard](image-2.png)
![Student List](<Screenshot 2026-08-12 235314.png>)
![Add Student](image-3.png)
![Edit Student](<Screenshot 2026-08-12 235356.png>)


## 🔌 API Testing

### GET /api/students

![GET Students API](<Screenshot 2026-08-17 000356.png>)

### POST /api/students

![POST Students API](image-5.png)

### PUT /api/students/{id}

![PUT Students API](image-6.png)

### DELETE /api/students/{id}

![DELETE Students API](image-7.png)

## 📚 Learning Goals

This project was developed as part of a Laravel learning journey to practice:

* MVC architecture
* CRUD operations
* Eloquent ORM
* Relationships
* Authentication
* Middleware
* Form validation
* REST API development
* Laravel Sanctum
* Git & GitHub

## 👩‍💻 Author

**Meerab**

Computer Science Student
Interested in Laravel, Full-Stack Development and AI.

## ⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.
