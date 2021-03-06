<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        /*$file = fopen('orders.txt', 'a+'); // Open .txt file
        $content = json_encode($request->except('_token')) . PHP_EOL; // format data
        fwrite($file , $content);
        fclose($file );
        die(header("Location: ".$_SERVER["HTTP_REFERER"]));*/

        $content = json_encode($request->except('_token')) . PHP_EOL; // format data
        //Storage::disk('local')->put('example1.txt', file_put_contents($content));
        Storage::append('filename.txt', $content);
        // die(header("Location: ".$_SERVER["HTTP_REFERER"]));
        if($content) {
            return redirect()->route('news')->with('success', 'Данные получены');
        }

        return back()->with('error', 'Ошибка')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user = $user->fill($request->validated())->save();

        if($user) {
            return redirect()->route('admin.users.index')->with('success', __('messages.admin.user.update.success'));
        }

        return back()->with('error', __('messages.admin.user.update.fail'))->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
