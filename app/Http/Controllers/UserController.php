<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function UploadAvatar(Request $request){

        if ($request->hasFile('image')) {
           User::UploadAvatar($request->image);

            return redirect()->back()->with('message','image uploaded.');
        }



        return redirect()->back();





    }



}
