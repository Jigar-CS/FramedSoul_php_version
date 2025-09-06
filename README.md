# FramedSoul PHP Project

## Overview
FramedSoul is a dynamic photography website that showcases images taken over time. This project is built using PHP and utilizes a MySQL database to manage image uploads and display. The website features an admin interface for managing images, allowing for easy addition and deletion of photos.

## Project Structure
The project is organized into several directories and files:

```
framed-soul-php
├── public
│   ├── index.php            # Main entry point for the application
│   ├── bio.php              # Biography page
│   ├── original.php         # Gallery page
│   ├── contact.php          # Contact page
│   ├── admin.php            # Admin interface for managing images
│   ├── login.php            # User login functionality
│   ├── logout.php           # User logout functionality
│   ├── add_image.php        # Process for adding new images
│   ├── delete_image.php     # Process for deleting images
│   ├── record               # Individual photo detail pages
│   ├── uploads              # Directory for uploaded images
│   ├── style.css            # CSS styles for the website
│   └── mainlogo.jpg         # Main logo image
├── src
│   ├── config.php           # Configuration settings
│   ├── db.php               # Database connection and queries
│   ├── auth.php             # Authentication functions
│   ├── ImageRepository.php   # Class for managing images in the database
│   └── helpers.php          # Helper functions
├── templates
│   ├── header.php           # Header template
│   ├── footer.php           # Footer template
│   ├── menu.php             # Navigation menu template
│   └── image_grid.php       # Template for displaying images in a grid
├── .env.example             # Template for environment variables
├── README.md                # Project documentation
└── database.sql             # SQL commands for database setup
```

## Setup Instructions

1. **Clone the Repository**
   Clone the project repository to your local machine.

2. **Install XAMPP**
   Ensure you have XAMPP installed on your machine. Start the Apache and MySQL services.

3. **Create the Database**
   - Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
   - Create a new database named `framed_soul`.
   - Import the `database.sql` file to set up the necessary tables.

4. **Configure Database Connection**
   - Rename `.env.example` to `.env` and update the database connection details as needed.

5. **Upload Images**
   - Place any images you want to display in the `public/uploads` directory.

6. **Access the Application**
   - Open your web browser and navigate to `http://localhost/framed-soul-php/public/index.php` to view the website.

## Features

- **Dynamic Image Management**: Admin can add or delete images through the admin interface.
- **User Authentication**: Users can log in and out to access admin features.
- **Responsive Design**: The website is designed to be responsive and user-friendly.
- **Image Gallery**: Displays images in a grid format, with individual detail pages for each photo.

## Future Enhancements
- Implement user roles and permissions for enhanced security.
- Add image categorization and tagging features.
- Improve the UI/UX with additional styling and animations.

## License
This project is open-source and available for modification and distribution under the MIT License.