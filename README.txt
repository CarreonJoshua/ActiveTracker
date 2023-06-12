Hello, this is our group's own project involving using php. This readme will tackle most of the actions and configurations.

To start, you will be taken to index. This is a brief showcase of the submissions table, and a button can be pressed to edit the tables within the database. This can be used later on to create an admin or teacher account system.

here after, we can see many actions on the navbar. Submissions, students, activities, sections and subjects, and search. This will be a brief explanation of said options.

Submissions - edit, add, or delete records from the submissions table
Students - edit, add, or delete records from the students and contact table
Activities - edit, add, or delete records from the activities table
Sections & Subjects - edit, add, or delete records for the sections and subjects table
Search - use the search feature to get individual or group of records through tags.

in every page (except search) it features forms to add records into the table. While the id's are auto-incremented, it's highly advised to manually set it to keep it consistent. Then in comes in a table with records of either individual tables or a joining of two tables. In it consists of many options including to delete or edit records which are self explanatory.

Finally, the search option is the most complex. it contains all the tables in the database (that is not merely a reference table) and a search box on the bottom. While it is self explanatory, there are a few things to clear up.

-Tablename is the name of the table you want to draw from. The code has a setup to allow multiple tables but couldn't be completed on time and technical difficulties.
-Column name is the name of the column you want to use for reference. If you leave it blank, the system will merely consider it as all columns in the table. Like tablename, we wanted the ability to be able to use more columns but we again had difficulties doing so.
-Values will use the inputs you have to find records that match your input. Keep in mind that values require a column name, and is required when searching for values. Please keep this in mind. We also wanted multiple values to be considered but we had difficulties in doing so.
-Other parameters currently support only ORDER BY or LIMIT queries. for order by, you can write in either uppercase or lowercase letters, either asc or ascending and desc or descending works. For limits, it's the same as both LIMIT and limit works just as well, but you need to create an underscore and a number of the exact amount of records you want to get.
Ex: ASC limit_3

here's an example parameter:
table: submission
column: score
value: 
other: DESC limit_3

once you have all the parameters you require, you can press the search button to be taken to the results page, which if successful will show all the records. If done, you may return again through either the navbar or the button to return to the search page.

and that is most of the information. Thank you very much, sir, if you are reading this and we did our best in this project. Thank you sir!
-Joshua Carreon, Leader