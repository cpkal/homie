<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admins.notification.index');
    }

    public function postNotification(Request $request) {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $image = $request->file('image');
        $title = $request->title;
        $message = $request->message;

        // if ($image) {
        //     $imagePath = $image->store('images', 'public');
        // } else {
        //     $imagePath = null;
        // }

        $data = [
            'title' => $title,
            'message' => $message,
        ];

        $users = User::all();

        foreach ($users as $user) {
            $notification = new Notification();
            $notification->title = $title;
            $notification->message = $message;
            $notification->user_id = $user->id;
            $notification->save();
        }

        return redirect()->route('notification')->with('success', 'Notification has been sent');
    }
}
