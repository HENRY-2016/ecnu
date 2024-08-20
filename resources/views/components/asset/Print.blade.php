


<script src="{{asset('js/main.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}">

<div id="receipt-print-area" >
    <div>
        <div class="about-div">
            <center>
                <br>
                <p class="black-text-color"><b>{{trans_choice('general.appName',1)}}</b></p>
                <p class="black-text-color"><b>{{trans_choice('general.asset',0)}}</b></p>
            </center>
        </div>
    
        <div class="customer-div">
            <p class="black-text-color"><strong>Asset Details !</strong> Perticular Information !</p>
            <table >
                <tbody>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Supplier</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{GeneralHelper::getSupplierName($data -> supplier)}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Name</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->name}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Quantity</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->quantity}}</p></td>
                    </tr>
                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Date</b></p></b></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp;{{$data->date}}</p></td>
                    </tr>

                    <tr>
                        <td class="table-td"><p class="black-text-color"><b>Registered Date</b></p></td>
                        <td class="table-td"><p class="black-text-color">&nbsp;&nbsp;&nbsp;&nbsp; {{$data->created_at->toFormattedDateString()}} </p></td>
                    </tr>
                </tbody>
            </table>
        </div><br><br>


    </div>
</div>
<center>
    <a  class="w3-button w3-red w3-round" href="{{route('asset.index')}}" > Cancel  </a>
    <button  class="w3-button w3-green w3-round" onclick="printReceipt()" >- - Print Now - - </button>
</center>
<br><br>
