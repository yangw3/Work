# Segfault
Our team plans to develop a blogging platform for CS and ITWS students at RPI. Our website aims to provide users with a resource-rich community hub. Any
coding question is acceptable; it is not just limited to assignments for the lecture, labs, and exams. Users will be able to connect with people who have
similar interests to them on this platform and make new acquaintances they might not have otherwise made in their lectures or lab. We want to create
connections between all of our users so they can develop an interest in learning.


## Backend
We have created 4 tables, users, posts, comments, and reports. Users table has 2 fields; userId and rcsid, where rcsid is the primary key and both userId and rcsid are unique.
We could only have rcsid in the table, but we wanted to optimize query time in the table and decided to add userId as int allowing us to speed up the query. In the posts table,
there are 6 fields; postId, post, title, date, rcsid, and tags. PostId and rcsid is the only fields that are unique and postId is the primary key. The post and title fields are
varchars that store up to the appropriate amount of length for each field. In the table, rcsid and tags are foreign keys that reference the user table and tags table
respectively. The comments table consists of commentId, postId, comment, and rcsid fields. commentId is an int value that is a primary and unique key. postId and rcsid are both
foreign keys where that reference post and users tables. Report table contains reportId, postId, and report fields; where reportId has both unique ane primary keys. postId is a
foreign key that references post table.


## Security
We used RPI's CAS system to that lets anyone from RPI log into our webpage.
Additinally we sanitzed the user input so users can not intentionally or unintentionally harm the webpage.
Finally we used ZAP to scan our page to ensure there are no security conserns
