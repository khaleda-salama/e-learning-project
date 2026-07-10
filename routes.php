<?php 



// افهم قصة . (dot) و [] في object في js

// Auth
$router->get('/', 'auth/login.php')->only('guest');
$router->post('/session', 'auth/store.php');

// Admin Dashboard
$router->get('/admin/dashboard', 'admin/dashboard.php')->only('admin');
$router->get('/logout', 'admin/destroy.php'); 

// Register
$router->get('/register/user', 'admin/registration/create.php')->only('admin');
$router->post('/register', 'admin/registration/store.php');

// Collages
$router->get('/collages', 'admin/collages/index.php')->only('admin');
$router->get('/collage', 'admin/collages/show.php')->only('admin');
$router->get('/collage/create', 'admin/collages/create.php')->only('admin');
$router->post('/collage/store', 'admin/collages/store.php');
$router->get('/collage/edit', 'admin/collages/edit.php')->only('admin');
$router->patch('/collage/update', 'admin/collages/update.php');

// Majors
$router->get('/majors', 'admin/majors/index.php')->only('admin');
$router->get('/major', 'admin/majors/show.php')->only('admin');
$router->get('/major/create', 'admin/majors/create.php')->only('admin');
$router->post('/major/store', 'admin/majors/store.php');
$router->get('/major/edit', 'admin/majors/edit.php')->only('admin');
$router->patch('/major/update', 'admin/majors/update.php');

// Courses
$router->get('/courses', 'admin/courses/index.php')->only('admin');
$router->get('/course', 'admin/courses/show.php')->only('admin');
$router->get('/course/create', 'admin/courses/create.php')->only('admin');
$router->post('/course/store', 'admin/courses/store.php');
$router->get('/course/edit', 'admin/courses/edit.php')->only('admin');
$router->patch('/course/update', 'admin/courses/update.php');
$router->delete('/course/delete', 'admin/courses/delete.php');

//Semster
$router->get('/semster', 'admin/semster/index.php')->only('admin');
$router->get('/semster/show', 'admin/semster/show.php')->only('admin');
$router->get('/semster/create', 'admin/semster/create.php')->only('admin');
$router->post('/semster/store', 'admin/semster/store.php');
$router->get('/semster/edit', 'admin/semster/edit.php')->only('admin');
$router->patch('/semster/update', 'admin/semster/update.php');

// Instructors
$router->get('/instructors', 'admin/instructors/index.php')->only('admin');
$router->get('/instructor/show', 'admin/instructors/show.php')->only('admin');
$router->get('/instructor/create', 'admin/instructors/create.php')->only('admin');
$router->post('/instructor/store', 'admin/instructors/store.php');
$router->get('/instructor/edit', 'admin/instructors/edit.php')->only('admin');
$router->patch('/instructor/update', 'admin/instructors/update.php');
$router->delete('/instructor/delete', 'admin/instructors/delete.php');

// Students
$router->get('/students', 'admin/students/index.php')->only('admin');
$router->get('/student/show', 'admin/students/show.php')->only('admin');
$router->get('/student/create', 'admin/students/create.php')->only('admin');
$router->post('/student/store', 'admin/students/store.php');
$router->get('/student/edit', 'admin/students/edit.php')->only('admin');
$router->patch('/student/update', 'admin/students/update.php');
$router->delete('/student/delete', 'admin/students/delete.php');


// Instructor Dashboard
$router->get('/instructor/dashboard', 'instructor/dashboard.php')->only('instructor');
$router->get('/instructor/course', 'instructor/course.php')->only('instructor');

// Instructor Course Week Management
$router->get('/week/create', 'instructor/week/create.php')->only('instructor');
$router->post('/week/store', 'instructor/week/store.php');
$router->get('/week/edit', 'instructor/week/edit.php')->only('instructor');
$router->patch('/week/update', 'instructor/week/update.php');
$router->delete('/week/delete', 'instructor/week/delete.php');

// Instructor Course File Management
$router->get('/file/create', 'instructor/file/create.php')->only('instructor');
$router->post('/file/store', 'instructor/file/store.php');
$router->get('/file/edit', 'instructor/file/edit.php')->only('instructor');
$router->patch('/file/update', 'instructor/file/update.php');

// Instructor Students Course
$router->get('/instructor/student/show', 'instructor/student/show.php')->only('instructor');


// Instructor Course Lecture Management
$router->get('/lecture/create', 'instructor/lecture/create.php')->only('instructor');
$router->post('/lecture/store', 'instructor/lecture/store.php');
$router->get('/lecture/show', 'instructor/lecture/show.php')->only('instructor');
$router->get('/lecture/edit', 'instructor/lecture/edit.php')->only('instructor');
$router->patch('/lecture/update', 'instructor/lecture/update.php');


// Instructor Course Exam Or Assigment Management
$router->get('/exam/create', 'instructor/exam/create.php')->only('instructor');
$router->post('/exam/store', 'instructor/exam/store.php');
$router->get('/exam/show', 'instructor/exam/show.php')->only('instructor');
$router->get('/exam/edit', 'instructor/exam/edit.php')->only('instructor');
$router->patch('/exam/update', 'instructor/exam/update.php');
$router->delete('/exam/delete', 'instructor/exam/delete.php');

$router->get('/exams/created', 'instructor/exam/created.php')->only('instructor');
$router->get('/exams/submissions', 'instructor/exam/submissions.php')->only('instructor');

// Instructor Course Grade Exam Or Assigment Management
$router->post('/exam/grade/store', 'instructor/exam/grade/store.php')->only('instructor');


// Student Dashboard
$router->get('/student/courses/major', 'student/majorCourses.php')->only('student');
$router->post('/student/register/course', 'student/studentRegisterCourses/store.php');
$router->get('/student/dashboard', 'student/dashboard.php')->only('student');
$router->get('/student/my/courses', 'student/Mycourses.php')->only('student');
$router->get('/student/exam', 'student/exam/show.php')->only('student');
$router->post('/student/exam/submit', 'student/exam/submit.php');

$router->get('/student/evaluation', 'student/evaluation/show.php')->only('student');
