<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use App\Models\User;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_product()
    {
        $products = product::with('category','users')->get();
      // echo '<pre>';
      //  print_r($products->toArray());
      //  exit();
        return view('pages.products.view_product', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_product()
    {
        $categories = Category::get();

        return view('pages.products.add_new_product',compact('categories' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
           //'created_by_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'image' => 'required',
            'height' => 'required',
            'width' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'status' => 'required'
        ]);


        try {
            $imageNameWithPath = '';

            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = $request->name.'.'.$extension;

                $upload = $request->image->storeAs('public/products', $imageName);

                $imageNameWithPath =  'products/'.$imageName;
            }

           $product =  product::create([
                'created_by_id'=>auth()->user()->id,
                'category_id'=> $request->category_id,
                'name'=> $request->name,
                'description'=>$request->description,
                'unit_price'=>$request->unit_price,
                'image'=> $imageNameWithPath,
                'height'=> $request->height,
                'width'=> $request->width,
                'weight'=> $request->weight,
                'size'=> $request->size,
                'status'=>$request->status
            ]);


            return redirect()->back()->with('success', 'Product created');


        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went worng');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('pages.products.edit', ['categories' => $categories, 'product' =>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
          // 'created_by_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
          //  'image' => 'required',
            'height' => 'required',
            'width' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'status' => 'required'

        ]);

        try{

            $imageNameWithPath = '';

            if($request->hasFile('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = $request->name.'.'.$extension;

                $upload = $request->image->storeAs('public/products', $imageName);

                $imageNameWithPath =  'products/'.$imageName;
            }



            $product = Product::find($id);

           // $product->created_by_id = $request->created_by_id;
            $product->category_id  = $request->category_id;
            $product->name = $request->name;
            $product->description =$request->description;
            if($imageNameWithPath){
                \Storage::delete('public/'.$product->image);
                $product->image = $imageNameWithPath;
            }
            $product->unit_price = $request->unit_price;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->weight = $request->weight;
            $product->size = $request->size;
            $product->status = $request->status;

            $product->update();

            return redirect()->back()->with('success', 'Product Updated');

        }catch(\Exception $e){

            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went worng');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = product::find($id);
            $product->delete();
            return redirect()->back()->with('success', 'Successfully item deleted');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');
        }
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
    public function generatePDF(Request $request)
    {
        $products = product::limit(1)->get();
        view()->share('products', $products);
        if($request->has('download')){

            $pdf =PDF::loadView('pages.products.productpdf',$products);
            return $pdf->download('product.pdf');
        }
        return view('pages.products.productpdf');
    }
}
