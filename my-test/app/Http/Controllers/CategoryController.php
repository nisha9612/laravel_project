<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{

     public function index()
    {
        // show all category

        $data = Category::all();
 
        return view('category.index', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //show form to create a category

        return view('category.create');
    }

    public function store(Request $request)
    {
        
         // Form validation
      $this->validate($request, [
          'raw_material' => 'required',
          'finish_goods' => 'required',
          'spares' => 'required',
          'machines'=>'required',
          'others' => 'required'
       ]);

          //  Store data in database
        Category::create($request->all());
        return redirect('category')->with('success', 'Your category has been submitted.');

    }

    public function show(Category $Category)
    {
        //show a category

        return view('category.show',compact('Category'));


    }

    public function edit(Category $category)
    {
        //show form to edit the category

        return view('category.edit',compact('category'));

    }

    
    public function update(Request $request, Category $category)
    {
        //save the edited category

        $request->validate([
            'raw_material' => 'required',
            'finish_goods' => 'required',
            'spares' => 'required',
            'machines' => 'required',
            'others' => 'required',
        ]);
    
        $category->update($request->all());
    
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }

}
