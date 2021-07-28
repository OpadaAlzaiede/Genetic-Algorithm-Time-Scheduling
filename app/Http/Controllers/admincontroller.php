<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;
use App\Post;
use App\Course;
use App\docCourse;
use App\Room;
use App\Library;
use App\MeetingTime;
use App\PracticalMeetingTime;
use App\Department;
use App\PracticalCourse;

class admincontroller extends Controller
{

    public function show3 (){
      $user=Auth::user();
      $course=Course::all();
      $practicalCourses=PracticalCourse::all();
      $doc_course=docCourse::all();
      $doctors=User::where(['groupid' => 1])->get();
      $assistants=User::where(['groupid' => 3])->get();
      $rooms=Room::all();
      $libraries=Library::all();
      $meetingTimes=MeetingTime::all();
      $practicalmeetingTimes=PracticalMeetingTime::all();
      $depts=Department::all();
      return view ('admin.time_tables',compact('user', 'course', 'practicalCourses', 'doc_course', 'doctors','assistants','rooms', 'libraries', 'meetingTimes', 'practicalmeetingTimes', 'depts'));

    }

    public function show (){
      $user=Auth::user();
      $idd=Auth::user()->id;
      $student=User::where(['groupid' => 0])->get();
      return view ('admin.admin_students',compact('student','user'));

    }
    public function show2 (){
      $user=Auth::user();
      $idd=Auth::user()->id;
      $post=Post::where(['user_id' => $idd])->orderby('id','DESC')->get();
      return view ('admin.admin',compact('post','user'));

    }

    public function showCourses (){
      $user=Auth::user();
      $course=Course::all();
      return view ('admin.admin_courses',compact('user', 'course'));

    }

    public function showdoctors (){
      $user=Auth::user();
      $doctor=User::where(['groupid' => 1])->get();
      return view ('admin.admin_doctors',compact('doctor','user'));

    }

    public function showAssistants (){
      $user=Auth::user();
      $assistant=User::where(['groupid' => 3])->get();
      return view ('admin.admin_assistants',compact('assistant','user'));

    }

    public function editstudent(Request $req ,$id){
      $val=User::find($id);
      $val-> name= $req ->input('name');
      $val-> year= $req ->input('year');
      $val-> section= $req ->input('section');
      $val-> college_num= $req ->input('college_num');
      $val->save();
      return redirect ('admin_students')->with('success','edit succesfoly');

    }
    public function editdoctor(Request $req ,$id){
      $val=User::find($id);
      $val-> name= $req ->input('name');
      $val-> year= $req ->input('year');
      $val-> section= $req ->input('section');
      $val-> phonenumber= $req ->input('phonenumber');
      $val->save();
      return redirect ('admin_doctors')->with('success','edit succesfoly');

    }
    public function deletestudent ($id){
      $val=User::find($id);
      $val->delete();
      return redirect ('admin_students')->with('success','delete succesfoly');
    }
    public function deletedoctor ($id){
      $val=User::find($id);
      $val->delete();
      return redirect ('admin_doctors')->with('success','delete succesfoly');
    }
    public function addstudent(Request $req){
        $this->validate($req,[
          'name'=>'required',
          'year'=>'required',
          'email'=>'required',
          'password'=>'required',
          'section'=>'required',
          'college_num'=>'required',
        ]);
        $a=$req->input('password');
        $pass=Hash::make($a);
        $val= new User;
        $val->name =$req ->input('name');
        $val->year =$req ->input('year');
        $val->email =$req ->input('email');
        $val->password =$pass;
        $val->section =$req ->input('section');
        $val->college_num =$req ->input('college_num');
        $val->save();
        return redirect ('admin_students')->with('success','data saved');
    }
    public function adddoctor(Request $req){
        $this->validate($req,[
          'name'=>'required',
          'year'=>'required',
          'email'=>'required',
          'password'=>'required',
          'section'=>'required',

        ]);
        $a=$req->input('password');
        $pass=Hash::make($a);
        $val= new User;
        $val->name =$req ->input('name');
        $val->year =$req ->input('year');
        $val->email =$req ->input('email');
        $val->groupid =1;
        $val->password =$pass;
        $val->section =$req ->input('section');

        $val->save();
        return redirect ('admin_doctors')->with('success','data saved');
    }

    public function addAssistant(Request $req){
      $this->validate($req,[
        'name'=>'required',
        'year'=>'required',
        'email'=>'required',
        'password'=>'required',
        'section'=>'required',

      ]);
      $a=$req->input('password');
      $pass=Hash::make($a);
      $val= new User;
      $val->name =$req ->input('name');
      $val->year =$req ->input('year');
      $val->email =$req ->input('email');
      $val->groupid =3;
      $val->password =$pass;
      $val->section =$req ->input('section');

      $val->save();
      return redirect ('admin_assistants')->with('success','data saved');
  }






}
