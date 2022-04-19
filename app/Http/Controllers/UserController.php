<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        
        $data = User::select('id','name','username','phone_number','email')
                    ->when($search,function($query,$search){
                        return $query->where('name','like',"%{$search}%");
                    })
                    ->orderBy('id')
                    ->paginate('10');
    
            return view('pages.user_dashboard.index',['data'=>$data]);
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
    public function store(Request $request)
    {
        //
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
        return view('pages.user_dashboard.edit',['item'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => "required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/|",
            'username' => "required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/|unique:users,username,{$user->id}",
            'phone_number' => "required|numeric|unique:users,phone_number,{$user->id}",
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|confirmed|min:4',
        ]);

        if ($request->password){
            $arr = [
                'name' => $request->name,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
        } else {
           
            $arr = [
                'name' => $request->name,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
            ];
          
        }

        $user->update($arr);

        return redirect()->route('user.index')->with('toast_success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('toast_success', 'Data Berhasil Di Hapus!');
    }
}
