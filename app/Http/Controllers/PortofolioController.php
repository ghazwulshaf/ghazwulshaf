<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
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
        $data = [
            'name' => $request->input('portofolio-new-name'),
            'category_id' => $request->input('portofolio-new-category'),
        ];

        $file = $request->file('portofolio-new-file');

        if ($file) {
            $name = $request->input('portofolio-new-name');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Portofolio::destroy($id);

        return back();
    }
}
