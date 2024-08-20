

<x-app-layout>
    <main id="main" class="main">

    <div class="pagetitle">
    <h5>
        <b>
        {{trans_choice('general.asset',0)}} 
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
    
        <a href="{{route('asset.index')}}" class="btn btn-success">
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
        <form method="POST" action="{{route('asset.store')}}">
            {{ csrf_field() }}
            <input  value="store" type="hidden" name="store">
                <div class="my-grid-container-2-columns">

                    <div class="my-grid-item">
                        <label class="input-labels" >Supplier</label>
                        <select required class="form-control" name="supplier" >
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}"> {{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-grid-item">
                        <label class="input-labels" >Date</label>
                        <input required type="date" required class="form-control" name="storeDate"  autocomplete="off">
                    </div>
                    
                    <div class="my-grid-item">
                        <label class="input-labels" >Item</label>
                        <input required type="text" required class="form-control" name="name" placeholder="Item Name"  autocomplete="off">
                    </div>
                    
                    <div class="my-grid-item">
                        <label class="input-labels" >Quantity</label>
                        <input required type="text" required class="form-control"  placeholder="Quantity" name="quantity"  autocomplete="off">
                    </div>

                    {{-- <div class="my-grid-item">
                        <label class="input-labels" >Cost</label>
                        <input required type="text" required class="form-control" name="cost"  autocomplete="off">
                    </div> --}}
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
