-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: e_learning
-- ------------------------------------------------------
-- Server version	8.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- My Name: Khaled Akram Salama
-- My ID: 20220574

-- ======================================================
-- Admin-> Username: khaled123, Password:12345678`
-- ======================================================
-- instructor -> Username:ahmed12, Password:12345678 
-- instructor -> Username:akram12, Password:12345678 
-- ======================================================
-- student -> Username:khaled04, Password:12345678 
-- student -> Username:haythim, Password:12345678 
-- ======================================================



-- Table structure for table `collage`

DROP TABLE IF EXISTS `collage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collage`
--

LOCK TABLES `collage` WRITE;
/*!40000 ALTER TABLE `collage` DISABLE KEYS */;
INSERT INTO `collage` VALUES (1,'كلية الهندسة و التكنولوجيا المعلومات','69e63f957e223.jpg','2027-02-01'),(2,'كلية الصيدلة','69e63f711b109.jpg','2026-01-01'),(3,'كلية الطب البشري ','69e63fb0b15c8.jpg','2028-01-01');
/*!40000 ALTER TABLE `collage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hour_num` int NOT NULL,
  `level_year` int NOT NULL,
  `instructor_id` int NOT NULL,
  `major_id` int NOT NULL,
  `semster_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `courses_instructors` (`instructor_id`),
  KEY `courses_semster` (`semster_id`),
  KEY `courses_majors` (`major_id`),
  CONSTRAINT `courses_instructors` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_majors` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_semster` FOREIGN KEY (`semster_id`) REFERENCES `semster` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'التغذية السريرية',3,2,2,3,1),(2,'أمن المعلومات',3,4,1,1,1),(3,'قواعد البيانات',4,3,1,1,2);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_submissions`
--

DROP TABLE IF EXISTS `exam_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_id` int NOT NULL,
  `student_id` int NOT NULL,
  `answer_file` varchar(255) NOT NULL,
  `submitted_at` datetime NOT NULL,
  `original_file_name` varchar(255) NOT NULL,
  `grade` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_submitted_idx` (`student_id`),
  KEY `fk_exam_submitted_idx` (`exam_id`),
  CONSTRAINT `fk_exam_submitted` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_student_submitted` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_submissions`
--

