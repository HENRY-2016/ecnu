

<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{trans_choice('general.supplier',0)}} 
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
    
        <a href="{{route('supplier.index')}}" class="btn btn-success">
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
        <form method="POST" action="{{route('supplier.update',$supplier->id)}}">
            {{method_field('patch')}}
            {{ csrf_field() }}
            <input  value="store" type="hidden" name="store">
                <div class="my-grid-container-3-columns">
                    
                    <div class="my-grid-item">
                        <label class="input-labels" >Name</label>
                        <input required type="text" value="{{$supplier->name}}" required class="form-control" name="name" placeholder="Supllier Name"  autocomplete="off">
                    </div>
                
                    <div class="my-grid-item">
                        <label class="input-labels" >Contact</label>
                        <input required type="text" value="{{$supplier->contact}}"  required class="form-control" placeholder="Contact" name="contact"  autocomplete="off">
                    </div>
                    
                    <div class="my-grid-item">
                        <label class="input-labels" >Area</label>
                        <input required type="text" required class="form-control" value="{{$supplier->area}}"   placeholder="Area " name="area"  autocomplete="off">
                    </div>
                    
                </div>

                <br><br>
                <center>
                    <button type="submit" style="width: 100% !important"  class="btn btn-primary submit-btn">{{trans_choice('general.save',1)}}{{trans_choice('general.detail',2)}}</button>
                </center>
        </form>

        <!-- End Table with stripped rows -->

    </div>
    </div>

    </div>
    </div>
    </section>

    </main><!-- End #main -->

    
    <script>

    </script>
</x-app-layout>
