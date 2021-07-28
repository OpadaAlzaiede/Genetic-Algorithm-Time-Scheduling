<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post;

class testAjax extends Controller
{
    public function filter(Request $req) {
        if($req->ajax()) {
          if($req->author == 'all') {
            $posts = post::all();
          } else {
            $doc_id = User::where(['name' => $req->author])->first()->id;
            $posts = Post::where(['user_id' => $doc_id])->get();
          }
    
          echo json_encode($posts);
        }
      }

      public function sendToFront(Request $req) {
        if($req->ajax()) {
          echo json_encode("hello");
        }
      }
}
