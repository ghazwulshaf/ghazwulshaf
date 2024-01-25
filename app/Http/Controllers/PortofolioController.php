<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortofolioController extends Controller
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
        $name = $request->input('portofolio-new-name');

        $data = [
            'name' => $name,
            'category_id' => $request->input('portofolio-new-category'),
        ];

        $file = $request->file('portofolio-new-file');

        if ($file) {
            $name = $name;
            $fileName = date('Y-m-d').'-'.Str::of($name)->slug('-').'.'.$file->extension();

            $path = $file->storeAs('portofolios', $fileName, 'public');

            $data['path_image'] = $path;
        }

        $content = $request->input('portofolio-new-content');

        if ($content) {
            $data['content'] = $content;
        }

        Portofolio::create($data);

        return redirect()->route('admin.portofolio');
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
        $oldPortofolio = Portofolio::findOrFail($id)->first();

        $name = $request->input('name');
        $category = $request->input('category');
        $file = $request->file('file');
        $content = $request->input('content');

        $newData = [
            'name' => $name,
            'category_id' => $category,
            'content' => $content,
        ];

        if ($file) {
            if ($oldPortofolio['path_image']) {
                Storage::delete($oldPortofolio['path_image']);
            }

            $fileName = date('Y-m-d').'-'.Str::of($name)->slug('-').'.'.$file->extension();
            $path = $file->storeAs('portofolios', $fileName, 'public');

            $newData['path_image'] = $path;
        }

        Portofolio::findOrFail($id)
            ->update($newData);

        return redirect()->route('admin.portofolio.view', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Portofolio::destroy($id);

        return redirect()->route('admin.portofolio');
    }
}
