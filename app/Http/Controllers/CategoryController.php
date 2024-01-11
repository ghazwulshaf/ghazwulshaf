<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $name = $request->input('category-new-name');
        $file = $request->file('category-new-file');
        $fileName = date('Y-m-d').'-'.Str::of($name)->slug('-').'.'.$file->extension();

        $path = $file->storeAs('categories', $fileName, 'public');

        $data = [
            'name' => $name,
            'file_name' => $fileName,
            'path' => $path,
        ];

        Category::create($data);

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
        $oldCategory = Category::find($id)->first();

        $name = $request->input('category-'.$id.'-name');
        $file = $request->file('category-'.$id.'-file');

        $newData = [];

        if ($file) {
            Storage::delete($oldCategory['path']);

            $fileName = date('Y-m-d').'-'.Str::of($name)->slug('-').'.'.$file->extension();
            $path = $file->storeAs('categories', $fileName, 'public');

            $newData['file_name'] = $fileName;
            $newData['path'] = $path;
        }


        $newData['name'] = $name;

        Category::findOrFail($id)
            ->update($newData);

        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);

        return redirect()->route('admin.user');
    }
}
