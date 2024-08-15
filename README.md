# Administrasi Kependudukan Desa Ngaringan

## Meet Our Team

1. **Fauzan Ghaza Madani** - Backend Developer, Product Manager
2. **[Your Team Members]** - [Their Roles]

## Project Description

Administrasi Kependudukan Desa Ngaringan is a web application designed to streamline the administration of population data in Ngaringan Village, Blitar Regency. This platform centralizes the management of resident data, family cards, housing information, and health data for pregnant women. It is intended for use by village administrators (supervisors) and dasawisma (data inputters).

## Tech Stack

- **Frontend:**
  - ![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
  - ![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
  - ![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
  - ![JavaScript](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)

- **Backend:**
  - ![Laravel](https://img.shields.io/badge/Laravel-FB5034?style=for-the-badge&logo=laravel&logoColor=white)
  - ![Filament](https://img.shields.io/badge/Filament-FF3C7C?style=for-the-badge&logo=laravel&logoColor=white)

- **Database:**
  - ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
  - ![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white)

- **Cloud Services:**
  - ![Cloudflare](https://img.shields.io/badge/Cloudflare-F38020?style=for-the-badge&logo=Cloudflare&logoColor=white)

- **Containerization:**
  - ![Docker](https://img.shields.io/badge/Docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)

## How to Start the Project

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   ```

2. **Navigate to the Project Folder**
   Open your command line and go to the project directory.

3. **Create and Configure the `.env` File**
   Copy `.env.example` to create a new `.env` file and update it with your local database settings.

4. **Install PHP Dependencies**
   ```bash
   composer install
   ```

5. **Generate the `vendor` Folder**
   Wait until the `vendor` folder is created.

6. **Run Migrations**
   ```bash
   php artisan migrate
   ```
   or
   ```bash
   ./script/migrate_all.zsh
   ```
   (Use the second command if the previous one doesn't apply changes to your database.)

7. **Seed the Database with Dummy Data**
   ```bash
   php artisan db:seed
   ```

8. **Install JavaScript Dependencies**
   ```bash
   npm install
   ```

9. **Build Assets**
   ```bash
   npm run build
   ```

10. **Generate the Application Key** (if needed)
    ```bash
    php artisan key:generate
    ```

11. **Start Working**
    You're all set up and ready to begin!

## Main Features

**Admin:**
- Manage User Roles and Permissions
- Monitor Data Input
- Dashboard Reporting
- Data Management (Resident, Family Card, Housing)
- Health Data Management (Pregnant Women)
- Data Validation and Reporting

**Dasawisma:**
- Input Data for Assigned Areas
- Access Dashboard for Data Entry

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For more information, you can contact:

- Fauzan Ghaza Madani: [contact@fauzanghaza.com](mailto:contact@fauzanghaza.com)

---

Feel free to adjust or add more details as needed!
