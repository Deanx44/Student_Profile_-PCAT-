# Students-Profile

This demonstrates how to use classes in PHP CRUD.

## Model

province -> id (PK, AI), name  
town_city -> id (PK, AI), name  
students -> id (PK, AI), student_number, first_name, last_name, middle_name, gender, birthday  
student_details -> id (PK, AI), student_id (int), contact_number, street, town_city (FK), province (int), zip_code

To Dos:

- CRUD of Province
- CRUD of Town City
- Fix Edit of Student's Profile include table student_details
- Fix Edit of Student's Profile use appropriate controls for gender and birthdate.
- Modify display in students table include some data from student_details table
- Fix Gender display use 'F' or 'M' (do not change database structure)
- Fix Birthdate display use 'Jan 1 2020' format.
- 
<!--Fix Delete of Student's Profile include student_details.
After the Code Session 2
Using the skills you've learned from IM and DB2 create reports for this project
-->
- Add 3 types of Report in Menu Report
- Modify index.php, create a chart using ChartJS (dashboard like)
