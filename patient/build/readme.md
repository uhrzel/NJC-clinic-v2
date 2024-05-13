## Guideline

Contributions to the Student Council Voting System are welcome! Please follow the guidelines outlined here

# Student Council Voting System

The Student Council Voting System is a web application designed to facilitate the election process within a student council or organization. It provides a platform for students to cast their votes electronically, making the voting process more efficient and accessible.

## Features

- User authentication system for students and administrators.
- Secure and tamper-proof electronic voting system.
- Administrator dashboard for managing elections, candidates, and voter registration.
- Real-time monitoring of voting progress and results.
- Responsive design for seamless usage on desktop and mobile devices.

## Installation

1. Set up a web server environment (e.g., Apache, xampp) with PHP and MySQL support.
2. create database names `scvotingsystem` and save.
3. Import the database from the `database/scvotingsystem.sql` file.
4. Update the database configuration in `config/database.php` with your MySQL credentials.
5. Open the application in your web browser any brower desired.
6. Navigate to the project directory in your web server's document root at (http://127.0.0.1/phpmyadmin/).

## Accounts
url: [admin](http://localhost/scvotingsystem/admin/)
- admin
    username = `admin`
    password = `admin123`

url: [voters](http://localhost/scvotingsystem/)
- voter
    username = `sample vote`
    password = `CCtQTIp7`

## Usage

- Students can log in to the system using their credentials to view ongoing elections and cast their votes.
- Administrators can access the dashboard to create and manage elections, candidates, and voter registration.
- Detailed usage instructions and documentation can be found in the project's documentation folder.
