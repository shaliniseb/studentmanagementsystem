## Student Management System
This project is used to create student and their mark list

### Functionalites
- **Add Student**
- **Edit Student**
- **List Student**
- **Delete Student**
- **Add Marks**
- **Edit Marks**
- **List Marks**
- **Delete Marks**

## System Requirements

- Language Used - PHP 7.4.19 
- Framework Used - Laravel Framework 8.82.0
- Database - 10.4.19-MariaDB 

## Steps to launch application

- Download project files from git
- Create a database 'schooldb' or you can create a databse with any name
- Add database configuration details to .env file (located in root folder)
          DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=schooldb
          DB_USERNAME=root
          DB_PASSWORD=
 
  Fill the above section in the .env file with your databse configuration

- Next execute the migrations and seeds
   For that in the terminal, from root folder execute the below command
       
         php artisan migrate --seed

    The above command will create required tables in the databse

- In the terminal, from root folder start the application by executing the below command

      php artisan serve

- After executing the above command you will get a url, and access the same in the brower

          http://127.0.0.1:8000/  (by default url)
