

<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{$organization}}  
        {{trans_choice('general.pageTitle',0)}} 
        {{trans_choice('general.titleView',2)}} 
        </b>
    </h5>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
    <div class="col-lg-12">

    <div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-dark mb-2">
            {{trans_choice('general.total',1)}} 
            {{trans_choice('general.record',2)}}
            <span class="w3-badge w3-margin-left w3-red">{{$total}}</span>
        </button>
        <a href="{{url('/components/orgs/add',['organization'=>$organization])}}" class="btn btn-success">
            {{trans_choice('general.add',1)}}  
        </a>
        

        <table >
            <tr>
                <td>
                    <form action="{{route('OrganizationsResource.store')}}" method="post">
                    {{ csrf_field() }}
                        <input  value="all" type="hidden" name="all">
                        <button type="submit" class="btn btn-outline-primary btn-fw">All</button> 
                    </form> 
                </td>
                <td>
                    <form action="{{route('OrganizationsResource.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="yesterday" type="hidden" name="yesterday">
                            <button type="submit" class="btn btn-outline-primary btn-fw">Yesterday</button> 
                    </form>
                </td>
            
                <td>
                    <form action="{{route('OrganizationsResource.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="thisMonth" type="hidden" name="thisMonth">
                            <button type="submit" class="btn btn-outline-primary btn-fw">This Month</button> 
                    </form>
                </td>

                <td>
                    <form action="{{route('OrganizationsResource.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="date" type="hidden" name="date">
                            <label class="black-text main-label-text-1">From</label>
                            <input  class="btn btn-outline-primary btn-fw" type="date" name="From" autocomplete="off" required="required" >
                        
                            <label class="black-text main-label-text-1">To</label>
                            <input  class="btn btn-outline-primary btn-fw" type="date"  name="To" autocomplete="off" required="required" >
                            <button type="submit" class="btn btn-outline-primary btn-fw">Show</button> 
                    </form>
                </td>
            </tr>
        </table>
        <br>

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
        <table class="table table-hover"  id="table">
        {{ csrf_field() }}

            <thead>
                <tr>
                    <th  class="text-center">Date</th>
                    <th  class="text-center">Province</th>
                    <th  class="text-center">Coordinator</th>
                    <th  class="text-center">Contact</th>
                    <th  class="text-center">Details</th>
                    <th  class="text-center">Modify</th>
                    @if((Auth::User()->email) == (Config::get('app.admin_email')))
                        <th  class="text-center">Delete</th>
                    @endif
                </tr>
            </thead>



            @foreach($data as $row)
            <tr class="row{{$row->id}}">
                <td class="text-center">{{$row -> created_at}}</td>
                <td class="text-center">{{$row -> Province}}</td>
                <td class="text-center">{{$row -> Coordinator}}</td>
                <td class="text-center">{{$row -> Contact}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-id="{{ $row->id }}" data-bs-target="#showModal"
                    >Show</button>
                </td>
                <td class="text-center"><a  class="btn btn-secondary" href="{{route('OrganizationsResource.show',$row->id)}}">Edit</a></td>
                @if((Auth::User()->email) == (Config::get('app.admin_email')))
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-id="{{ $row->id }}" data-bs-target="#deleteModal"
                        >Delete</button>
                    </td>
                @endif
            

            </tr>
            @endforeach
        </table>
        <!-- End Table with stripped rows -->

    </div>
    </div>

    </div>
    </div>
    </section>

    </main><!-- End #main -->

<!-- The show Modal -->
<div class="modal fade modal-xl" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-text-style">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center" >
                    {{trans_choice('general.view',2)}} 
                    {{trans_choice('general.detail',2)}}
                </h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table" >
                    <tr>
                        <td>
                            <b><p class="text-start">Created</p></b>
                            <p class="text-start" id="show-created-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Provice</p></b>
                            <p class="text-start" id="show-provice-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Coordinator</p></b>
                            <p class="text-start" id="show-coordinator-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Contact</p></b>
                            <p class="text-start" id="show-contact-id" ></p>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <b><p class="text-start">Elderly Number</p></b>
                            <p class="text-start" id="show-erderly-num-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Bank Account</p></b>
                            <p class="text-start" id="show-bank-account-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Bank Name</p></b>
                            <p class="text-start" id="show-bank-name-id" ></p>
                        </td>
                        <td>
                            <b><p class="text-start">Bank Branch</p></b>
                            <p class="text-start" id="show-bank-branch-id" ></p>
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr class="table-dark">
                        <td >Activities Performed Details</td>
                    </tr>
                </table >
                <table class="table">
                    <tbody id="activities_table"></tbody>
                </table>

                <table class="table">
                    <tr class="table-dark">
                        <td >Challenges Details</td>
                    </tr>
                </table >
                <table class="table">
                    <tbody id="challenges_table"></tbody>
                </table>

                <table class="table">
                    <tr class="table-dark">
                        <td >Recommendations Details</td>
                    </tr>
                </table >
                <table class="table">
                    <tbody id="recommendations_table"></tbody>
                </table>
            
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>



    <!-- The delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-text-style">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">
                    {{trans_choice('general.delete',2)}} 
                    {{trans_choice('general.record',1)}}
                    {{trans_choice('general.detail',2)}}
                </h4>
            </div>
            
            <!-- Modal body -->
            <div class="delete-modal-body">
                <br><p class="modal-title text-center" >Are Sure You Want To Delete</p><br>
                <p id="Delete-Name" class="text-center" ></p>
                <p class="text-center" >{{trans_choice('general.detail',2)}} {{trans_choice('general.record',1)}}</p>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Close</button>
                <form  action="{{route('OrganizationsResource.destroy','null')}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes Delete</button>
                    <input type="hidden"  id="deleteId" name="deleteId" >
                    <input  value="{{Auth::User()->id}}"  type="hidden"  name="User">
                    <input value="{{$organization}}" type="hidden" name="organization" >
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- The options Modal -->
    <div class="modal fade modal-lg" id="optionsModal" tabindex="-1" aria-labelledby="optionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-text-style">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                
                <h4 class="modal-title text-center" >Select An Option</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>
                            <form action="{{route('OrganizationsResource.store')}}" method="post">
                            {{ csrf_field() }}
                                <input  value="all" type="hidden" name="all">
                                <button type="submit" class="btn btn-primary submit-btn">All</button> 
                            </form> 
                        </td>
                        <td>
                            <form action="{{route('OrganizationsResource.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="today" type="hidden" name="today">
                                    <button type="submit" class="btn btn-primary submit-btn">Today</button> 
                            </form>
                        </td>
                        <td>
                            <form action="{{route('OrganizationsResource.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="yesterday" type="hidden" name="yesterday">
                                    <button type="submit" class="btn btn-primary submit-btn">Yesterday</button> 
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{route('OrganizationsResource.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="thisMonth" type="hidden" name="thisMonth">
                                    <button type="submit" class="btn btn-primary submit-btn">This Month</button> 
                            </form>
                        </td>
                        <td>
                            <form action="{{route('OrganizationsResource.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="lastMonth" type="hidden" name="lastMonth">
                                    <button type="submit" class="btn btn-primary submit-btn">Last Month</button> 
                            </form>
                        </td>
                    </tr>

                </table>
                    <form action="{{route('OrganizationsResource.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="date" type="hidden" name="date">
                            <table>
                                <tr>
                                    <td>
                                        <label class="black-text main-label-text-1">From</label>
                                        <input  class="form-control" type="date" name="From" autocomplete="off" required="required" >
                                    </td>
                                    <td>
                                        <label class="black-text main-label-text-1">To</label>
                                        <input  class="form-control" type="date"  name="To" autocomplete="off" required="required" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <button type="submit" class="btn btn-primary submit-btn">Show</button> 
                                    </td>
                                </tr>
                            </table>
                    </form>
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>

    
    <script>

$(document).ready(function() {$('#table').DataTable();});


$('#showModal').on('show.bs.modal', function(event){
    var target = jQuery(event.relatedTarget)
    var id = target.attr('data-bs-id');

    var RequestUrl = BaseUrl+"/OrganizationsResource/"+id+"/edit";
    $.get(RequestUrl, function (data) {
        var created = data.data.created_at.split('T')[0]
        $('#showModal').modal('show');
        $('#show-created-id').html(created);
        $('#show-provice-id').html(data.data.Province);
        $('#show-coordinator-id').html(data.data.Coordinator);
        $('#show-contact-id').html(data.data.Contact);
        $('#show-erderly-num-id').html(data.data.Elderly_Num);
        $('#show-bank-account-id').html(data.data.B_Account);
        $('#show-bank-name-id').html(data.data.B_Name);
        $('#show-bank-branch-id').html(data.data.B_Branch);

        var activitiesList = data.data.ActivitiesArray;
        var challengesList = data.data.ChallengesArray;
        var recommendationsList = data.data.RecommendationArray;
        
        var activitiesJson = JSON.parse(activitiesList);
        var challengesJson = JSON.parse(challengesList);
        var recommendationsJson = JSON.parse(recommendationsList);
    
        var activitiesTrHTML = '';
        var challengesTrHTML = '';
        var recommendationsTrHTML = '';
        var activityCount = 1;
        var challengesCount = 1;
        var recommendationCount = 1;


        $.each(activitiesJson, function (i, item) {
            activitiesTrHTML += '<tr><td>' +'<span class="w3-badge">'+activityCount++ +'</span> &nbsp;&nbsp;&nbsp;' + item.data+ '</td><td>';
        });
        $('#activities_table').html(" "); // clear element 
        $('#activities_table').append(activitiesTrHTML);

        $.each(challengesJson, function (i, item) {
            challengesTrHTML += '<tr><td>' + '<span class="w3-badge">'+challengesCount++ +'</span> &nbsp;&nbsp;&nbsp;' + item.data+ '</td><td>';
        });
        $('#challenges_table').html(" "); // clear element 
        $('#challenges_table').append(challengesTrHTML);

        $.each(activitiesJson, function (i, item) {
            recommendationsTrHTML += '<tr><td>' + '<span class="w3-badge">'+recommendationCount++ +'</span> &nbsp;&nbsp;&nbsp;' + item.data+ '</td><td>';
        });
        $('#recommendations_table').html(" "); // clear element 
        $('#recommendations_table').append(recommendationsTrHTML);



    })
});

$('#editModal').on('show.bs.modal', function(event){
    var target = jQuery(event.relatedTarget)
    var id = target.attr('data-bs-id');
    var RequestUrl = BaseUrl+"/OrganizationsResource/"+id+"/edit";
    $.get(RequestUrl, function (data) {

        $('#editModal').modal('show');
        $('#editId').val(data.data.id);
        $('#edit-name').val(data.data.Name);
        $('#edit-date').val(data.data.Date);
        $('#edit-amount').val(data.data.Amount);
        $('#edit-paid').val(data.data.Paid);
    })
});



$('#deleteModal').on('show.bs.modal', function(event){
    var target = jQuery(event.relatedTarget)
    var id = target.attr('data-bs-id');
    var RequestUrl = BaseUrl+"/OrganizationsResource/"+id+"/edit";
    console.log(RequestUrl)
    
    $.get(RequestUrl, function (data) {
        console.log(data)
        
        $('#deleteModal').modal('show');
        $('#deleteId').val(data.data.id);
        $('#Delete-Name').html(data.data.Province);
    })
});

</script>
</x-app-layout>
