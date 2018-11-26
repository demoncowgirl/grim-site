<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PagesController extends Controller
{
        public function getHome() {
        return view('pages/home');
    }
        public function getAbout() {
          $header_title = "About the band";
        return view('pages/about')->with("header_title", $header_title);
    }
        public function getContact() {
          $header_title ="Contact Us";
          $bandphone = "(818)492-8690";
          $bandemail = "boboedy@yahoo.com";
          $bandaddress = [
            'bandcontact' => 'The Grim C/O Bob Oedy',
            'bandstreetaddress' => '20612 Mandell Street',
            'bandcity' => 'Winnetka',
            'bandstate'=> 'CA',
            'bandzip' => '91306',
            'bandcountry'=> 'USA'
          ];
        return view('pages/contact')->with("header_title", $header_title)->with("bandemail", $bandemail)->with("bandphone", $bandphone)->withBandaddress($bandaddress);
      }
          public function getMerch() {
            $header_title = "Buy Our Stuff!";
          return view('pages/merch')->with('header_title', $header_title);
      }
          public function getPhotos() {
            $header_title = "Check Us Out!";
          return view('pages/photos')->with('header_title', $header_title);
      }
          public function getPress() {
            $header_title = "The Press Loves Us!";
          return view('pages/press')->with('header_title', $header_title);
      }
          public function getBlog() {
            $header_title = "Blog Posts";
          return view('pages/blog')->with('header_title', $header_title)-with('posts', $posts);
      }
          public function store() {
            return view('posts/store');
      }
          public function create() {
            return view('posts/create');
      }
          public function show(){
            return view('posts/show');
      }
          public function update(){
            return view('posts/update');
      }
          public function edit(){
            return view('posts/edit');
      }

        public function register(){
          return view('auth/register');
      }
          public function getRegister(){
            return view('auth/register');
      }
          public function getSingle(){
            return view('single');
      }
          public function getLogout(){
            return view('pages/home');
          }

          public function getAdmin(){
            return view('auth/admin');
      }

      public function getMessages() {
        $header_title = "Messages";
      return view('pages/messages')->with('header_title', $header_title)-with('messages', $messages);
  }
      public function storeMessages() {
        return view('messages/store');
  }
      public function createMessages() {
        return view('messages/create');
  }
      public function showMessages(){
        return view('messages/show');
  }

}