LOCK TABLES `exam_submissions` WRITE;
/*!40000 ALTER TABLE `exam_submissions` DISABLE KEYS */;
INSERT INTO `exam_submissions` VALUES (1,4,1,'/uploads/1782213129_khaled.pdf','2026-06-23 11:12:09','khaled.pdf',85),(2,5,1,'/uploads/1782229228_khaled.pdf','2026-06-23 18:40:28','khaled.pdf',80),(3,6,3,'/uploads/1782314583_saaed.pdf','2026-06-24 18:23:03','saaed.pdf',45),(4,7,2,'/uploads/1782375396_ahmed.pdf','2026-06-25 11:16:36','ahmed.pdf',9),(5,7,3,'/uploads/1782393452_saaed.pdf','2026-06-25 16:17:32','saaed.pdf',8);
/*!40000 ALTER TABLE `exam_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `description` text NOT NULL,
  `week_id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `total_grade` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exams_weeks_idx` (`week_id`),
  CONSTRAINT `fk_exams_weeks` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (4,'الامتحان النهائي','2026-06-23 10:56:00','2026-06-23 15:00:00','الامتحان من المحاضرة 1 الى المحاضرة 15\r\nيمنع استخدام أدوات الذكاء  الاصطناعي ',8,'/uploads/Assignment.pdf',100),(5,'الامتحان النهائي ','2026-06-23 18:40:00','2026-06-23 19:01:00','المحاضرة 1 الى اخر المحاضرة',9,'/uploads/Assignment.pdf',100),(6,'الامتحان النصفي','2026-06-24 18:15:00','2026-06-24 18:25:00','الامتحان من المحاضرة 1 الى محاضرة 15',10,'/uploads/Assignment.pdf',50),(7,'واجب 1','2026-06-25 16:17:00','2026-06-25 16:30:00','الواجب عبارة عن سؤال مقالي واحد \r\nممنوع استخدام ادوات الذكاء الاصطناعي',10,'/uploads/Assignment.pdf',10);
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `week_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_files_weeks_idx` (`week_id`),
  CONSTRAINT `fk_files_weeks` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'كتاب المقرر ','/uploads/كتاب تدريب ميداني - خالد اكرم سلامة.pdf',1),(2,'سلايد خالد','/uploads/حضور وغياب 2026.pdf',1),(3,'مقرر المادة','/uploads/كتاب تدريب ميداني - خالد اكرم سلامة.pdf',2),(4,'مقرر التغذية ','/uploads/حضور وغياب 2026.pdf',3);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `major_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instructors_users` (`user_id`),
  KEY `instructors_majors` (`major_id`),
  CONSTRAINT `instructors_majors` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `instructors_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES (1,2,1),(2,3,3);
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lectures`
--

DROP TABLE IF EXISTS `lectures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lectures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `week_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lecture_week_idx` (`week_id`),
  CONSTRAINT `fk_lecture_week` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lectures`
--

LOCK TABLES `lectures` WRITE;
/*!40000 ALTER TABLE `lectures` DISABLE KEYS */;
INSERT INTO `lectures` VALUES (1,'https://youtu.be/PJAwJe-QV8s?si=tVawArjS2bQiHYTz','محاضرة 1',2),(3,'https://youtu.be/mzvo0i7Jshw?si=OnQ3cFWzKkBMO8H3','محاضرة 2',1),(4,'https://youtu.be/mzvo0i7Jshw?si=OnQ3cFWzKkBMO8H3','محاضرة 1',3);
/*!40000 ALTER TABLE `lectures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `majors`
--

DROP TABLE IF EXISTS `majors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `majors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `overview` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `collage_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `overview` (`overview`),
  KEY `collage_majors` (`collage_id`),
  CONSTRAINT `collage_majors` FOREIGN KEY (`collage_id`) REFERENCES `collage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `majors`
--

LOCK TABLES `majors` WRITE;
/*!40000 ALTER TABLE `majors` DISABLE KEYS */;
INSERT INTO `majors` VALUES (1,'هندسة انظمة حاسوب ','هو تخصص يهتم في دراسة علم الكمبيوتر و تطويه','69e640159447a.jpg',1),(2,'هندسة الميكاترونكس','هو تخصص يهتم بدراسة الدارات الكهربائية و المغناطيسية','69e640e825d92.jpg',1),(3,'الطب البشري ','هو تخصص يهتم بدراسة اجهزة الانسان و اعضاءه و علاجه','69e6415b8c440.jpg',3);
/*!40000 ALTER TABLE `majors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semster`
--

DROP TABLE IF EXISTS `semster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semster`
--

LOCK TABLES `semster` WRITE;
/*!40000 ALTER TABLE `semster` DISABLE KEYS */;
INSERT INTO `semster` VALUES (1,'الفصل الدراسي الاول ','2026-09-25'),(2,'الفصل الدراسي الثاني ','2026-02-02'),(3,'الفصل الصيفي','2026-07-05');
/*!40000 ALTER TABLE `semster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_register_courses`
--

DROP TABLE IF EXISTS `student_register_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_register_courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_course_unique` (`course_id`,`student_id`),
  KEY `fk_sturdent_courses_idx` (`course_id`),
  CONSTRAINT `fk_sturdent_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_register_courses`
--

LOCK TABLES `student_register_courses` WRITE;
/*!40000 ALTER TABLE `student_register_courses` DISABLE KEYS */;
INSERT INTO `student_register_courses` VALUES (9,1,2),(8,1,3),(1,2,1),(6,3,1),(7,3,4);
/*!40000 ALTER TABLE `student_register_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `academic_year` int NOT NULL,
  `major_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_users` (`user_id`),
  KEY `students_majors` (`major_id`),
  CONSTRAINT `students_majors` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `students_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,4,1,1),(2,5,1,3),(3,6,1,3),(4,7,1,1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','student','instructor') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'خالد سلامة','khaled123','$2y$10$1WVqysuYehHIt9c1GbAme.KemM9kpvk/nb6JctWwhKAzKACVWD9h6','admin'),(2,'احمد محمود','ahmed12','$2y$10$uhSEjbqgkIkWWStOW8liweysBVfLVM5QxWHfK7d9HCydjz/nkfsBu','instructor'),(3,'اكرم سلامة','akram123','$2y$10$ylyFuuEv1dwoDb4NJrAd/uf5MG2eSMF9ddOpeZuO3./Rjb/SZivxW','instructor'),(4,'خالد سلامة','khaled04','$2y$10$BJ85gd413K.T4n8nUCl4Ou5syWLE7bIeVrJtqRr7eMgB8Q/pjuKKe','student'),(5,'احمد  محمد','ahmed1','$2y$12$5qt4w2RfxxwI9m6PLWrVqOVVKbnHU6L0qAaifjT1QsR3MvT7p9jeC','student'),(6,'سعيد سلامة','saaed12','$2y$12$djXNOQrMK4Y/h5bLUYY5v.o6s8Vm/4uETwJGKk68m0IdMOu1kUTe6','student'),(7,'هيثم سلامة','haythim12','$2y$12$HuRx/lbEN1TNfljVtUNRHOa4Vb7Qd4.ezu/P9kiLDoM5Jqpvf2bHe','student');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weeks`
--

DROP TABLE IF EXISTS `weeks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weeks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_weeks_course_idx` (`course_id`),
  CONSTRAINT `fk_weeks_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weeks`
--

LOCK TABLES `weeks` WRITE;
/*!40000 ALTER TABLE `weeks` DISABLE KEYS */;
INSERT INTO `weeks` VALUES (1,'2026-04-01','2026-04-08',3),(2,'2026-03-01','2026-03-08',2),(3,'2026-06-01','2026-06-08',1),(8,'2026-06-21','2026-06-27',3),(9,'2026-06-20','2026-06-27',2),(10,'2026-06-24','2026-06-30',1);
/*!40000 ALTER TABLE `weeks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-28  9:56:28
