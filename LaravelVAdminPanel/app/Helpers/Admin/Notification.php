<?php


namespace App\Helpers;


class Notification
{

    public static function addNotification( $status, $title, $link = null , $type = null ) : int
    {
        $notification = new \App\Models\Notification;
        $notification->title = $title;
        $notification->link = $link;
        $notification->type = $type;
        $notification->status = $status;
        $notification->save();
        return $notification->id;
    }
}
