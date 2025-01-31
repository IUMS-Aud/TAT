# AVAT

AVAT is a program designed for advanced auditory-visual attention training, aimed at enhancing attention and cognitive processes in individuals with chronic tinnitus. This project is part of a research study conducted by the Audiology Department at the University of Medical Sciences, Iran.

## Features:
- **User Authentication**: Users are required to create an account and log in to access attention training exercises (from new_user.php).
- **MySQL Database Integration**: The program connects to a MySQL database for user data management. User information, progress, and training results are stored and managed efficiently.
- **Responsive Design**: The application is optimized for both desktop and mobile devices, providing a smooth experience across various screen sizes.
- **Attention Training Exercises**: The program offers a variety of attention training tasks designed to engage users' auditory and visual processing abilities.

## Requirements:
- PHP 7.0 or higher
- MySQL Database
- Web Server (e.g., Apache or Nginx)

## Installation:
1. Clone this repository to your local machine:
    ```bash
    git clone https://github.com/hnamvar/TAT.git
    ```
2. Create a MySQL database and configure the `Config/config.php` file with your database credentials. You will need to specify the database username, password, database name, and connection port. The following is an example configuration:
    ```php
    $db_path = mysqli_connect('localhost', 'Database_User', 'Database_Password', 'database_Name', 'Connection_Port');
    ```
3. Upload the project files to your web server.
4. Ensure your server is set up to run PHP and supports MySQL.
5. Run the application by accessing it through your web browser.

## License:
This project is part of an academic research initiative and is free to use for educational and research purposes. For any commercial use, please contact the research team.
