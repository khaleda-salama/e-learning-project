 
//  =========================================Start Dashboard Admin Page=========================================

// Show Every Pages In Dashboard

let lis = document.querySelectorAll('.list-item');

lis.forEach(li => {

    li.addEventListener('click', () => {

        let link = li.dataset.link;
        location.href = link;             
    })
        
});  


function redirect(className, uri, id) {

    document.querySelectorAll(className).forEach(row => {
        row.addEventListener('click', (e) => {

            const element = e.target.closest(className);

            if (!element) return;

            const url = element.dataset[id];

            location.href = `${uri}=${url}`;

        });
    });
}

// Show A Single Course 
redirect('.table-row', '/course?id', "courseId");

// Show A Single Semster 
redirect('.table-row-semster', '/semster/show?id', 'semsterId');

// Show A Single Student
redirect('.table-row-student', '/student/show?id', 'studentId'); 

// Show A Single Instructor
redirect('.table-row-instructor', '/instructor/show?id', 'instructorId');

// Show A Single Exam
redirect('.table-row-exam', '/exams/submissions?id', 'examId');


 
 
//  Show Messege for User Or Courses If Existed Or Registered

let messages = document.querySelectorAll('.message');

messages.forEach(msg => {

    msg.addEventListener('animationend', () => {
    
        setTimeout(() => {
                msg.classList.add('message-exit');
        }, 3000);
   
        setTimeout(() => {
            
                msg.remove();
        }, 4000);
    });
    
})


// Hide Or Show Error Message Input Or Select Forms 

function errorValid($errors) {
    
    document.querySelectorAll($errors).forEach(error => {
      if (error.textContent.trim() !== '') {
        error.classList.add('show');
      }
    });
}

errorValid('.error');

function setupValidation(inputSelector, minLength = 1, maxLength = 255) {

    document.querySelectorAll(inputSelector).forEach(input => {

        let error = document.querySelector(`[data-error-for="${input.name}"]`);

        input.addEventListener('input', () => {

            let value = input.value.trim();

            let isValid = value.length >= minLength  && value.length <= maxLength;

            if (isValid) {
                error.classList.remove('show');
            } else { 
                error.classList.add('show');
              }
        });

    });
}


setupValidation('.input-username', 5);
setupValidation('.input-password', 7);
setupValidation('.textarea', 10);
setupValidation('.input', 10);



document.querySelectorAll('.select').forEach(select => {

    let error = document.querySelector(`[data-error-for="${select.name}"]`
    );

    select.addEventListener('change', () => {

        if (select.value !== '') {
            error.classList.remove('show');
        } else {
            error.classList.add('show');
        }

    });

});


// Filter The Instructor When We Chose Major 


document.querySelectorAll('.select-major-course').forEach(selectMajorCourse => {

    const instructorSelect =
        selectMajorCourse.closest('form')
        .querySelector('.select-instructor-course');

    const allInstructors = Array.from(
        instructorSelect.querySelectorAll('.instructor-major')
    );

    function filter() {

        const selectedMajorId = selectMajorCourse.value;

        instructorSelect
            .querySelectorAll('option:not([disabled])')
            .forEach(opt => opt.remove());

        if (!selectedMajorId) return;

        allInstructors.forEach(instructor => {

            if (instructor.dataset.majorId === selectedMajorId) {

                const option = instructor.cloneNode(true);
                instructorSelect.appendChild(option);
            }

        });
    }

    selectMajorCourse.addEventListener('change', filter);

    filter();
});




// Add fa-beat class To Icon Student In Dashboard Admin Page when Hover On Card


let cards = document.querySelectorAll('.main-card');

cards.forEach(card => {

    card.addEventListener('mouseenter', () => {
        
        const icon = card.querySelector('.card-icon');
        if (!icon) return;

        icon.classList.remove('fa-bounce');
        void icon.offsetWidth; 
        icon.classList.add('fa-bounce');
    });

    card.addEventListener('mouseleave', () => {
        const icon = card.querySelector('.card-icon');
        if (!icon) return;

        icon.classList.remove('fa-bounce');
    });

    card.addEventListener('click', () => {
        const page = card.dataset.page;
        if (page) {
            window.location.href = page;
        }
    });

});

//  =========================================End Dashboard Admin Page===========================================



// =========================================Start Dashboard Instructor Page=====================================

// Show A Single Course In Instructor Dashboard

let courseInstructor = document.querySelectorAll('.main-course-instructor');

 courseInstructor.forEach(course => {
    
     course.addEventListener('click', (e) => {
  
          let courseInstructorId = e.target.closest('.main-course-instructor').dataset.instructorCourse;
          location.href = `/instructor/course?id=${courseInstructorId}`;             
    })
          
 });
 
 
 // Show Or Hide Drop Down In Instructor Dashboard

function dropDownContent(dropDownSelector) { 
    const dropDowns = document.querySelectorAll(dropDownSelector);

    dropDowns.forEach(dropDown =>  {
        dropDown.addEventListener('click', () => {

            const card = dropDown.closest('.card');
            const icon = card.querySelector('.icon-drop-down');
            const courseContent = card.querySelector('.course-content');

            if (!icon || !courseContent) return;

            icon.classList.toggle('drop-down');

            if (!courseContent.classList.contains('content-visible')) {
                courseContent.classList.add('content-visible');

                courseContent.style.maxHeight = `${courseContent.scrollHeight}px`;

                setTimeout(() => {
                    courseContent.style.maxHeight = 'auto';
                }, 400);

                return;
            }

            courseContent.style.maxHeight = `${courseContent.scrollHeight}px`;

            setTimeout(() => {
                courseContent.style.maxHeight = '0px';
            }, 10);

            courseContent.classList.remove('content-visible');
        });
    });
}

dropDownContent('.icon-click');
dropDownContent('.course-week');




let smallPage = document.querySelector('.small-page');
let plusSigns = document.querySelectorAll('.plus-sign');
let boxes     = document.querySelectorAll('.box');

let currentWeekId = null; 

plusSigns.forEach(sign => {
    sign.addEventListener('click', () => {
        currentWeekId = sign.dataset.weekId;

        smallPage.classList.remove('close');
        smallPage.classList.add('open');

    });
});

let closed = document.querySelector('.closed');

if(closed)  {

    closed.addEventListener('click', () => {
        smallPage.classList.remove('open');
        smallPage.classList.add('close');
    
        sessionStorage.setItem('modal', 'close');
    });
}


boxes.forEach(box => {
    box.addEventListener('click', () => {

        if (!currentWeekId) return;

        let type = box.dataset.type; 

        location.href = `/${type}/create?week_id=${currentWeekId}`;
    });
});



// =========================================End Dashboard Instructor Page======================================




