<?php


namespace App\Helpers;


class DTHelper
{

    public static function dtImageButton($image)
    {


        $html = <<< HTML

    <img src="{{asset('uploads/'.$image->image)}}" border="0" width="10" class="img-rounded" align="center" />

HTML;

        return $html;

    }


    public static function dtEditButton($link, $title, $permission)
    {

        if (auth()->user()->hasPermission($permission)) {

            $html = <<< HTML
 <a href="$link" > <i class="material-icons  fa fa-1x ">edit</i> </a>
HTML;


            return $html;
        } else {

            $html = <<< HTML
 <a href="$link" > <i class="material-icons  fa fa-1x ">edit</i> </a>
HTML;


            return $html;
        }

    }

    public static function dtBlockActivateButton($link, $status, $permission)
    {

        $blockTitle = trans('site.block');
        $activateTitle = trans('site.activate');
        $statusTitle = ($status) ? $blockTitle : $activateTitle;
        $csrf = csrf_field();
        $method_field = method_field('POST');
        $classType = ($status) ? "btn-warning" : "btn-default";
        $iconName = ($status) ? "fa-ban" : "fa-user";

        if (auth()->user()->hasPermission($permission)) {
            $html = <<< HTML
 <form action="$link" method="post" style="display: inline-block">
$csrf
$method_field
<a type="submit" class="update">

<i class="material-icons">person_outline</i>
</a>
</form>
HTML;
            return $html;
        }

    }

    public static function dtDeleteButton($link, $title, $permission)
    {


        $csrf = csrf_field();
        $method_field = method_field('delete');

        $html = <<< HTML
 <form action="$link" method="post" style="display: inline-block">
$csrf
$method_field
<a type="submit" class="delete btn-sm">
<i class="material-icons  fa fa-1x">delete</i>
</a>
</form>
HTML;


        return $html;


    }


    public static function dtShowButton($link, $title, $permission)
    {

        if (auth()->user()->hasPermission($permission)) {

            $html = <<< HTML
 <a href="$link" ><i class="material-icons  fa fa-1x">remove_red_eye</i></a>
HTML;


            return $html;
        } else {

            $html = <<< HTML
 <a href="$link" ><i class="material-icons  fa fa-1x">remove_red_eye</i></a>
HTML;


            return $html;

        }

    }

}
