# Coformatique-php-task

Data Base tabels using mysql

| users :    id (PK,AI,Null)  , full_name varchar(250)  ,username  varchar(60) ,gender  enum('male','female')  ,mobile  int(11)  ,email   varchar(250)    ,password  char(60) ,  created_at timestamp  ,updated_at datetime
| message : id(PK,AI,Null)  ,user_id (FK,CASCADE) ,message text ,createdOn timestamp      
| replies :   id(PK,AI,Null)   ,message_id (FK,CASCADE)  ,reply text ,createdOn timestamp     



password hashing using password_hash()

using bootstrap for frontend, you should be connected to the internet to use bootstrap CDN 

Email validation only using filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)

