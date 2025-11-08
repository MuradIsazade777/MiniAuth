# 🔐 MiniAuth – Lightweight PHP JWT Authentication API 
   
![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Built with PHP](https://img.shields.io/badge/built%20with-PHP%208-orange) 
![Status](https://img.shields.io/badge/status-active-success)  
![SQLite](https://img.shields.io/badge/storage-SQLite-lightgrey) 
 
MiniAuth is a minimalist, secure backend authentication system built with pure PHP and SQLite. It uses JWT tokens to protect API endpoints and offers a clean, modular structure ideal for small projects, prototypes, or educational use. 
  
## 🚀 Features 

- ✅ Register & Login endpoints
- 🔐 JWT token generation and validation
- 🗂️ SQLite-based user storage
- ⚡ Fast, lightweight, no frameworks 
- 📁 Modular file structure (6–7 files, ~70 lines of code)

---

## 📦 Requirements

- PHP 8+
- SQLite enabled (`pdo_sqlite`)
- Git Bash or any terminal with PHP CLI

---

## 🧪 API Endpoints
 
### 🔐 Register
```http
POST /register
Content-Type: application/json

{
  "username": "murad",
  "password": "123456"
}
🔑 Login
http
POST /login
Content-Type: application/json

{
  "username": "murad",
  "password": "123456"
}
```

👤 Profile (Protected)
```http
GET /profile
Authorization: Bearer <JWT_TOKEN>
🛠️ Run Locally
bash
php -S localhost:8000
Test with curl or Postman.
```
📄 License
This project is licensed under the MIT License. See LICENSE for details.

✨ Author
Murad Isazade Backend Architect & Full-Stack Developer

🌟 Star this repo if you find it useful!
