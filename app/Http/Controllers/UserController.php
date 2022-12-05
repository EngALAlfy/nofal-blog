<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\ErrorHandler\Collecting;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->larafyTable($request, User::class ,User::query(), [] , []);
        return view('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $photo = $data['photo'];
        if (isset($photo)) {
            $photoname = Time() . "-" . $photo->getClientOriginalName();
            $dirname = "photos/users/";
            $photo->storePubliclyAs($dirname, $photoname, 'public');
            $data["photo"] = $photoname;
        }

        $user = User::create($data);


        session()->flash('success', __('messages.added_successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('users.edit' , compact( 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $data = $request->validated();

        $photo = $data['photo'];
        if (isset($photo)) {
            Storage::disk('public')->delete("photos/users/" . $user->photo);
            $photoname = Time() . "-" . $photo->getClientOriginalName();
            $dirname = "photos/users/";
            $photo->storePubliclyAs($dirname, $photoname, 'public');
            $data["photo"] = $photoname;
        }

        $user->update($data);

        session()->flash('success', __('messages.updated_successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('public')->delete("photos/users/" . $user->photo);
        $user->posts()->delete();
        $user->comments()->delete();
        $user->delete();
        session()->flash('success', __('messages.deleted_successfully'));
        return back();
    }
}
