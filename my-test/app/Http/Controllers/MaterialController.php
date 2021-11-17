<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Category;
use DB;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all material
        //DB::enableQueryLog();

        $data = DB::table('material')
            ->join('category', 'category.id', '=', 'material.category_id')
            ->select('material.id','category.raw_material', 'material.material_name','material.opening_bal')
            ->get();
        //$quries = DB::getQueryLog();
        //dd($quries);

        return view('material.index', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show form to create a material
        $category = Category::all("raw_material","id");
        return view('material.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form validation
      $this->validate($request, [
          'material_name' => 'required|alpha_num',
          'category_id' => 'required',
          'opening_bal' => 'required|regex:/^\d+(\.\d{1,2})?$/',
       ]);

          //  Store data in database
        Material::create($request->all());
        return redirect('material')->with('success', 'Your material has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //show a material

        return view('material.show',compact('Material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //show form to edit the material
        $category = Category::all("raw_material","id");
        return view('material.edit',compact('material','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //save the edited material

        // Form validation
      $this->validate($request, [
          'material_name' => 'required|alpha_num',
          'category_id' => 'required',
          'opening_bal' => 'required|regex:/^\d+(\.\d{1,2})?$/',
       ]);

          //  Update data in database
        $material->update($request->all());
        return redirect('material')->with('success', 'Material updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
    
        return redirect()->route('material.index')
                        ->with('success','Material deleted successfully');
    }
}
