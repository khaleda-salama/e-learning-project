<?php

namespace Core;
use Core\Validator;



class ExamTimeValidator {

    protected $errors  = [];


    public static function make(string $start_at, string $end_at, int $week_id = 0) : static {
        $validator = new static();
        $validator->validate($start_at, $end_at, $week_id);
        return $validator; 
    }


    public function validate(string $start_at, string $end_at, int $week_id) : void {

        
        if (!Validator::examStartGreaterEnd($start_at, $end_at)) {
            $this->errors['exam_StartGreaterEnd'][] = 'يجب ان يكون تاريخ بداية الاختبار اكبر او تساوي من تاريخ نهاية الاختبار ';
        }
        if (!Validator::examEndAfterStart($start_at, $end_at)) {
            $this->errors['exam_EndAfterStart'][] = 'وقت انتهاء الاختبار اقل من وقت الابتداء';
        }
        if (!Validator::examTimeInsideWeek($start_at, $end_at, $week_id)) {
            $this->errors['exam_TimeInsideWeek'][] = 'تاريخ الاختبار يجب ان يكون من ضمن فترة الاسبوع المتواجد فيه';
        }
        if (!Validator::examNotPast($start_at)) {
           $this->errors['exam_NotPast'][] = 'لا يمكن إنشاء اختبار بوقت ماضي';
        }

    }  


    public function errors() {
        return $this->errors;    
    }


}