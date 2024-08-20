

<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{trans_choice('general.supplier',0)}} 
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
        <a href="{{route('supplier.create')}}" class="btn btn-success">
            {{trans_choice('general.add',1)}}  
        </a>
        

        <table >
            <tr>
                <td>
                    <form action="{{route('supplier.store')}}" method="post">
                    {{ csrf_field() }}
                        <input  value="all" type="hidden" name="all">
                        <button type="submit" class="btn btn-outline-primary btn-fw">All</button> 
                    </form> 
                </td>
                <td>
                    <form action="{{route('supplier.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="yesterday" type="hidden" name="yesterday">
                            <button type="submit" class="btn btn-outline-primary btn-fw">Yesterday</button> 
                    </form>
                </td>
            
                <td>
                    <form action="{{route('supplier.store')}}" method="post">
                        {{ csrf_field() }}
                            <input  value="thisMonth" type="hidden" name="thisMonth">
                            <button type="submit" class="btn btn-outline-primary btn-fw">This Month</button> 
                    </form>
                </td>

                <td>
                    <form action="{{route('supplier.store')}}" method="post">
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
                    <th  class="text-center">Created</th>
                    <th  class="text-center">Name</th>
                    <th  class="text-center">Contact</th>
                    <th  class="text-center">Area</th>
                    <th  class="text-center">Modify</th>
                    @if((Auth::User()->email) == (Config::get('app.admin_email')))
                        <th  class="text-center">Delete</th>
                    @endif
                </tr>
            </thead>



            @foreach($data as $row)
            <tr class="row{{$row->id}}">
                <td class="text-center">{{$row -> created_at->toFormattedDateString()}}</td>
                <td class="text-center">{{$row -> name}}</td>
                <td class="text-center">{{$row -> contact}}</td>
                <td class="text-center">{{$row -> area}}</td>
                <td class="text-center"><a  class="btn btn-secondary" href="{{route('supplier.edit',$row->id)}}">Edit</a></td>
                @if((Auth::User()->email) == (Config::get('app.admin_email')))
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-id="{{$row->id}}"  data-bs-target="#deleteModal"
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
                <form  action="{{route('supplier.destroy','null')}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button  type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes Delete</button>
                    <input type="hidden"  id="deleteId" name="deleteId" >
                    <input  value="{{Auth::User()->id}}"  type="hidden"  name="User">
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
                            <form action="{{route('supplier.store')}}" method="post">
                            {{ csrf_field() }}
                                <input  value="all" type="hidden" name="all">
                                <button type="submit" class="btn btn-primary submit-btn">All</button> 
                            </form> 
                        </td>
                        <td>
                            <form action="{{route('supplier.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="today" type="hidden" name="today">
                                    <button type="submit" class="btn btn-primary submit-btn">Today</button> 
                            </form>
                        </td>
                        <td>
                            <form action="{{route('supplier.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="yesterday" type="hidden" name="yesterday">
                                    <button type="submit" class="btn btn-primary submit-btn">Yesterday</button> 
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{route('supplier.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="thisMonth" type="hidden" name="thisMonth">
                                    <button type="submit" class="btn btn-primary submit-btn">This Month</button> 
                            </form>
                        </td>
                        <td>
                            <form action="{{route('supplier.store')}}" method="post">
                                {{ csrf_field() }}
                                    <input  value="lastMonth" type="hidden" name="lastMonth">
                                    <button type="submit" class="btn btn-primary submit-btn">Last Month</button> 
                            </form>
                        </td>
                    </tr>

                </table>
                    <form action="{{route('supplier.store')}}" method="post">
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


// $('#deleteModal').on('show.bs.modal', function(event){
//     var target = jQuery(event.relatedTarget)
//     var id = target.attr('data-bs-id');
//     var RequestUrl = BaseUrl+"/supplier/"+id+"/edit";
//     console.log(RequestUrl)
    
//     $.get(RequestUrl, function (data) {
//         console.log(data)
        
//         $('#deleteModal').modal('show');
//         $('#deleteId').val(data.data.id);
//         $('#Delete-Name').html(data.data.Province);
//     })
// });

$('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id') 
        console.log("===>"+id)
        
        var modal = $(this)
        $.ajax({
            url: '/supplier/data/' + id,
            method: 'GET',
            success: function(response) {
                $('#deleteModal').modal('show');
                $('#deleteId').val(response.id);
                $('#Delete-Name').html(response.name);
            }
        });
    });


</script>
</x-app-layout>
