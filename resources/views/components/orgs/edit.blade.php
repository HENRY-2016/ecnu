
<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{trans_choice('general.pageTitle',0)}}  
        {{trans_choice('general.titleEdit',2)}} 
        </b>
    </h5>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
    <div class="col-lg-12">

    <div class="card">
    <div class="card-body">
    
        <a href="{{url('/components/orgs/add',['organization'=>$data -> Province])}}" class="btn btn-success">
            {{trans_choice('general.add',1)}}  
        </a>

    
        @if ($message = Session::get('success'))
                <center>
                    <div class="alert alert-primary" style="width: 40% !important;" role="alert" >
                        <p class="text-center">{{$message}}</p>
                    </div>
                </center>
            @endif
                
            @if ($errors -> any())
                <center>
                    <div  class="alert alert-danger" style="width: 40% !important;" role="alert">
                        <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                <center>
            @endif
        <!-- Table with stripped rows -->
        <div class="my-grid-container-4-columns">
    
            <div class="my-grid-item">
                <label class="input-labels" >Date</label>
                <input value="{{$data -> created_at}}" type="text" readonly class="form-control"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Provice</label>
                <input value="{{$data -> Province}}" type="text"  class="form-control" id="Province" placeholder="Province"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >E Provice</label>
                <input value="{{$data -> eProvince}}" type="text"  class="form-control" id="eProvince" placeholder="Province"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Diocese</label>
                <input value="{{$data -> diocese}}" type="text"  class="form-control" id="diocese" placeholder="Diocese"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Coordinator</label>
                <input value="{{$data -> Coordinator}}" type="text" class="form-control" id="Coordinator" placeholder="Coordinator"  autocomplete="off">
            </div>
        
            <div class="my-grid-item">
                <label class="input-labels" >Contact</label>
                <input value="{{$data -> Contact}}" type="text"  class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Contact" id="Contact"  autocomplete="off">
            </div>
            
            <div class="my-grid-item">
                <label class="input-labels" >No. of Elderly</label>
                <input value="{{$data -> Elderly_Num}}" type="text" class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="No of Elderly" id="ElderlyNum"  autocomplete="off">
            </div>
            
            <div class="my-grid-item">
                <label class="input-labels" >Bank Account</label>
                <input value="{{$data -> B_Account}}" type="text" class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Bank Account" id="BankAccount"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Bank Name</label>
                <input value="{{$data -> B_Name}}" type="text" class="form-control" id="BankName" placeholder="Bank Name"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Bank Branch</label>
                <input value="{{$data -> B_Branch}}" type="text" class="form-control" id="BankBranch" placeholder="Bank Branch"  autocomplete="off">
            </div>


            <div class="my-grid-item">
                <label class="input-labels" >Total Grant For Two Years</label>
                <input type="text"  value="{{$data -> grant}}" class="form-control" id="grant" placeholder="Grant" autocomplete="off">
            </div>

            <div class="my-grid-item" >
                <label  style="display: none" class="input-labels" >Bank Branch</label>
            </div>
        
            <input  value="{{Auth::User()->id}}"  type="hidden"  id="User">
            <input  value="{{$data->id}}"  type="hidden"  id="RecordId">
        
        </div>

        @php
            // convert JSON to PHP array
            $activitiesData = json_decode($activitiesArray,true);
            $challengesData = json_decode($challengesArray,true);
            $recommendationsData = json_decode($recommendationsArray,true);
        @endphp

    

        <div>
            <table class="table">
                <tr class="table-dark">
                    <td >Activities Performed Details</td>
                </tr>
            </table >
            <div id="ActivityInputContainer">
                <label class="input-labels" >Activities Performed</label>
                @if(isset($activitiesData['ActivitiesArray']))
                    @foreach($activitiesData['ActivitiesArray'] as $data)
                        <div id="row"> <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger" type="button">
                                <i class="bi bi-trash"></i></button> 
                            </div>
                                <input type="text" placeholder="Activity" value="{{ $data['data']}}" class="form-control m-input"> </div> 
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <br>
        <div>
        <table class="table">
            <tr class="table-dark">
                <td >Challenges Details</td>
            </tr>
        </table >
        <div id="ChallengesInputContainer">
            <label class="input-labels" >Challenges</label>
            @if(isset($challengesData['ChallengesArray']))
                @foreach($challengesData['ChallengesArray'] as $data)
                    <div id="row"> <div class="input-group m-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-danger" type="button">
                            <i class="bi bi-trash"></i></button> 
                        </div>
                            <input type="text" placeholder="Challenge" value="{{ $data['data']}}" class="form-control m-input"> </div> 
                    </div>
                @endforeach
            @endif
        </div>
            
        </div>

        <br>
        <div>
            <table class="table">
                <tr class="table-dark">
                    <td >Recommendation Details</td>
                </tr>
            </table >
            <div  id="RecommendationsInputContainer">
                <label class="input-labels">Recommendations</label>
                @if(isset($recommendationsData['RecommendationArray']))
                    @foreach($recommendationsData['RecommendationArray'] as $data)
                        <div id="row"> <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger" type="button">
                                <i class="bi bi-trash"></i></button> 
                            </div>
                                <input type="text" placeholder="Recommendation" value="{{ $data['data']}}" class="form-control m-input"> </div> 
                        </div>
                    @endforeach
                @endif
            </div>
            
        </div>


        <br><br>
        <center>
            <button style="width: 100% !important" onclick="submitUserData()"  class="btn btn-primary submit-btn">{{trans_choice('general.update',1)}}{{trans_choice('general.detail',2)}}</button>
        </center>
        <!-- End Table with stripped rows -->

    </div>
    </div>

    </div>
    </div>
    </section>

    </main><!-- End #main -->

    
    <script>


    function submitUserData() 
    {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        console.log("Colled ")
        
        var activitiesList = [];
        var challengesList = [];
        var recommendationsList = [];

        // grab inputs 

        var ProvinceInput = document.getElementById('Province').value;
        var EProvinceInput = document.getElementById('eProvince').value;
        var DioceseInput = document.getElementById('diocese').value;
        var GrantInput = document.getElementById('grant').value;
        var CoordinatorInput = document.getElementById('Coordinator').value;
        var ContactInput = document.getElementById('Contact').value;
        var ElderlyNumInput = document.getElementById('ElderlyNum').value;
        var BankAccountInput = document.getElementById('BankAccount').value;
        var BankNameInput = document.getElementById('BankName').value;
        var BankBranchInput = document.getElementById('BankBranch').value;
        var UserInput = document.getElementById('User').value;
        var RecordId = document.getElementById('RecordId').value;


        // Validate Inputs
        if (ProvinceInput.length == 0){alert('Provice Input Can Not Be Empty')}
        if (EProvinceInput.length == 0){alert('E Provice Input Can Not Be Empty')}
        if (DioceseInput.length == 0){alert('Diocese Input Can Not Be Empty')}
        if (GrantInput.length == 0){alert('Grant Input Can Not Be Empty')}
        if (CoordinatorInput.length == 0){alert('Coordinator Input Can Not Be Empty')}
        if (ContactInput.length == 0){alert('Contact Input Can Not Be Empty')}
        if (ElderlyNumInput.length == 0){alert('Elderly Num Input Can Not Be Empty')}
        if (BankAccountInput.length == 0){alert('Bank Account Input Can Not Be Empty')}
        if (BankNameInput.length == 0){alert('Bank Name Input Can Not Be Empty')}
        if (BankBranchInput.length == 0){alert('Bank Branch Input Can Not Be Empty')}

    

        else
        {

            // Select all input elements within the container
            var activityInputs = document.querySelectorAll("#ActivityInputContainer input");
            var challengeInputs = document.querySelectorAll("#ChallengesInputContainer input");
            var recommendationInputs = document.querySelectorAll("#RecommendationsInputContainer input");


            // Iterate through each input and retrieve its value
            activityInputs.forEach(function(input, index) {
                // var data = (index + 1) + ":" + input.value;
                var data =  input.value;
                obj={data};
                activitiesList.push(obj);
            });
            challengeInputs.forEach(function(input, index) {
                var data =  input.value;
                obj={data};
                challengesList.push(obj);
            });
            recommendationInputs.forEach(function(input, index) {
                var data =  input.value;
                obj={data};
                recommendationsList.push(obj);
            });


            var data = {EditId:RecordId,Province:ProvinceInput, EProvince:EProvinceInput, Diocese:DioceseInput, Grant:GrantInput, User:UserInput ,Coordinator:CoordinatorInput, Contact:ContactInput, ElderlyNum:ElderlyNumInput, BAccount:BankAccountInput,BName:BankNameInput,BBranch:BankBranchInput,ActivitiesArray:activitiesList, ChallengesArray:challengesList, RecommendationArray:recommendationsList};
            var jsonData = JSON.stringify(data);
            console.log(jsonData)
            $.ajax({
                url: '/update/data/details',
                type: "POST",
                data: jsonData,
                // cache: false,
                contentType: 'application/json; charset=utf-8',
                headers: {'X-CSRF-TOKEN': csrfToken},
                success: function (response)
                {
                    if (response.redirect_url) {
                    // Redirect to the URL
                        alert(response.message);
                        window.location.href = response.redirect_url+ProvinceInput;
                    } 
                    else {
                        // Handle other responses if needed
                    }
                },
                error: function(xhr, status, error) {
                    var postEror = 'Error In Posting Data : ' + error;
                    console.log(postEror)
                }
                
            });
        }



        
    }


    </script>
</x-app-layout>
