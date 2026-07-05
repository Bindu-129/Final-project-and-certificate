# 📝 Blog Management System

A secure and responsive Blog Management System developed using **PHP**, **MySQL**, **HTML**, **CSS**, and **Bootstrap**. This project was built as part of the **ApexPlanet Software Pvt. Ltd. Internship – Task 5 (Final Project)**.

---

## 📌 Features

- 👤 User Registration
- 🔐 Secure User Login & Logout
- 🔒 Password Hashing using `password_hash()`
- ✅ Password Verification using `password_verify()`
- 👨‍💼 Role-Based Access (Admin/User)
- ✍️ Create Blog Posts
- 📖 View Blog Posts
- 📝 Edit Blog Posts (Admin)
- 🗑️ Delete Blog Posts (Admin)
- 🔍 Search Blog Posts
- 📄 Pagination
- 🛡️ SQL Injection Protection using Prepared Statements
- 🛡️ XSS Protection using `htmlspecialchars()`
- 📱 Responsive Design using Bootstrap 5
- 🔑 Session Management

---

## 🛠️ Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- XAMPP
- phpMyAdmin

---

## 📂 Project Structure

```
blog-app/
│── db.php
│── register.php
│── login.php
│── logout.php
│── session.php
│── dashboard.php
│── create.php
│── edit.php
│── delete.php
│── index.php
│── search.php
│── README.md
│
├── css/
│   └── style.css
│
└── uploads/
```

---

## ⚙️ Installation
1. Install XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy the project folder into:

```
```
4. Open phpMyAdmin.
5. Create a new database:

```
blog
```
6. Import the SQL file into the database.

7. Update `db.php` with your database credentials if needed.

8. Open your browser and visit:

```
http://localhost/blog-app/
```

---
## 👨‍💼 Default Admin

Example:

| Username | Role |
|----------|------|
| bindu | Admin |

> Register users with hashed passwords using the application or insert them into the database with hashed passwords.

---
## 🔒 Security Features

- Password hashing using `password_hash()`
- Password verification using `password_verify()`
- Prepared Statements to prevent SQL Injection
- XSS Protection using `htmlspecialchars()`
- Session-based Authentication
- Role-Based Authorization
- Delete Confirmation Dialog

---
## 📸 Project Screenshots

Add screenshots of:

- Registration Page
- Login Page
- Dashboard
- Create Blog
- Blog List
- Edit Blog
- Search Feature

---
## 🎯 Learning Outcomes

Through this project I learned:

- PHP CRUD Operations
- MySQL Database Integration
- User Authentication
- Session Management
- Role-Based Authorization
- Web Application Security
- Bootstrap UI Design
- Database Connectivity using Prepared Statements

