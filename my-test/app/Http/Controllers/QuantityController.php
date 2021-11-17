<?php

namespace App\Http\Controllers;

use App\Models\Quantity;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;
use DB;


class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all quantities list

        $data = Quantity::all();

        $material_list = DB::table('inwd_otwd_quantity')
            ->join('material', 'inwd_otwd_quantity.material_id', '=', 'material.id')
            ->join('category', 'inwd_otwd_quantity.category_id', '=', 'category.id')
            ->select('inwd_otwd_quantity.id','category.raw_material', 'material.material_name','material.opening_bal', 'inwd_otwd_quantity.inwd_outwd_qty','inwd_otwd_quantity.category_id')
            ->get();
        return view('quantity.index', compact('data','material_list'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show form to create a quantity form
        $category = Category::all("raw_material","id");
        $material = DB::table('material')
            ->join('category', 'category.id', '=', 'material.category_id')
            ->select('material.material_name','material.id')
            ->get();
        return view('quantity.create', compact('category','material'));
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
            'category_id' => 'required',
            'material_id' => 'required',
            'date' => 'required',
            'inwd_outwd_qty' => 'required|regex:/^\-?[0-9]\d*(\.\d+)?$/',
       ]);

          //  Store data in database
        Quantity::create($request->all());
        return redirect('quantity')->with('success', 'Your Inward Outward Quantity has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function show(Quantity $quantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function edit(Quantity $quantity)
    {
        //show form to edit the quantity
        //DB::enableQueryLog();

        $category = Category::all("raw_material","id");
        $material = DB::table('material')
            ->join('category', 'category.id', '=', 'material.category_id')
            ->select('material.material_name','material.id')
            ->get();
        $material_list = DB::table('inwd_otwd_quantity')
            ->join('category', 'inwd_otwd_quantity.category_id', '=', 'category.id')
            ->join('material', 'inwd_otwd_quantity.material_id', '=', 'material.id')
            ->select('category.raw_material', 'material.material_name','material.opening_bal', 'inwd_otwd_quantity.inwd_outwd_qty','inwd_otwd_quantity.category_id','inwd_otwd_quantity.material_id')
            ->where('inwd_otwd_quantity.id','=', $quantity->id)
            ->first();
        //print($material_list->category_id);
       // $quries = DB::getQueryLog();
       // dd($quries);
        return view('quantity.edit',compact('quantity','material_list','category','material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quantity $quantity)
    {
        //save the edited material

        // Form validation
      $this->validate($request, [
          'material_id' => 'required',
          'category_id' => 'required',
       ]);

          //  Update data in database
        $quantity->update($request->all());
        return redirect('quantity')->with('success', 'Material updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quantity $quantity)
    {
        $quantity->delete();
    
        return redirect()->route('quantity.index')
                        ->with('success','Quantity deleted successfully');
    }
}
