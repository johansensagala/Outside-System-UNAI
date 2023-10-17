<?php

namespace App\Http\Controllers;

use App\Models\BiroKemahasiswaan;
use Illuminate\Http\Request;

class PenjaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('biro_kemahasiswaan.penjamin.index', [
            'categories' => BiroKemahasiswaan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => BiroKemahasiswaan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:categories'
        ]);

        BiroKemahasiswaan::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiroKemahasiswaan  $biroKemahasiswaan
     * @return \Illuminate\Http\Response
     */
    public function show(BiroKemahasiswaan $biroKemahasiswaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiroKemahasiswaan  $biroKemahasiswaan
     * @return \Illuminate\Http\Response
     */
    public function edit(BiroKemahasiswaan $biroKemahasiswaan)
    {
        return view('dashboard.categories.edit', [
            'biroKemahasiswaan' => $biroKemahasiswaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiroKemahasiswaan $biroKemahasiswaan)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        if($request->slug != $biroKemahasiswaan->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        BiroKemahasiswaan::where('id', $biroKemahasiswaan->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BiroKemahasiswaan $biroKemahasiswaan)
    {
        BiroKemahasiswaan::destroy($biroKemahasiswaan->id);
        return redirect('/dashboard/categories')->with('success', 'category has been deleted!');
    }
}
