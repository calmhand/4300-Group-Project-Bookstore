WHAT'S PROVIDED:
- A working Login/Register system with the ability to reset a user's password
- A page to display a logged in user's information and a button to log a user out.

REQUIREMENT CHECKLIST (from eLC):
- Implement a password with sessions and cookies.
- Password also needs re-direction and the option to re-set password.
- Password should be in a hidden file, encrypted or some other security mechanism.

HOW WE MET THE REQUIREMENTS:
- Sessions are used to tell the server the user is logged in.
  The session is ended when the user is logged out.

- When a user logs in successfully, the user is re-directed to a page
  that displayed their account information.
  In it's current state, the only information that is displayed is the
  user's email.
  When the user logsout, the user is redirected to the login page.
  At the moment, the rest of the site is inaccessable without being registered.

- With PHP, the password is encrypted with the 'md5' method. The encrypted
  password is then stored in mySQL with the rest of the user's information.

REFERENCES USED TO ASSIST IN THE IMPLEMENTATION:
- w3schools, stackoverflow, eLC powerpoints.

HOW TO INSTALL AND RUN:
- Move the entire folder into XAMPP's 'htdocs' path.
- Start XAMPP and activate all services.
- Go to the network tab in XAMPP and turn on a port.
- (CREATE A DATABASE NAMED 'NovelReads' AND IMPORT THE 'Users' TABLE.
  CODE FOR THE TABLE IS LOCATED IN THE 'sql' FOLDER)
- Go to the link 
  http://localhost:8080/projectfinale/4300-Group-Project-Bookstore/html&php/login.php

  (Change port number if it is different)

IMPORTANT:
- A video demonstration is provided (please watch).