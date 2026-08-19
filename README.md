# University LMS

A multi-role Learning Management System built with **native PHP** and **MySQL**, supporting three distinct user roles — Admin, Teacher, and Student — with full academic structure management, weekly course content, and a file-based exam & grading workflow.


---

## 📖 Overview

University LMS digitizes the academic structure of a university — from faculties and majors down to individual courses, weekly content, and exams — with a dedicated, permission-based experience for Admins, Teachers, and Students.

---

## User Roles & Permissions

### 🛠️ Admin
- Create and manage **faculties** (with images & descriptions)
- Create and manage **majors/specializations** linked to a faculty (with images & descriptions)
- Create and manage **courses** linked to a major
- Create teacher accounts and assign them to courses
- Create student accounts and enroll them in specific courses
- Full CRUD (create, edit, delete) across every entity in the system

### Teacher
- View all courses assigned to them
- Organize each course into **weeks** with custom date ranges (e.g. Apr 4 – Apr 10)
- Upload **video lectures** (via external links, e.g. YouTube) and **PDF materials** per week
- Create **PDF-based exams** with instructions for students
- Review student-submitted answer files
- Grade submissions — grades are instantly visible to the student

### 🎓 Student
- Access only their **enrolled courses** (no access to courses they're not registered in)
- View weekly lectures and materials
- View classmates enrolled in the same course
- Download exams, submit answers as files
- View their grades once published

---

## Key Features

- Role-based access with a personalized dashboard greeting for each role (Admin / Teacher / Student)
- Hierarchical academic structure: **Faculty → Major → Course**, each with images & descriptions
- Weekly content system — lectures and files organized by custom date ranges
- File-based exam system — PDF exam upload, file submission by students, manual grading, instant grade visibility
- Strict file upload validation (file type/extension checks) for lectures, exams, and submissions
- Full CRUD across all modules (faculties, majors, courses, users, weeks, exams)

---

## 🛠️ Tech Stack

| Layer | Technology |

| Backend | PHP (Native) |
| Database | MySQL |
| Frontend | Bootstrap, JavaScript, HTML5, CSS3 |
