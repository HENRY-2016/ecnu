<?php

namespace App\Http\Controllers;

use App\Models\AssetsModel;
use App\Models\SupplierModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = AssetsModel::get();
        $total = AssetsModel::count();
        return view('components.asset.Index', compact('data','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = SupplierModel::get(['name','id']);
        return view('components.asset.Create', compact('suppliers'));
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
            $data = AssetsModel::latest()->get ();
            $total = AssetsModel::count();
            return view('components.asset.Index', compact('data','total'));
        }
        if ($today)
        {
            $data = AssetsModel::whereDate('created_at', Carbon::today())->get ();
            $total = AssetsModel::whereDate('created_at', Carbon ::today())->count();
            return view('components.asset.Index', compact('data','total'));
        }
        if ($date)
        {
            $startDate = $request->From;
            $endDate = $request->To;
            $data = AssetsModel::whereBetween('created_at', [$startDate, $endDate])->get ();
            $total = AssetsModel::whereBetween('created_at', [$startDate, $endDate])->count();
            return view('components.asset.Index', compact('data','total'));
        }
        if($thisMonth)
        {
            $data = AssetsModel::whereMonth('created_at', date('m'))->get ();
            $total = AssetsModel::whereMonth('created_at', date('m'))->count();
            return view('components.asset.Index', compact('data','total'));
        }
        if($lastMonth)
        {
            $currentMonth = date('m');
            $lastM = $currentMonth - 1;
            $data = AssetsModel::whereMonth('created_at', $lastM)->get ();
            $total = AssetsModel::whereMonth('created_at', $lastM)->count();
            return view('components.asset.Index', compact('data','total'));
        }
        if ($yesterday)
        {
            $data = AssetsModel::whereDate('created_at', Carbon::yesterday())->get ();
            $total = AssetsModel::whereDate('created_at', Carbon::yesterday())->count();
            return view('components.asset.Index', compact('data','total'));
        }
        if($store)
        {
            $request -> validate ([
                'name'  => 'required',
                'supplier'  => 'required',
                'quantity'  => 'required',
                'storeDate'  => 'required',
            ]);
    
            // insert Data
            $form_data = array(
                'name'  => $request->name,
                'supplier'  => $request->supplier,
                'cost'  => "",
                'quantity'  => $request->quantity,
                'date'  => $request->storeDate,
            );

            // echo $store;

    
            AssetsModel::create ($form_data);

            $message = "Success! Record Was Created Successfully";
            return redirect()->route('asset.index')->with('success', $message);
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
        $data = AssetsModel::findOrFail($id);
        return view('components.asset.Print',[
            'data'=>$data
        ]);
    }
    public function getAjaxData($id)
    {
        $data = AssetsModel::findOrFail($id);
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
        $asset = AssetsModel::findOrFail($id);
        $suppliers = SupplierModel::get(['name','id']);
        return view('components.asset.Edit', compact('suppliers','asset'));
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
        $request -> validate ([
            'name'  => 'required',
            'supplier'  => 'required',
            'cost'  => 'required',
            'quantity'  => 'required',
            'date'  => 'required',

        ]);

        // insert Data
        $form_data = array(
            'name'  => $request->name,
            'supplier'  => $request->supplier,
            'cost'  => $request->cost,
            'quantity'  => $request->quantity,
            'date'  => $request->date,
        );

        AssetsModel::whereId ($id)->update($form_data);
        $message = "Success! Record Was Successfully Updated";
        return redirect()->route('asset.index')->with('success', $message);

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
        $data = AssetsModel::findOrFail($rowId);
        $data ->delete();
        return redirect()->route('asset.index')->with('success', 'Record Was Deleted From The System');
        
    }
}
