<?php

use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('Paginate_number',10);
define('Limit',10);
define('User_image_path','uploads/user_images/');
define('Admin_path','uploads/admins/');
define('Courses_path','uploads/courses_files/');
define('news_images','uploads/');
define('UserMetasKeys',['country'=>'text','city'=>'text','birthdate'=>'date','position'=>'text','firebase_token'=>'hidden']); // Keys To add To User Metas Table
define('AdminMetasKeys',['country'=>'text','city'=>'text','firebase_token'=>'hidden']); // Keys To add To User Metas Table




function get_locale_changer_url($locale){
    return LaravelLocalization::getLocalizedURL($locale,url()->current());
}

function locales(){
    $localizations = [];
    foreach(LaravelLocalization::getSupportedLocales() as $key => $value){
        $localizations[$key] = $value['native'];
    }
    return $localizations;
}

if (!function_exists('customer')) {
    function customer() {
//        Auth::guard('customer')
        return auth()->guard('customer');
    }


}



?>
