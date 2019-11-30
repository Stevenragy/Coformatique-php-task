# Coformatique-php-task

Data Base tabels using mysql
+ ---------------------------- + ------------------- + ---------------------- +
| users                        | message             |  replies               |
-------------------------------------------------------------------------------
| id (PK,AI,Null)              | id(PK,AI,Null)      | id(PK,AI,Null)|        |
| full_name varchar(250)       | user_id (FK,CASCADE)| message_id (FK,CASCADE)|
| username  varchar(60)        | message text        | reply text             |
| gender  enum('male','female')| createdOn timestamp | createdOn timestamp    |
| mobile  int(11)              |                     |                        |
| email   varchar(250)         |                     |                        |
| password  char(60)           |                     |                        |
| created_at timestamp         |                     |                        |
| updated_at datetime          |                     |                        |
+ ---------------------------- + ------------------- + ---------------------- +

password hashing using password_hash()

using bootstrap for frontend, you should be connected to the internet to use bootstrap CDN 

Email validation only using filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)

