<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use app\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;






class ProfileController extends Controller

{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profile.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function create($user)
    {
        return view('profile.create', compact('user'));
    }



    public function Store(User $user, Request $request)
    {



        $request = request()->validate([

            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'url' => 'required|',
            'image' => 'image',


        ]);






        auth()->user()->profile()->create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'description' => $request['description'],
            'url' => $request['url'],



        ]);

        return redirect('/profile/' . auth()->user()->id);
    }


    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }


    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user->profile);


        $data = request()->validate([
            'title' => 'max:255',
            'description' => 'max:255',
            'url' => '',

        ]);






            auth()->user()->profile->update(array_merge(
                $data,




            ));


            return redirect("/profile/{$user->id}");


        }

    public function UploadAvatar(Request $request){

        if ($request->hasFile('image')) {
            Profile::UploadAvatar($request->image);

            return redirect()->back()->with('message','image uploaded.');
        }



        return redirect()->back();





    }



}
