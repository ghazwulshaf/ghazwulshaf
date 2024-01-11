<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('account-new-name'),
            'link' => $request->input('account-new-link'),
            'icon' => $request->input('account-new-icon'),
        ];

        Account::create($data);

        return redirect()->route('admin.user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newData = [
            'name' => $request->input('account-'.$id.'-name'),
            'link' => $request->input('account-'.$id.'-link'),
            'icon' => $request->input('account-'.$id.'-icon'),
        ];

        Account::findOrFail($id)
            ->update($newData);

        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Account::destroy($id);

        return redirect()->route('admin.user');
    }
}
