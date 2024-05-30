
# CRM

This CRM is Developed for Many purpose that will be capable to handle your company is all in once solution for business.


## Deployment

To deploy this project install 

For windows on Localhost download Wamp server
```window
https://www.wampserver.com/en/
```

For Linux 
```Linux
Install Lamp
```

Git Clone the Files 
```git
git clone https://github.com/TechTasa/crm.git
```

For Windows Copy the Folder In 
```location
C:\wamp64\www
```
Linux Copy The Files in Lamp

Windows Install Database 
```localhost
http://localhost/phpmyadmin
```
1) Create A Database
2) Import Database.sql File into Database

Database File
```Database
C:\wamp64\www\[Your Folder name]\Database.sql
```
Default user ID Password 
User ID : 
```User
admin@admin.com
```
Password :
```pass
admin
```
add Database Conn
```Conn
[Your Folder]\panel\connection.php
```
Change Database the Thing like this

```change
     public function connect_db(){
$this->connection = mysqli_connect("host name[ by default localhost]", "username", "password", "databasename"); 
         if(mysqli_connect_error()){
             die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
         }
     }
```
