<?php

namespace Core;

use Core\App;
use Core\Database;
use DateTime;


class Validator {

  public static function valid(string|int $value, $min = 1, $max = 255): bool {
  
    $value = trim($value);
  
    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function full_name(string $value, $min = 1, $max = 255): bool {
    
    $value = trim($value);

    if (strlen($value) < $min || strlen($value) > $max) return false;
  
    return preg_match('/^[A-Za-zء-ي\s]+$/u', $value) === 1;
  }

  public static function date(string $date, $min = "2026-01-01", $max = "2028-12-31"): bool {

    $d = date_create_from_format('Y-m-d', $date);
    if (!$d)  return false;
    $date = $d->format('Y-m-d');
    
    return $date >= $min && $date <= $max;
  }

  public static function dateTime(string $date): bool {

    $d = date_create_from_format('Y-m-d\TH:i', $date);
    if (!$d)  return false;

    return true;    
  }

  public static function examStartGreaterEnd(string $startAt, string $endAt): bool {

      $start = new DateTime($startAt);
      $end   = new DateTime($endAt);
      $sameDay = $start->format('Y-m-d') <= $end->format('Y-m-d');

      return $sameDay;
  }

  public static function examNotPast(string $startAt): bool {

    $start = new DateTime($startAt);
    $now   = new DateTime();

    return $start >= $now;
  } 

  public static function examEndAfterStart(string $startAt, string $endAt): bool {
    
    $start = new DateTime($startAt);
    $end   = new DateTime($endAt);

    return $end > $start;
  }


 public static function examTimeInsideWeek(string $startAt, string $endAt, int $week_id): bool {

    $start = new DateTime($startAt)->format('Y-m-d');
    $end   = new DateTime($endAt)->format('Y-m-d');
    
    $examDuration = App::resolve(Database::class)->query(
      'SELECT id 
       FROM   weeks 
       WHERE  id = :week_id 
       AND (start_date <= :start_at AND end_date >= :end_at)',
      [
          'start_at'        => $start,
          'end_at'          => $end,
          'week_id'         => $week_id
      ]
    )->find();

    return (bool) $examDuration;
 }
        
  
  public static function courseWeeks(string $start_date, string $end_date) {
    
    $d = $end_date > $start_date;
    
    if (!$d)  return false;

    return true;
  } 

  public static function weekDuration(string $start_date, string $end_date) {
    
    $diff = strtotime($end_date) - strtotime($start_date);
    $diff = floor($diff / (60 * 60 * 24)); 
    return $diff <= 7  && $diff >= 0;    
  } 

  public static function overlapWeeks(string $start_date, string $end_date, int $course_id, int $week_id): bool {
    
    $overlap = App::resolve(Database::class)->query(
        'SELECT id 
         FROM   weeks 
         WHERE  course_id = :course_id 
         AND    id       != :current_week_id
         AND (start_date <= :end_date AND end_date >= :start_date)',
        [
            'course_id'       => $course_id,
            'start_date'      => $start_date,
            'end_date'        => $end_date,
            'current_week_id' => $week_id,
        ]
    )->find();

      return !$overlap;
  }

  public static function orderWeeks(string $start_date, int $course_id, int $week_id): bool {
    
    $lastWeek = App::resolve(Database::class)->query(
        'SELECT id, end_date 
         FROM   weeks 
         WHERE  course_id = :course_id
         AND    id       != :current_week_id
         ORDER BY end_date DESC 
         LIMIT 1',
        [
            'course_id'       => $course_id,
            'current_week_id' => $week_id
        ]
    )->find();

    if (!$lastWeek) return true;

    return $start_date > $lastWeek['end_date'];
  }

  public static function select(string|int $value, string $table): bool {
    
    $value =  $value > 0 ? $value : false;
    
    $id = App::resolve(Database::class)->query("SELECT id FROM {$table} WHERE id = :id", [
      
      'id' => $value
    ])->find();
      
      if (!$id) return false;
      
      return true;
  }

  public static function checkCourseInstructor(array $value): bool {

      $instructor = App::resolve(Database::class)->query(
          'SELECT id 
           FROM instructors 
           WHERE id = :instructor_id 
           AND major_id = :major_id',
          [
              'instructor_id' => $value['instructor_id'],
              'major_id'      => $value['major_id'],
          ]
      )->find();

      return (bool) $instructor;
  }

  public static function role(string $role): bool {

    $role =  strlen($role) > 0 ? $role : false;
    
    $allowedRoles = ['admin', 'student', 'instructor'];
    if (!in_array($role, $allowedRoles)) return false;
    return true;
  }


  public static function file($file, int $min = 1, int $max = 5): bool {

    if (isset($file) && $file['error'] === 0) {

      $minSize = $min * 1024;
      $maxSize = $max * 1024 * 1024;
      if ($file['size'] >= $minSize && $file['size'] <= $maxSize) {

          $allowedExtensions = ['ppt', 'pdf', 'pptx', 'txt'];
          $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
          if (in_array($extension, $allowedExtensions)) {
            
              $allowedMimeTypes = ['application/pdf', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'text/plain'];
              $mimeType = mime_content_type($file['tmp_name']);
              if (in_array($mimeType, $allowedMimeTypes)) {
                    return true;
              }
          }
      }
    }
      return false;

  }

  public static function url($link) {

      $link = trim($link);

      if (empty($link)) return false;

      if (!filter_var($link, FILTER_VALIDATE_URL)) return false;

      $host = strtolower(parse_url($link, PHP_URL_HOST));

      if (
          str_contains($host, 'youtube.com') ||
          str_contains($host, 'youtu.be')
      ) {
          return true;
      }

      return false;
  }

  public static function hourYear(string|int $num, $min = 1, $max = 5): bool {
   
    $num = (int)$num;
    return $num >= $min && $num <= $max;
  }

  public static function email(string $value): bool{
    
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }   

  public static function image(array $file, int $min = 1, int $max = 15): bool{
        
    if (isset($file) && $file['error'] === 0) {

      $minSize = $min * 1024;
      $maxSize = $max * 1024 * 1024;
      if ($file['size'] >= $minSize && $file['size'] <= $maxSize) {

          $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
          $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
          if (in_array($extension, $allowedExtensions)) {
            
              $allowedMimeTypes = ['image/jpg', 'image/png', 'image/webp', 'image/jpeg'];
              $mimeType = mime_content_type($file['tmp_name']);
              if (in_array($mimeType, $allowedMimeTypes)) {

                // تأكيد أنها صورة فعلية
                if (getimagesize($file['tmp_name'])) {
                  
                    return true;
                }
              }
          }
      }
    }
      return false;

  } 
  
  
  public static function grade(int $grade, int $total_grade) {

    return $grade >= 0 && $grade <= $total_grade;
  }
  
  public static function total_grade(int $total_grade) {

     return $total_grade >= 0 && $total_grade <= 100;
  }
  
}

  