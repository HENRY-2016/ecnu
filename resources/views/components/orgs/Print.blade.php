


<script src="{{asset('js/main.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}">

<div id="receipt-print-area" >
    <div>
        <div class="about-div">
            <center>
                <br>
                <p class="black-text-color"><b>{{trans_choice('general.appName',1)}}</b></p>
                <p class="black-text-color"><b>{{$data->Province}}</b></p>
            </center>
        </div>
        <div class="customer-div">
            <p class="black-text-color"><strong>{{$data->Province}} Institute Details !</strong> Perticular Information !</p>
            <table >
                <tbody>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>E Province</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->eProvince}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Diocese</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->diocese}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Coordinator</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->Coordinator}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Contact</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->Contact}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Elderly Number</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->Elderly_Num}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Bank Account</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->B_Account}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Bank Name</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->B_Name}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Bank Branch</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->B_Branch}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Grant</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->grant}} </p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Registered Date</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->created_at->toFormattedDateString()}} </p></td>
                    </tr>
                </tbody>
            </table>
        </div><br>

        <div class="items-details-div">
            @php $number = 1;@endphp 
            <p class="black-text-color"><strong>Activities Details !</strong> Perticular Information !</p>
            <table id="item-total-table-">
                <tbody >
                    @foreach(json_decode($data->ActivitiesArray) as $activity)
                        <tr>
                            <td class="table-td"><p class="black-text-color"><b>{{$number ++}}</b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{$activity->data}}</p></td>
                        </tr>
                        <tr><td><br></td></tr>
                    @endforeach
            </tbody>
            </table>
        </div><br>

        <div class="items-details-div">
            @php $number = 1;@endphp 
            <p class="black-text-color"><strong>Challenges Details !</strong> Perticular Information !</p>
            <table id="item-total-table-">
                <tbody >
                    @foreach(json_decode($data->ChallengesArray) as $challenges)
                        <tr>
                            <td class="table-td"><p class="black-text-color"><b>{{$number ++}}</b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{$challenges->data}}</p></td>
                        </tr>
                        <tr><td><br></td></tr>
                    @endforeach
            </tbody>
            </table>
        </div><br>

        <div class="items-details-div">
            @php $number = 1;@endphp 
            <p class="black-text-color"><strong>Recommendation Details !</strong> Perticular Information !</p>
            <table id="item-total-table-">
                <tbody >
                    @foreach(json_decode($data->RecommendationArray) as $recommendation)
                        <tr>
                            <td class="table-td"><p class="black-text-color"><b>{{$number ++}}</b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{$recommendation->data}}</p></td>
                        </tr>
                        <tr><td><br></td></tr>
                    @endforeach
            </tbody>
            </table>
        </div><br><br>

    </div>
</div>
<center>
    <a  class="w3-button w3-red w3-round" href="{{url('components/orgs/view',['organization'=>$data->Province])}}" > Cancel  </a>
    <button  class="w3-button w3-green w3-round" onclick="printReceipt()" >- - Print Now - - </button>
</center>
<br><br>
