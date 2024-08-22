
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{$organization}} 
        {{trans_choice('general.pageTitle',0)}}  
        {{trans_choice('general.titleAdd',2)}} 
        </b>
    </h5>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
    <div class="col-lg-12">

    <div class="card">
    <div class="card-body">
    
        <a href="{{url('/components/orgs/view',['organization'=>$organization])}}" class="btn btn-primary">
            {{trans_choice('general.view',1)}}  
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
                <label class="input-labels" >Institute</label>
                <input readonly type="text" value="{{$organization}}" class="form-control" id="Province" placeholder="Province" autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Ecleziastical Provice</label>
                <input type="text"class="form-control" id="eProvince" placeholder="Province" autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Diocese</label>
                <input type="text"class="form-control" id="diocese" placeholder="Diocese" autocomplete="off">
            </div>
        
            <div class="my-grid-item">
                <label class="input-labels" >Coordinator</label>
                <input required type="text" required class="form-control" id="Coordinator" placeholder="Coordinator"  autocomplete="off">
            </div>
        
            <div class="my-grid-item">
                <label class="input-labels" >Contact</label>
                <input required type="text" required class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Contact" id="Contact"  autocomplete="off">
            </div>
            
            <div class="my-grid-item">
                <label class="input-labels" >No. of Elderly</label>
                <input required type="text" required class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="No of Elderly" id="ElderlyNum"  autocomplete="off">
            </div>
            
            <div class="my-grid-item">
                <label class="input-labels" >Bank Account</label>
                <input required type="text" required class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '')" placeholder="Bank Account" id="BankAccount"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Bank Name</label>
                <input required type="text" required class="form-control" id="BankName" placeholder="Bank Name"  autocomplete="off">
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Bank Branch</label>
                <input required type="text" required class="form-control" id="BankBranch" placeholder="Bank Branch"  autocomplete="off">
            </div>

            <div class="my-grid-item" >
                <label  style="display: none" class="input-labels" >Bank Branch</label>
            </div>

            <div class="my-grid-item">
                <label class="input-labels" >Total Grant For Two Years</label>
                <input type="text" class="form-control" id="grant" placeholder="Grant" autocomplete="off">
            </div>
        
            <input  value="{{Auth::User()->id}}"  type="hidden"  id="User">
        
        </div>

        <hr class="dropdown-divider">
        <div>
            <div id="ActivityInputContainer">
                <label class="input-labels" >Activities Performed</label>
                <div id="row"> <div class="input-group m-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger" type="button">
                        <i class="bi bi-trash"></i></button> 
                    </div>
                    <input type="text" placeholder="Activity" id="DefualtActivity" class="form-control m-input"> </div> 
                </div>
                <div id="ActivityNewinput"></div>
            </div>
            <button id="ActivityRowAdder" type="button" class="btn btn-dark">
                <span class="bi bi-plus-square-dotted">
                </span> ADD
            </button>
        </div>

        <br>
        <div>
            <div id="ChallengesInputContainer">
                <label class="input-labels" >Challenges</label>
                <div id="row"> <div class="input-group m-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger" type="button">
                        <i class="bi bi-trash"></i></button> 
                    </div>
                    <input type="text" placeholder="Challenge" id="DefualtChallenge" class="form-control m-input"> </div> 
                </div>
                <div id="ChallengesNewinput"></div>
            </div>
            <button id="ChallengesRowAdder" type="button" class="btn btn-dark">
                <span class="bi bi-plus-square-dotted">
                </span> ADD
            </button>
        </div>

        <br>
        <div>
            <div  id="RecommendationsInputContainer">
                <label class="input-labels">Recommendations</label>
                <div id="row"> <div class="input-group m-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger" type="button">
                        <i class="bi bi-trash"></i></button> 
                    </div>
                    <input type="text" placeholder="Recommendation" id="DefualtRecommendation" class="form-control m-input"> </div> 
                </div>
                <div id="RecommendationsNewinput"></div>
            </div>
            <button id="RecommendationsRowAdder" type="button" class="btn btn-dark">
                <span class="bi bi-plus-square-dotted">
                </span> ADD
            </button>
        </div>


        <br><br>
        <center>
            <button style="width: 100% !important" onclick="submitUserData()"  class="btn btn-primary submit-btn">{{trans_choice('general.save',1)}}{{trans_choice('general.detail',2)}}</button>
        </center>
        <!-- End Table with stripped rows -->

    </div>
    </div>

    </div>
    </div>
    </section>

    </main><!-- End #main -->

    
    <script>

    $("#ActivityRowAdder").click(function () {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                '<input type="text" placeholder="Activity" class="form-control m-input"> </div> </div>';

            $('#ActivityNewinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })

        $("#ChallengesRowAdder").click(function () {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                '<input type="text"  placeholder="Challenge" class="form-control m-input"> </div> </div>';

            $('#ChallengesNewinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })

        $("#RecommendationsRowAdder").click(function () {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                '<input type="text"  placeholder="Recommendation" class="form-control m-input"> </div> </div>';

            $('#RecommendationsNewinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })


    function submitUserData() 
    {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
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

        var DefualtActivityInput = document.getElementById('DefualtActivity').value;
        var DefualtChallengeInput = document.getElementById('DefualtChallenge').value;
        var DefualtRecommendationInput = document.getElementById('DefualtRecommendation').value;


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

        if (DefualtActivityInput.length == 0){alert('Activity Input Can Not Be Empty')}
        if (DefualtChallengeInput.length == 0){alert('Challenge Input Can Not Be Empty')}
        if (DefualtRecommendationInput.length == 0){alert('Recommendation Input Can Not Be Empty')}

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


            var data = {Province:ProvinceInput, EProvince:EProvinceInput, Diocese:DioceseInput, Grant:GrantInput, User:UserInput ,Coordinator:CoordinatorInput, Contact:ContactInput, ElderlyNum:ElderlyNumInput, BAccount:BankAccountInput,BName:BankNameInput,BBranch:BankBranchInput,ActivitiesArray:activitiesList, ChallengesArray:challengesList, RecommendationArray:recommendationsList};
            var jsonData = JSON.stringify(data);
            console.log(jsonData)
            // console.log(StoreDataAPI)
            $.ajax({
                url: '/save/data/details',
                type: "POST",
                data: jsonData,
                cache: false,
                contentType: 'application/json; charset=utf-8',
                headers: {'X-CSRF-TOKEN': csrfToken},
                processData: false,
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
