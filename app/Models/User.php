<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Self_;
use PhpParser\Node\Stmt\Static_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
       'name' ,'username', 'email' , 'password' , 'avatar',
   ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function UploadAvatar($image){


            $filename = ($image->getClientOriginalName());
        (new self())->DeleteOldImage();

            $image->storeAs('images', $filename , 'public');

        auth()->user()->update(['avatar'=> $filename]);


    }



    protected function DeleteOldImage(){
        if ($this->avatar){

            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }

    public function todos(){
        return $this->hasMany(Todo::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    public function posts(){
        return $this->hasMany(post::class)->orderBy('created_at', 'DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }



    //protected static function boot()
    //{
       // parent::boot();

       // static::created(function ($user) {
            //$user->profile()->create([


               // 'title' => $user->username,
           // ]);




        //});
    //}





}
