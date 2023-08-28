<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Store;
use App\Http\Requests\Admin\Update;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::get();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Admin $admin)
    {
        
        $data=$request->validated();
        if($request->has('password') and $request->get('password'))
        {
            $data['password']=Hash::make($request->password);
        }
        $admin->update($data);
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index');
    }
}
