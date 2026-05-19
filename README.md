# Mini Leave Request System

This package contains a fully functional, premium Leave Request feature that can be integrated into any existing Laravel application. It features a modern user interface powered by Tailwind CSS, robust server-side validation, and advanced search/filter capabilities.
<img width="1895" height="857" alt="Screenshot 2026-05-19 212928" src="https://github.com/user-attachments/assets/392fabec-2830-4911-8a0c-565dbc34b876" />


## Included Files

- `app/Models/LeaveRequest.php` - The Eloquent model representing a leave request.
- `app/Http/Controllers/LeaveRequestController.php` - Handles business logic for submitting requests, filtering, and updating approval statuses.
- `database/migrations/*_create_leave_requests_table.php` - The database schema for the feature.
- `routes/web.php` - Defines the required web endpoints.
- `resources/views/leave-requests.blade.php` - The premium, responsive interface built with Tailwind CSS.

---

## Prerequisites

- **PHP** (8.1 or newer)
- **Composer**
- **Node.js** & **NPM** (for compiling Tailwind CSS assets)
- An existing **Laravel** project

---

## Installation & Setup

Follow these step-by-step instructions to integrate and run the feature locally:

### 1. Merge the Code
Copy the `app`, `database`, `resources`, and `routes` directories from this folder and paste them directly into the root of your Laravel application. This will safely drop the necessary files into their correct locations.

*(Note: If you already have existing routes in `routes/web.php`, simply open the file and copy the 3 `LeaveRequest` routes to your own file instead of overwriting it).*

### 2. Configure the Database (XAMPP / MySQL)
Yes, if you are using XAMPP, **you must create the database first** before the app can run.

**Step A: Create the database in XAMPP**
1. Open your **XAMPP Control Panel**.
2. Ensure both **Apache** and **MySQL** are started.
3. Click the **Admin** button next to MySQL, which will open **phpMyAdmin** in your browser (`http://localhost/phpmyadmin`).
4. Click on the **Databases** tab at the top.
5. In the "Create database" field, type a name for your project (e.g., `leave_request_db`) and click **Create**.

**Step B: Connect Laravel to your database**
Open the `.env` file in the root of your Laravel application and update the database credentials to match your new XAMPP database. By default, XAMPP uses `root` with no password:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leave_request_db
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Run Migrations
Generate the new `leave_requests` table in your database by running the following command in your terminal:
```bash
php artisan migrate
```

### 4. Install Frontend Dependencies (Tailwind CSS)
The frontend uses Tailwind CSS via Vite (standard in modern Laravel). You need to install your NPM dependencies so the styling compiles correctly.

Run this command in your project root:
```bash
npm install
```

### 5. Start the Development Servers
To see the application in all its glory, you must run both the backend server and the frontend asset bundler simultaneously. 

Open **two separate terminal windows**:

**Terminal 1 (Backend):**
```bash
php artisan serve
```

**Terminal 2 (Frontend/Tailwind):**
```bash
npm run dev
```

### 6. View the Application!
Open your web browser and navigate to:
[http://localhost:8000/leave-requests](http://localhost:8000/leave-requests)

You are now ready to submit, search, and manage leave requests!
