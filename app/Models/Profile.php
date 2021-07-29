<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Controllers\ProfileController;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);


    }

    public static function UploadAvatar($image){


        $filename = ($image->getClientOriginalName());
        (new self())->DeleteOldImage();

        $image->storeAs('images', $filename , 'public');

        auth()->user()->profile->update(['image'=> $filename]);


    }

    protected function DeleteOldImage()
    {
        if ($this->image) {

            Storage::delete('/public/images/' . auth()->user()->image);
        }
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}

