# Crispy
Food Ordering Website

## Importing Databases

Use Mysql 8.0 Command Line Client as a Backened

# Procedure
1.Saving .sql file to MysqlServer/bin folder
2.Create a database:
       create database DatabaseName;
3.Use this database:
       use DatabaseName;
4.Importing Database:
       On Windows: source filename.sql;
       On Linux:   $ mysql -u Username -p DatabaseName < output_file_path
 
## Exporting Databases

# Linux
  shell
  $ mysqldump -u YourUserName -p DatabaseName > output_file_path;
  
# Windows
  mysqldump -u YourUserName -p DatabaseName > filename.sql;

## Changing password
Change password of dbconnect.php file as per your Mysql 8.0 Command Line Client password

## Servers

Install Apache Server for Linux Distributions
Install XAMPP Server for Windows

## Website Implementation

# On Windows
Save all the Crispy file to xampp/htdocs folder. Start your Apache server.
Run the main file on chrome
   localhost/Your_path/index.php
Close the xampp server.
   
# On Linux
Save all the Crispy files to /var/www/ folder.
Start Apache server using command:
     shell
     $ sudo systemctl start apache2.service
Run the main file using localhost/your_path/index.php on browser
Close the server using command:
    shell
    $ sudo systemctl stop apache2.service
   
   
