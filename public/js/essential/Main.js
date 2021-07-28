
import Instructor from '../core/Instructor.js';
import Course from '../core/Course.js';
import Class from '../core/Class.js';
import Room from '../core/Room.js';
import Library from '../core/Library.js';
import MeetingTime from '../core/MeetingTime.js';
import Department from '../core/Department.js';
import Data from '../essential/Data.js'
import Driver from '../essential/Driver.js';
import Population from '../essential/Population.js';
import GeneticAlgorithm from '../essential/GeneticAlgorithm.js';


let courses = [];
let doctors = [];
let rooms = [];
let libraires = [];
let meetingTimes = [];
let practicalMeetingTimes = [];
let depts = [];

let btn = document.querySelector('#geneBtn');
let btn2 = document.querySelector('#loadData');
let coursesData = $.parseJSON(document.querySelector('#course').value);
let docCourseData = $.parseJSON(document.querySelector('#docCourse').value);
let doctorsData = $.parseJSON(document.querySelector('#doctors').value);
let roomsData = $.parseJSON(document.querySelector('#rooms').value);
let librariesData = $.parseJSON(document.querySelector('#libraries').value);
let meetingTimesData = $.parseJSON(document.querySelector('#meetingTimes').value);
let practicalMeetingTimesData = $.parseJSON(document.querySelector('#practicalMeetingTimes').value);
let DepartmentsData = $.parseJSON(document.querySelector('#depts').value);

// add Courses
coursesData.forEach(element => {
    courses.push(new Course(element.id, element.name, element.year, element.semester, element.section));
});

// add Doctors
doctorsData.forEach(element => {
  doctors.push(new Instructor(element.id, element.name));
});

// add Rooms
roomsData.forEach(element => {
  rooms.push(new Room(element.number, element.seatingCapacity));
});

// add Libraries
librariesData.forEach(element => {
  libraires.push(new Library(element.number, element.seatingCapacity));
});

// add MeetingTimes
meetingTimesData.forEach(element => {
  meetingTimes.push(new MeetingTime(element.id, element.time));
});

// add PraticalMeetingTimes
practicalMeetingTimesData.forEach(element => {
  practicalMeetingTimes.push(new MeetingTime(element.id, element.time));
});
// add Departments
DepartmentsData.forEach(element => {
  depts.push(new Department(element.name, element.number));
});

// add Courses to Depts

depts.forEach(dept => {
    courses.forEach(course => {
        if(dept.getNumber() == course.getSection())
        {
          dept.addCourse(course);
        }
    });
});


// add Doctors To Courses
courses.forEach(element => {
  docCourseData.forEach(element2 => {
    if(element.number == element2.course_id)
    {
      element.addInstructor(doctors[findDoctor(element2.doctor_id)]);
    }
  });
});


let driver = new Driver();
driver.data = new Data(courses, doctors, rooms, libraires, depts, meetingTimes);

let gene = new GeneticAlgorithm(driver.data);
let pop = new Population(5, driver.data).sortByFitness();
let generationNumber = 0;



btn.addEventListener('click', function(){
  while(pop.getSchedules()[0].getFitness() < 1)
  {
    generationNumber++;
    pop = gene.evolve(pop).sortByFitness();
    console.log(pop.getSchedules()[0]);    
  }
});



btn.addEventListener('click', function() {
  while(pop.getSchedules()[0].getFitness() < 1)
  {
    generationNumber++;
    pop = gene.evolve(pop).sortByFitness();
    console.log("Current Fitness:  " + pop.getSchedules()[0].getFitness() + "     ||     " + "Current Number Of Conflicts:  " + pop.getSchedules()[0].getNumberOfConflicts());    
  }

});

btn2.addEventListener('click', function() {
  btn.classList.add('hide');

  pop.getSchedules()[0].getClasses().forEach(element => {
      let h1 = document.createElement("h1");
      let text = document.createTextNode(element.getInstructor().getName() + " " + element.getCourse().getName() + " " + element.getMeetingTime().getTime());
      h1.appendChild(text);
      //d.appendChild(h1);
  }); 
});



function findDoctor(id) 
{
  for(let i = 0; i < doctors.length; i++)
  {
    if(doctors[i].id == id)
    {
      return i;
    }
  }
}


