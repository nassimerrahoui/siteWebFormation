<?php

class helper
{
    public static function menu ($link, $icon, $name)
    {
        $nav = '<li><a href="' . BASE_URL . '/'.$link.'"><i class="'.$icon.'"></i><span>'.$name.'</span></a></li>';

        return $nav;
    }

    public static function dropdown ($icon, $label, $data, $name)
    {
        $notification = '<li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="'.$icon.'"></i>
                            <span class="label label-'.$label.'">'.$data.'</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Vous disposez de '.$data.' '.$name.'</li>
                        </ul>
                    </li>';

        return $notification;
    }
}