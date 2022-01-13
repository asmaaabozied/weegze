<?php

namespace App\Http\Controllers;

use App\Helpers\SocialiteHelper;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateRequest;

use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Kreait\Laravel\Firebase\Facades\Firebase;

use Validator;

class UserController extends Controller
{

    public function loginpassword(Request $request)
    {


    }



}
