<?php


namespace Core;
use Core\Database;
use Core\App;
use Core\Session;   


class Authorization {


  public static function checkCourseInstructor(int|string $courseId) {

      $course = App::resolve(Database::class)->query(
          'SELECT c.id AS course_id, i.user_id AS user_id
           FROM courses c 
           JOIN instructors i
           ON c.instructor_id = i.id
           WHERE c.id = :course_id', 
           [
            'course_id'  => $courseId
           ]

      )->findOrFail();

      authorize($course['user_id'] === Session::get('user')['id']);

      return $course;
  }


  public static function checkLectureInstructor(int|string $lectureId) {

    $lecture = App::resolve(Database::class)->query(
        'SELECT l.id, i.user_id AS user_id
         FROM lectures l
         JOIN weeks w
         ON l.week_id = w.id
         JOIN courses c
         ON w.course_id = c.id
         JOIN instructors i
         ON c.instructor_id = i.id
         WHERE l.id = :id AND i.user_id = :user_id',
        [
          'id' => $lectureId,
          'user_id'    => Session::get('user')['id']
        ]

    )->find();

     authorize($lecture);

     return $lecture;
  }


  public static function checkFileInstructor(int|string $fileId) {

    $file = App::resolve(Database::class)->query(
        'SELECT f.id, i.user_id AS user_id
         FROM files f
         JOIN weeks w
         ON f.week_id = w.id
         JOIN courses c
         ON w.course_id = c.id
         JOIN instructors i
         ON c.instructor_id = i.id 
         WHERE l.id = :id AND i.user_id = :user_id',
        [
          'id' => $fileId,
          'user_id'   => Session::get('user')['id']
        ]

    )->find();

     authorize($file);

     return $file;
  }


  public static function checkWeek(int|string $weekId) {

    $week = App::resolve(Database::class)->query(
       'SELECT w.id, i.user_id AS user_id
        FROM weeks w
        JOIN courses c
        ON w.course_id = c.id
        JOIN instructors i
        ON c.instructor_id = i.id
        WHERE w.id = :id AND i.user_id = :user_id',
        [
          'id' => $weekId,
          'user_id'   => Session::get('user')['id']
        ]

    )->find(); 

    authorize($week); // 403

    return $week;
  }

  public static function checkExam(int|string $examId) {

    $exam = App::resolve(Database::class)->query(
       'SELECT e.id, i.user_id AS user_id
        FROM exams e
        JOIN weeks w
        ON e.week_id = w.id
        JOIN courses c
        ON w.course_id = c.id
        JOIN instructors i
        ON c.instructor_id = i.id
        WHERE e.id = :id',
        [
          'id' => $examId
        ]
        
    )->findOrFail(); 

    authorize($exam['user_id'] === Session::get('user')['id']); // 403

    return $exam;
  }


  public static function checkStudentRegisterCourses(int|string $courseId) {

    App::resolve(Database::class)->query(
        'SELECT id
         FROM courses
         WHERE id = :course_id',
        [
            'course_id' => $courseId
        ]

    )->findOrFail();


    $studentRegister = App::resolve(Database::class)->query(
        'SELECT src.course_id
         FROM student_register_courses src
         JOIN students s
         ON src.student_id = s.id
         WHERE src.course_id = :course_id
         AND s.user_id = :user_id',
        [
            'course_id' => $courseId,
            'user_id'   => Session::get('user')['id']
        ]
    )->find();

    authorize($studentRegister);

    return $studentRegister['course_id'];
  }

  public static function checkSubmissionExam(int|string $submission_id) {

      $submission = App::resolve(Database::class)->query(
        'SELECT es.id,
                es.exam_id,
                e.total_grade,
                i.user_id,
                e.id AS exam_id,
                es.grade
        FROM exam_submissions es
        JOIN exams e
          ON es.exam_id = e.id
        JOIN weeks w
          ON e.week_id = w.id
        JOIN courses c
          ON w.course_id = c.id
        JOIN instructors i
          ON c.instructor_id = i.id
        WHERE es.id = :id AND i.user_id = :user_id',
        [
            'id'      => $submission_id,
            'user_id' => Session::get('user')['id']
        ]
    )->findOrFail();

    authorize($submission); // 403

   return $submission; 

  }  

}