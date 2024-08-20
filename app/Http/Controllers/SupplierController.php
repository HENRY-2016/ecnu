<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = SupplierModel::get();
        $total = SupplierModel::count();
        return view('components.supplier.Index', compact('data','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = SupplierModel::get(['name','id']);
        return view('components.supplier.Create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $date = $request->input('date');
        $today = $request->input('today');
        $yesterday = $request->input('yesterday');
        $lastMonth = $request->input('lastMonth');
        $thisMonth = $request->input('thisMonth');
        $all = $request->input('all');
        $store = $request->input('store');

    
        if ($all)
        {
            $data = SupplierModel::latest()->get ();
            $total = SupplierModel::count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if ($today)
        {
            $data = SupplierModel::whereDate('created_at', Carbon::today())->get ();
            $total = SupplierModel::whereDate('created_at', Carbon ::today())->count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if ($date)
        {
            $startDate = $request->From;
            $endDate = $request->To;
            $data = SupplierModel::whereBetween('created_at', [$startDate, $endDate])->get ();
            $total = SupplierModel::whereBetween('created_at', [$startDate, $endDate])->count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if($thisMonth)
        {
            $data = SupplierModel::whereMonth('created_at', date('m'))->get ();
            $total = SupplierModel::whereMonth('created_at', date('m'))->count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if($lastMonth)
        {
            $currentMonth = date('m');
            $lastM = $currentMonth - 1;
            $data = SupplierModel::whereMonth('created_at', $lastM)->get ();
            $total = SupplierModel::whereMonth('created_at', $lastM)->count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if ($yesterday)
        {
            $data = SupplierModel::whereDate('created_at', Carbon::yesterday())->get ();
            $total = SupplierModel::whereDate('created_at', Carbon::yesterday())->count();
            return view('components.supplier.Index', compact('data','total'));
        }
        if($store)
        {
            $request -> validate ([
                'name'  => 'required',
                'area'  => 'required',
                'contact'  => 'required',
            ]);
    
            // insert Data
            $form_data = array(
                'name'  => $request->name,
                'area'  => $request->area,
                'contact'  => $request->contact,
            );
    
            SupplierModel::create ($form_data);
    
            $message = "Success! Record Was Created Successfully";
            return redirect()->route('supplier.index')->with('success', $message);
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
    
    }
    public function getAjaxData($id)
    {
        $data = SupplierModel::findOrFail($id);
        return response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = SupplierModel::findOrFail($id);
        return view('components.supplier.Edit', compact('supplier'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $rowId = $request->editId;
        $request -> validate ([
            'name'  => 'required',
            'area'  => 'required',
            'contact'  => 'required',
        ]);

        // insert Data
        $form_data = array(
            'name'  => $request->name,
            'area'  => $request->area,
            'contact'  => $request->contact,
        );

        SupplierModel::whereId ($id)->update($form_data);
        $message = "Success! Record Was Successfully Updated";
        return redirect()->route('supplier.index')->with('success', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rowId = $request->deleteId;

        // Delete
        $data = SupplierModel::findOrFail($rowId);
        $data ->delete();
        return redirect()->route('supplier.index')->with('success', 'Record Was Deleted From The System');
        
    }
}
