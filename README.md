# 🏥 Achour Ziane Hospital Management System

A comprehensive hospital management system built with **Laravel 8** and **MySQL**, designed for managing patient flow from triage to lab tests, X-rays, and room assignments.

## ✨ Features

- **Role-Based Access**: Admin, Doctor, Lab Worker, X-ray Worker
- **Patient Management**: Full CRUD with triage workflow (Medical & Surgical departments)
- **Lab Module**: Request tests, enter results, send to doctor
- **X-ray Module**: Request imaging, upload results with reports
- **Room Management**: Treatment, Children, Trauma, Dental, Isolation, Hospital rooms
- **Announcements**: Admin-managed notification system
- **Arabic Interface**: Full RTL support

## 🛠️ Tech Stack

- **Backend**: Laravel 8 (PHP 8.x)
- **Database**: MySQL
- **Frontend**: Blade Templates + CSS

## 🚀 Installation

```bash
# Clone the repository
git clone https://github.com/YOUR_USERNAME/Achour_Ziane_Hospital.git
cd Achour_Ziane_Hospital

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Import database
mysql -u root -p hospital_db < hospital_db.sql

# Run the server
php artisan serve
```

## 📦 Database

The `hospital_db.sql` file is included in the root directory. Import it to set up the complete database schema with sample data.

### Tables
| Table | Description |
|-------|-------------|
| `users` | System users with roles |
| `patients` | Patient records |
| `lab_requests` | Lab test requests & results |
| `xray_requests` | X-ray requests & reports |
| `announcements` | System announcements |
| `notifications` | Real-time notifications |
| `rooms` / `room_assignments` | Room management |

## 👥 Default Users

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@hospital.dz | password |
| Doctor | ahmed@hospital.dz | password |

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
