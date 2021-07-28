<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Pdf;
use App\subject;
use App\doctor_subject;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user=Auth::user();
      $user=Auth::user();
      $idd=Auth::user()->id;
      $year = Auth::user()->year;
      $subjects = subject::where(['year'=> $year])->get('id');
      $doctor_ids = doctor_subject::whereIn('subject_id', $subjects)->get('user_id');
      $doctor_year = User::whereIn('id', $doctor_ids)->get();
      $post=Post::orderby('id','DESC')->get();
        return view('student.student',compact('user','post', 'doctor_year'));
        return view('student.student',compact('user'));
    }
    public function index2()
    {
      $user=Auth::user();
        return view('student.student_profile',compact('user'));
    }
    public function index3()
    {
      $user=Auth::user();
        return view('admin.createpost',compact('user'));
    }
    public function index5()
    {
      $user=Auth::user();
        return view('doctor.createpost',compact('user'));
    }

    public function indexlec()
    {
        $user=Auth::user();
        $idd=Auth::user()->id;
        $lec=Pdf::where(['user_id' => $idd])->paginate(3);
        return view('doctor.lec',compact('user','lec'));
    }


    public function index4(){
      $user=Auth::user();
      $idd=Auth::user()->id;
      $post=Post::where(['user_id' => $idd])->orderby('id','DESC')->get();
      return view ('doctor.doctor',compact('post','user'));
    }

    public function showeditpost($id){
      $user=Auth::user();
      $post=Post::where(['id'=> $id])->first();

        return view('doctor.editpost',compact('user','post'));
    }

    public function lectureLoad() {
      $user=Auth::user();
      $year = Auth::user()->year;
      $pdfs = Pdf::where(['year' => $year])->get();
      return view('student.lectuers',compact('user','pdfs'));
    }

    public function showAssistant() {
      $user=Auth::user();
      $post=Post::orderby('id','DESC')->get();
      return view('assistant.assistant', compact('user', 'post'));
    }

}
