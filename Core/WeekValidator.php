<?php

namespace Core;
use Core\Validator;



class WeekValidator {

    protected $errors  = [];


    public static function make(string $start_date, string $end_date,int $course_id, int $week_id = 0) : static {
        $validator = new static();
        $validator->validate($start_date, $end_date, $course_id, $week_id);
        return $validator; 
    }


    public function validate(string $start_date, string $end_date, int $course_id, int $week_id) : void {

        
        if (!Validator::courseWeeks($start_date, $end_date)) {
            $this->errors['course_weeks'][] = 'تاريخ النهاية يجب ان يكون بعد تاريخ البداية';
        }
        if (!Validator::overlapWeeks($start_date, $end_date, $course_id, $week_id)) {
            $this->errors['overlap_weeks'][] = 'تاريخ الاسبوع يتداخل مع اسبوع أخر للمادة';
        }
        if (!Validator::orderWeeks($start_date, $course_id, $week_id)) {
            $this->errors['order_weeks'][] = 'يجب ان يكون تاريخ بداية الاسبوع بعد تاريخ نهاية الاسبوع السابق للمادة';
        }
        if (!Validator::weekDuration($start_date, $end_date)) {
            $this->errors['durationWeek'][] = 'يجب ان يكون تاريخ الاسبوع في نفس السنة';
        }
    }  


    public function errors() {
        return $this->errors;    
    }


}