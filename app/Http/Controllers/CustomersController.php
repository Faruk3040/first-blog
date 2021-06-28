<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_customer()
    {
        $customers = Customer::get();
        return view('pages.customers.view_customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_customer()
    {
        return view('pages.customers.add_new_customer');
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
            'email'=>'required',
            'mobile_num'=>'required',
            'image'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);

        try {
            $imageNameWithPath = '';

            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = $request->name.'.'.$extension;

                $upload = $request->image->storeAs('public/customers', $imageName);

                $imageNameWithPath =  'customers/'.$imageName;
            }
           $customer = Customer::create([
                'name' => $request ->name ,
                'email' =>$request ->email,
                'mobile_num' =>$request ->mobile_num,
                'image'=>$imageNameWithPath,
                'address'=>$request->address,
                'status'=>$request->status,
            ]);

            return redirect()->back()->with('success', 'Successfully category created');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');

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
        $customer = Customer::find($id);
        return view('pages.customers.edit',compact('customer'));
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
            'email'=>'required',
            'mobile_num'=>'required',
           // 'image'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        try{

            $imageNameWithPath = '';

            if($request->hasFile('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = $request->name.'.'.$extension;

                $upload = $request->image->storeAs('public/customers', $imageName);

                $imageNameWithPath =  'customers/'.$imageName;
            }


                $customer = Customer::find($id);

                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->mobile_num = $request->mobile_num;
               if($imageNameWithPath){
                \Storage::delete('public/'.$customer->image);
                $customer->image = $imageNameWithPath;
                }
                $customer->address = $request->address;
                $customer->status = $request->status;
                $customer->update();

                return redirect()->back()->with('success', 'Category Successfully Updated');

             } catch(\Exception $e) {
                \Log::error($e ->getMessage());
                return redirect()->back()->with('error', 'Something went to wrong!Please try again');
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
            $customer = Customer::find($id);
            $customer->delete();
            return redirect()->back()->with('success', 'Successfully item deleted');
        } catch (\Exception $e) {
            \Log::error($e ->getMessage());
            return redirect()->back()->with('error', 'Something went to wrong!Please try again');
        }
    }

    public function excel()
    {
        return Excel::download(new CustomersExport, 'customer.xlsx');
    }

    public function customerpdf(Request $request)
    {
        $customers = Customer::get();
        view()->share('customers', $customers);
        if($request->has('download')){
           // PDF::setOptions(['dpi'=>'150','defaultFont'=>'sans-serif']);
            $pdf =PDF::loadView('pages.customers.customerpdf',$customers);
            return $pdf->download('customer.pdf');
        }
        return view('pages.customers.customerpdf');

    }
}
