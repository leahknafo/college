﻿# college
#### In this project we have developed a service that enables the management of students and courses for a school. The service has different permissions for managers and sales.
## Getting Started
#### Entering the system through the file "login.php", must be identified using a user name and password.
``` html 
For example: You can log in as "owner", enter a username: "yoram@gmail.com", Password: 1111,
Alternatively you can log in as "manager", username: "golan@gmail.com" and password: 3333,
Or as "sales": Username: "ronen@gmail.com" and password: 9999
```
## Guidelines for reading the code
#### The code was written using a combination of the layers model: DAL, BL and MVC Structure, along with object-oriented programming. 
#### For each table in MySql (except for the reference table: course-student) there is a "bl" and a "model" file, parallel, in php. The files are in the syntax of: bl/model + table name + .php
#### In addition, there are view pages whose names indicate their content and purpose.
