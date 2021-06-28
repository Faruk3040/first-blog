<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Dompdf;
use Exception;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class CategoriesController extends Controller
{
    public function view_categories()
    {
        $categories = Category::with('users')->get();


        return view('pages.categories.view_categories',compact('categories'));


    }

    public function add_new_category()
    {

        return view('pages.categories.add_new_category');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'alias' => 'required',
            'status' => 'required'

        ]);

        try {
            Category::create([
                'created_by_id'=>auth()->user()->id,
                'name' => $request ->name ,
                'alias' =>$request ->alias,
                'status' =>$request ->status,
            ]);

            return redirect()->back()->with('success', 'Successfully category created');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');

        }
    }

    public function edit(int $id)
    {
        $category = Category::find($id);
        //echo '<pre>';
        //print_r($category->toArray() );
       // exit;
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'alias' => 'required',
            'status' => 'required'
        ]);

        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->alias = $request->alias;
            $category->status = $request->status;
            $category->update();
            return redirect()->back()->with('success', 'Category Successfully Updated');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Successfully item deleted');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');
        }
    }

    public function Export()
    {
        return Excel::download(new CategoriesExport, 'category.xlsx');
    }

    public function GeneratePDF(Request $request)
    {
        $categories = Category::get();
        view()->share('categories', $categories);
        if($request->has('download')){
           // PDF::setOptions(['dpi'=>'150','defaultFont'=>'sans-serif']);
            $pdf =PDF::loadView('pages.categories.categorypdf',$categories);
            return $pdf->download('category.pdf');
        }
        return view('pages.categories.categorypdf');
       // $category = Category::find($id);
      //  $pdf = PDF::loadView('categorypdf',compact('category'));
      //  return $pdf->download('category.pdf');
    }


}
