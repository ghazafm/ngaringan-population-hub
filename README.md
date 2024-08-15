# Population Administration System for Ngaringan Village

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![License](https://img.shields.io/badge/license-MIT-blue)

## 📑 Table of Contents
- [Meet Our Team](#meet-our-team)
- [Project Description](#-project-description)
- [Main Features](#-main-features)
- [Tech Stack](#-tech-stack)
- [How to Start the Project](#-how-to-start-the-project)
- [Default Admin User](#-default-admin-user)
- [Accessing phpMyAdmin](#-accessing-phpmyadmin)
- [License](#-license)
- [Contact](#-contact)

## Meet Our Team

1. **Fauzan Ghaza Madani** - Product Manager
2. **Meisha Putradewan** - Backend Developer
3. **Mochammad Rasya Dimas Chamda** - Backend Developer
4. **Hernando Atha** - Frontend Developer

## 🚀 Project Description

The **Population Administration System for Ngaringan Village** is a comprehensive web application designed to streamline the management of population data in Ngaringan Village, Blitar Regency. This platform centralizes various types of data, including resident records, family cards, housing information, and health data for pregnant women. It serves as a vital tool for village administrators (supervisors) and dasawisma (data inputters), offering a streamlined approach to data entry, management, and oversight.

## ⭐ Main Features

**Admin:**
- User Role and Permission Management
- Data Oversight and Validation
- Dashboard Reporting
- Comprehensive Data Management (Residents, Family Cards, Housing)
- Health Data Administration (Pregnant Women)
- Data Analysis and Reporting

**Dasawisma:**
- Area-specific Data Input
- Access to Data Entry Dashboard

## 🛠️ Tech Stack

- **Frontend:**
  - ![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
  - ![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
  - ![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
  - ![JavaScript](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)

- **Backend:**
  - ![Laravel](https://img.shields.io/badge/Laravel-FB5034?style=for-the-badge&logo=laravel&logoColor=white)
  - ![Filament](https://img.shields.io/badge/Filament-FF3C7C?style=for-the-badge&logo=laravel&logoColor=white)
  - ![Sail](https://img.shields.io/badge/Laravel%20Sail-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

- **Database:**
  - ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
  - ![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white)

- **Cloud Services:**
  - ![Cloudflare](https://img.shields.io/badge/Cloudflare-F38020?style=for-the-badge&logo=Cloudflare&logoColor=white)

- **Containerization:**
  - ![Docker](https://img.shields.io/badge/Docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)

## 🚀 How to Start the Project

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ghazafm/ngaringan-population-hub.git
   ```

2. **Navigate to the Project Folder**
   Open your command line and go to the project directory.

3. **Create and Configure the `.env` File**
   Copy `.env.example` to create a new `.env` file and update it with your local database settings.

4. **Install PHP Dependencies**
   ```bash
   composer install
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```
   or
   ```bash
   ./script/migrate_all.zsh
   ```

6. **Seed the Database with Dummy Data** (Optional)
   To seed the database using Laravel Sail, modify `docker-compose.yml` to include the `DB_SEED` environment variable:
   ```yaml
   environment:
       ...
       DB_SEED: true
   ```
   Then start Sail:
   ```bash
   ./vendor/bin/sail up
   ```
   Or manually seed:
   ```bash
   ./vendor/bin/sail artisan db:seed
   ```

7. **Install JavaScript Dependencies**
   ```bash
   npm install
   ```

8. **Build Assets**
   ```bash
   npm run build
   ```

9. **Generate the Application Key** (if needed)
   ```bash
   php artisan key:generate
   ```

10. **Start Laravel Sail**
    ```bash
    ./vendor/bin/sail up
    ```

11. **Start Working**
    You’re now set up and ready to begin working on the project!

## 🔑 Default Admin User

A default admin user is created automatically during initialization. Credentials:
- **Email:** admin@ngaringan.com
- **Password:** adminuser

## 🌐 Accessing phpMyAdmin

Navigate to `http://localhost:8080` in your web browser and log in with:
- **Username:** The database username in `.env`
- **Password:** The database password in `.env`

## 📜 License

This project is licensed under the [MIT License](LICENSE).

## 📬 Contact

For more information, you can contact:
- Fauzan Ghaza Madani: [contact@fauzanghaza.com](mailto:contact@fauzanghaza.com)
