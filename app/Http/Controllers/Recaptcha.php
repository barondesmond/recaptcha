<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Recaptcha extends Controller
{
    public function index(Request $request) {

      //URL: https://www.google.com/recaptcha/api/siteverify METHOD: POST
      /*
      POST Parameter	Description
      secret	Required. The shared key between your site and reCAPTCHA.
      response	Required. The user response token provided by the reCAPTCHA client-side integration on your site.
      remoteip	Optional. The user's IP address.
      */


      $url = env('RECAPTCHA_URL');
      $vars['secret'] = env('RECAPTCHA_SECRET');
      $vars['response'] = $request->input('g-recaptcha-response');
      $header['header'] = "Content-type: application/x-www-form-urlencoded\r\n";
      $header['method'] = 'POST';
      $header['content'] = http_build_query($vars);
      $options['http'] = $header;

      $context = stream_context_create($options);
      $json = @file_get_contents($url, false, $context);
      $db = @json_decode($json, 1);
      return view('welcome', ['response'=>$db]);



    }
}
