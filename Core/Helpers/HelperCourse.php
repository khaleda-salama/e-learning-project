<?php



function course_years(): array {
    
    return [
        1 => 'سنة أولى',
        2 => 'سنة ثانية',
        3 => 'سنة ثالثة',
        4 => 'سنة رابعة',
        5 => 'سنة خامسة'
    ];
}


function courseHour(): array {

     return range(1, 4);
}
function isCorrect(): array {

     return [
        0 => 'خاطئة',
        1 => 'صحيحة'
     ];
}
 
