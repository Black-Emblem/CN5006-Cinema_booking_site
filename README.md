# Cinema Ticket Booking Site

This web-based ticket booking system for cinemas was developed as a university project in 2021.
It supports multiple branches and aims to provide a streamlined user experience for cinema-goers.
The site is built with PHP and uses a stylish template from HTML5 UP.
While fully functional for booking tickets, the admin section remains in a proof-of-concept stage.

## Background

This project was created as part of a university course to demonstrate web development skills with PHP and database integration using MariaDB.
It showcases the practical application of these technologies in a real-world scenario, albeit with some areas, like the admin section, left in a preliminary state of development.

## Features

- **Cinema Branch Selection**: Enables users to choose their preferred cinema branch.
- **Dynamic Ticket Booking**: Users can select movie showtimes and book tickets.
- **Stylized User Interface**: Utilizes a template from HTML5 UP for a user-friendly experience.
- **Admin Section**: An initial version with limited functionality for managing bookings and showtimes.

## Technologies

- **Backend**: PHP
- **Frontend**: HTML5 UP Template, CSS (http://html5up.net)
- **Database**: MariaDB

## Installation

Prerequisites

Before you start, ensure you have:

A local server environment that supports PHP (e.g., XAMPP, MAMP, WAMP, or LAMP) is installed on your machine.
A text editor or IDE (Integrated Development Environment) to view and edit the project files.
MariaDB (or MySQL) for the database. Typically, this comes bundled with the server environments mentioned above.

Installation Steps:

1. Install a Local Server Environment

    If you haven't already, download and install a PHP server environment such as XAMPP, WAMP, or MAMP from their respective websites. Follow the installation instructions provided on their official pages.

2. Start Your Local Server

    Launch the control panel of the server environment you installed.
    Start the Apache and MariaDB/MySQL services. You should see an option to start these services within the control panel.

3. Clone or Download the Project

    If the project is hosted on GitHub, you can clone it using Git or download the repository as a ZIP file and extract it.
    If you downloaded a ZIP, extract it to a folder.

4. Place the Project in the Server's Root Directory

    Locate the root directory for your local server environment (commonly htdocs in XAMPP, www in WAMP).
    Copy the project folder and paste it into this directory.

5. Create the Database

    Open your web browser and go to localhost/phpmyadmin to access PHPMyAdmin.
    Create a new database that matches the name expected by your project (you'll find this in your project's database configuration files).
    Import the database schema: In PHPMyAdmin, select your newly created database, click on the "Import" tab, and choose the .sql file provided with your project. This file contains the structure and initial data for your database.

6. Configure the Project

    Navigate to your project's directory and find the configuration file (usually named something like config.php, db.php, or within a config folder).
    Open this file with your text editor or IDE and adjust the database connection settings (database name, username, and password) to match your local setup. The default username is usually 'root' with no password, but this could vary based on your server environment's setup.

## Usage

Deployment Notes:

The admin section, as mentioned, is in a very early development stage. It might require manual setup or direct database interactions for full functionality.
Since this is a project from 2021, certain dependencies or PHP versions might need to be adjusted according to the server environment's compatibility.

## Contributing

Given its origin as a university project, this system serves as a foundation for further development rather than a finished product. Contributions, especially towards enhancing the admin section, are welcome.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
