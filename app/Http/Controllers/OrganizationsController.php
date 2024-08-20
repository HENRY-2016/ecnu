<?php

namespace App\Http\Controllers;

use App\Models\LogsModel;
use App\Models\OrganizationsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = OrganizationsModel::get();
        // $total = OrganizationsModel::count();
        // return view('components.orgs.view', compact('data','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    
        if ($all)
        {
            $data = OrganizationsModel::latest()->get ();
            $total = OrganizationsModel::count();
            return view('components.orgs.view', compact('data','total'));
        }
        if ($today)
        {
            $data = OrganizationsModel::whereDate('created_at', Carbon::today())->get ();
            $total = OrganizationsModel::whereDate('created_at', Carbon ::today())->count();
            return view('components.orgs.view', compact('data','total'));
        }
        if ($date)
        {
            $startDate = $request->From;
            $endDate = $request->To;
            $data = OrganizationsModel::whereBetween('created_at', [$startDate, $endDate])->get ();
            $total = OrganizationsModel::whereBetween('created_at', [$startDate, $endDate])->count();
            return view('components.orgs.view', compact('data','total'));
        }
        if($thisMonth)
        {
            $data = OrganizationsModel::whereMonth('created_at', date('m'))->get ();
            $total = OrganizationsModel::whereMonth('created_at', date('m'))->count();
            return view('components.orgs.view', compact('data','total'));
        }
        if($lastMonth)
        {
            $currentMonth = date('m');
            $lastM = $currentMonth - 1;
            $data = OrganizationsModel::whereMonth('created_at', $lastM)->get ();
            $total = OrganizationsModel::whereMonth('created_at', $lastM)->count();
            return view('components.orgs.view', compact('data','total'));
        }
        if ($yesterday)
        {
            $data = OrganizationsModel::whereDate('created_at', Carbon::yesterday())->get ();
            $total = OrganizationsModel::whereDate('created_at', Carbon::yesterday())->count();
            return view('components.orgs.view', compact('data','total'));
        }

        
    }

    function saveData(Request $request)
    {

        $ActivitiesArray = json_encode($request->ActivitiesArray);
        $ChallengesArray = json_encode($request->ChallengesArray);
        $RecommendationArray = json_encode($request->RecommendationArray);
        // insert Data
        $form_data = array(
            'Province'  => $request->Province,
            'Coordinator'  => $request->Coordinator,
            'Contact'  => $request->Contact,
            'Elderly_Num'=>$request->ElderlyNum,
            'B_Account'  => $request->BAccount,
            'B_Name'  => $request->BName,
            'B_Branch'  => $request->BBranch,
            'ActivitiesArray'=> $ActivitiesArray,
            'ChallengesArray'=>$ChallengesArray,
            'RecommendationArray'=> $RecommendationArray

        );
        // logs Data
        $logs_form_data = array(
            'User'  => $request->User,
            'Event'  => trans_choice('general.add-orgs',0),
        );

        OrganizationsModel::create ($form_data);
        LogsModel::create($logs_form_data);

        $message = "Success! Record Was Created Successfully";
        $redirectUrl = '/components/orgs/view/';
        return response()->json(['redirect_url' => $redirectUrl,'message' => $message], 200);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrganizationsModel::findOrFail($id);
        $activitiesList = OrganizationsModel::where('id',$id)->get(['ActivitiesArray']);
        $challengesList = OrganizationsModel::where('id',$id)->get(['ChallengesArray']);
        $recommendationsList = OrganizationsModel::where('id',$id)->get(['RecommendationArray']);


        // removes Backslash from a string
        $activitiesStr1 = str_replace('\\', '', $activitiesList);
        $challengesStr1 = str_replace('\\', '', $challengesList);
        $recommendationsStr1 = str_replace('\\', '', $recommendationsList);

        // remove  :"[ from a string and replace it with :[
        $activitiesStr2 =  str_replace(':"[',":[",$activitiesStr1); 
        $challengesStr2 =  str_replace(':"[',":[",$challengesStr1); 
        $recommendationsStr2 =  str_replace(':"[',":[",$recommendationsStr1); 

         // remove  }]" from a string and replace it with }]
        $activitiesStr3 =  str_replace('}]"',"}]",$activitiesStr2); 
        $challengesStr3 =  str_replace('}]"',"}]",$challengesStr2); 
        $recommendationsStr3 =  str_replace('}]"',"}]",$recommendationsStr2); 

        $activitiesArray = substr($activitiesStr3, 1, -1);
        $challengesArray = substr($challengesStr3, 1, -1);
        $recommendationsArray = substr($recommendationsStr3, 1, -1);


        // echo $challengesArray;
        return view('components.orgs.edit', compact('data','activitiesArray','challengesArray','recommendationsArray'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrganizationsModel::findOrFail($id);
        return response()->json(['data' => $data]);
    }
    
    public function printData (Request $request)
    {
        $id = $request->id;

        $data = OrganizationsModel::findOrFail($id);
        
        echo $data;
        // $recordIdData = OrganizationsModel::where('id',$id)->get('recordId');
        // $recordId = $recordIdData[0]["recordId"];
        // $relatives = PriestsWingRelativesModel::where('recordId',$recordId)->get(['gender','area', 'fullName','contact1','contact2','district']);
        // $careTakers = PriestsWingCareTakerModel::where('recordId',$recordId)->get(['gender','area', 'fullName','contact1','contact2','district']);

        // return view('Pages/PriestsWing/Print',[
        //     'data'=>$data
        // ]);
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
            'Province'  => 'required',
            'Coordinator'  => 'required',
            'Contact'  => 'required',
            'B_Account'  => 'required',
            'B_Name'  => 'required',
            'B_Branch'  => 'required',
        ]);

    
        // Update Data
        $ActivitiesArray = json_encode($request->ActivitiesArray);
        $ChallengesArray = json_encode($request->ChallengesArray);
        $RecommendationArray = json_encode($request->RecommendationArray);
        // insert Data
        $form_data = array(
            'Province'  => $request->Province,
            'Coordinator'  => $request->Coordinator,
            'Contact'  => $request->Contact,
            'Elderly_Num'=>$request->Elderly_Num,
            'B_Account'  => $request->B_Account,
            'B_Name'  => $request->B_Name,
            'B_Branch'  => $request->B_Branch,
            'ActivitiesArray'=> $ActivitiesArray,
            'ChallengesArray'=>$ChallengesArray,
            'RecommendationArray'=> $RecommendationArray

        );
        // logs Data
        $logs_form_data = array(
            'User'  => $request->User,
            'Event'  => trans_choice('general.edit-orgs',0),
        );
        OrganizationsModel::whereId ($rowId)->update($form_data);
        LogsModel::create($logs_form_data);
                return redirect('OrganizationsResource')
                ->with('success','Data Updated Successfully');

    }

    public function updateData(Request $request)
    {
        $rowId = $request->EditId;

        $ActivitiesArray = json_encode($request->ActivitiesArray);
        $ChallengesArray = json_encode($request->ChallengesArray);
        $RecommendationArray = json_encode($request->RecommendationArray);
        // insert Data
        $form_data = array(
            'Province'  => $request->Province,
            'Coordinator'  => $request->Coordinator,
            'Contact'  => $request->Contact,
            'Elderly_Num'=>$request->ElderlyNum,
            'B_Account'  => $request->BAccount,
            'B_Name'  => $request->BName,
            'B_Branch'  => $request->BBranch,
            'ActivitiesArray'=> $ActivitiesArray,
            'ChallengesArray'=>$ChallengesArray,
            'RecommendationArray'=> $RecommendationArray

        );
        // logs Data
        $logs_form_data = array(
            'User'  => $request->User,
            'Event'  => trans_choice('general.edit-orgs',0),
        );
        OrganizationsModel::whereId ($rowId)->update($form_data);
        LogsModel::create($logs_form_data);
        $message = "Success! Record Was Successfully Updated";
        $redirectUrl = '/components/orgs/view/';
        return response()->json(['redirect_url' => $redirectUrl,'message' => $message], 200);

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
        $organization = $request->organization;
        // logs Data
        $logs_form_data = array(
            'User'  => $request->User,
            'Event'  => trans_choice('general.delete-orgs',0),
        );
        LogsModel::create($logs_form_data);

        // Delete
        $data = OrganizationsModel::findOrFail($rowId);
        $data ->delete();
        return redirect('/components/orgs/view/'.$organization);
    }
}
