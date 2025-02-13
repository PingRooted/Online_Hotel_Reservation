# Hotel Room Online Booking Management System

## Overview
The **Hotel Room Online Booking Management System** is a web-based application that enables customers to book hotel rooms online and allows administrators to manage reservations, accounts, and room details efficiently.

## Features

### Client-Side
- **Home Page** – View hotel details and available rooms.
- **About Us Page** – Learn about the hotel and its services.
- **Contact Page** – Contact details and inquiry form.
- **Reservation Page** – Book rooms without creating an account.
- **Success Page** – Displays booking confirmation details.

### Admin-Side
- **Admin Login** – Secure access for administrators.
- **Dashboard** – Overview of reservations and system status.
- **Accounts Management** – Create, edit, and delete admin accounts.
- **Reservation Management** – View and manage reservations (pending, check-in, checkout).
- **Room Management** – Add, edit, and delete rooms with details like type, price, and photos.

## Technologies Used
- **Frontend:** HTML, CSS, Bootstrap, JavaScript
- **Backend:** PHP
- **Database:** MySQL

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/PingRooted/Online_Hotel_Reservation.git
   ```
2. Move to the project directory:
   ```bash
   cd Online_Hotel_Reservation
   ```
3. Import the database:
   - Open **phpMyAdmin**.
   - Create a new database (e.g., `hotel_booking`).
   - Import the provided `database.sql` file.
4. Configure the database connection in `config.php`:
   ```php
   $conn = new mysqli("localhost", "root", "", "hotel_booking");
   ```
5. Start a local server (XAMPP or WAMP) and navigate to:
   ```
   http://localhost/Online_Hotel_Reservation
   ```

## Usage
- **Customers** can browse rooms, fill out the reservation form, and confirm their booking without an account.
- **Admins** can log in, manage reservations, accounts, and room details.

## Contribution
Feel free to **fork** this repository and submit **pull requests**. Contributions are always welcome.

## License
This project is **open-source** and free to use.
