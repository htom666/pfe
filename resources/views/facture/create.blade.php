@extends('layout.main')
@section('content')

    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Create Invoice</h1>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('facture.store') }}">
                @csrf
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible alert-dismissible-2"
                    data-animation="fadeOut" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                            </path>
                        </svg>
                    </button>
                </div>
             @endif
             @if (Session::has('error'))
             <div class="alert alert-error alert-dismissible alert-dismissible-2" data-animation="fadeOut"
             role="alert">
             {{ Session::get('error') }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                     <path class="heroicon-ui"
                         d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                     </path>
                 </svg>
             </button>
             </div>
             @endif
                               <hr class="row brc-default-l1 mx-n1 mb-4" />

                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h6>Client Type : </h6>
                                        <br>
                                        <select data-toggle="select2" data-search="true" class="custom-select" name="type_client" id="type">
                                            <option disabled selected>Select client type</option>
                                            <option value="client">Client</option>
                                            <option value="prospect">Prospect</option>
                                        </select>
                                        </span>
                                    </div>
                                    <div>
                                        <br>
                                       <h6>Client Name :</h6>
                                       <br>
                                        <span class="text-600 text-110 text-blue align-middle">
                                            <select data-toggle="select2" data-search="true" class="custom-select" name="client_id" id="clients"
                                                onchange="getCompanies()">
                                                <option disabled selected value="">Select Client</option>
                                                @foreach ($client as $client)
                                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                             <div class="error">
                                             {{ $message }}
                                            </div>
                                            @enderror
                                            <br>
                                            <br>
                                            <a href="{{route('client.create')}}" class="link-info"> + Add client</a>
                                        </span>
                                        
                                    </div>
                                    <div>
                                        <br>
                                        <h6>Company Name :</h6>
                                        <br>
                                        <select data-toggle="select2" data-search="true" class="form-control" name="company_name" id="companies"
                                            onchange="getPhone();getAdresse()">
                                            <option disabled selected>Select Company</option>
                                        </select>
                                        @error('company_name')
                                        <div class="error">
                                        {{ $message }}
                                       </div>
                                       @enderror
                                        </span>
                                    </div>
                                    <br>
                                    <div class="field-group field-group-vertical field-group-sm">
											
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="phone" name="company_phone" class="form-control">
                                            </div>
                                            @error('company_phone')
                                            <div class="error">
                                            {{ $message }}
                                           </div>
                                           @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-address-card"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="company_address" name="company_address" class="form-control">
                                            </div>
                                            @error('company_address')
                                                <div class="error">
                                                {{ $message }}
                                               </div>
                                               @enderror
                                        </div>

                                    </div>
                                    {{-- <div class="text-grey-m2">
                                        <div class="my-1">
                                            <i
                                                class="fa fa-phone fa-flip-horizontal text-secondary"></i>&nbsp;&nbsp;&nbsp;<input
                                                type="text" id="phone" name="company_phone">

                                        </div>
                                        <div class="my-1">

                                        </div>
                                        <div class="my-1"><i class="far fa-address-book"></i>&nbsp;&nbsp;&nbsp;<input
                                                type="text" id="company_address" name="company_address"></div>
                                    </div> --}}
                                </div>
                                <!-- /.col -->
                                
                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        ID
                                                    </span>
                                                </div>
                                                <input type="text" value="{{$invoice}}"id="invoice_number"
                                                name="invoice_number" class="form-control">
                                                @error('invoice_number')
                                                <div class="error">
                                                {{ $message }}
                                               </div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Issue Date
                                                    </span>
                                                </div>
                                                <input type="text"  class="form-control" name="invoice_date" data-toggle="datetime" placeholder="Select a date & time">
                                            </div>
                                            @error('invoice_date')
                                            <div class="error">
                                            {{ $message }}
                                           </div>
                                           @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                       Due Date
                                                    </span>
                                                </div>
                                                <input type="text"  class="form-control" name="expiration_date" data-toggle="datetime" placeholder="Select a date & time">
                                               
                                            </div>
                                            @error('expiration_date')
                                            <div class="error">
                                            {{ $message }}
                                           </div>
                                           @enderror
                                        </div>
                                        {{-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">ID:</span><input type="text" id="invoice_number"
                                                name="invoice_number"></div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Issue Date:</span><input type="date"
                                                name="invoice_date"></div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Status:</span> <span
                                                class="badge badge-warning badge-pill px-25">Unpaid</span></div> --}}
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!------ Include the above in your HEAD tag ---------->
                            {{-- <div class="row clearfix">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> # </th>
                                                <th class="text-center"> Product </th>
                                                <th class="text-center"> Qty </th>
                                                <th class="text-center"> Price </th>
                                                <th class="text-center"> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id='addr0'>
                                                <td>1</td>
                                                <td><input type="text" name='product[]' placeholder='Enter Product Name'
                                                        class="form-control" /></td>
                                                <td><input type="number" name='qty[]' placeholder='Enter Qty'
                                                        class="form-control qty" step="0" min="0" /></td>
                                                <td><input type="number" name='price[]' placeholder='Enter Unit Price'
                                                        class="form-control price" step="0.00" min="0" /></td>
                                                <td><input type="number" name='total[]' placeholder='0.00'
                                                        class="form-control total" readonly /></td>
                                            </tr>
                                            <tr id='addr1'></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                                    <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top:20px">
                                <div class="pull-right col-md-4">
                                    <table class="table table-bordered table-hover" id="tab_logic_total">
                                        <tbody>
                                            <tr>
                                                <th class="text-center">Sub Total</th>
                                                <td class="text-center"><input type="number" name='sub_total'
                                                        placeholder='0.00' class="form-control" id="sub_total" readonly />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Tax</th>
                                                <td class="text-center">
                                                    <div class="input-group mb-2 mb-sm-0">
                                                        <input type="number" class="form-control" id="tax" placeholder="0">
                                                        <div class="input-group-addon">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Tax Amount</th>
                                                <td class="text-center"><input type="number" name='tax_amount'
                                                        id="tax_amount" placeholder='0.00' class="form-control" readonly />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Grand Total</th>
                                                <td class="text-center"><input type="number" name='total_amount'
                                                        id="total_amount" placeholder='0.00' class="form-control"
                                                        readonly /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            @livewire('products')
                            <button type="submit" class="btn btn-info-lightened">Create invoice</button>
            </form>
        </div>
    </div>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container-xl" style="margin-top:50px">
        <form method="POST" action="{{ route('facture.store') }}">
            @csrf
            <div class="page-content container">
                <div class="page-header text-blue-d2">
                    <div class="form-group">
                        <label for="logo"> Logo</label>
                        <input type="file" name="logo" class="form-control" onchange="previewFile(this)" />
                        <img id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px;" />
                    </div>
                    <div class="page-tools">
                        <div class="action-buttons">
                            <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                Print
                            </a>
                            <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                Export
                            </a>
                        </div>
                    </div>
                </div>

                <div class="container px-0">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-10 offset-lg-1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-150">
                                        <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                        <span class="text-default-d3">Bootdey.com</span>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->

                            <hr class="row brc-default-l1 mx-n1 mb-4" />

                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <select class="form-control input-lg" name="type_client" id="type">
                                            <option disabled selected>Select client type</option>
                                            <option value="client">Client</option>
                                            <option value="prospect">Prospect</option>
                                        </select>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                                        <span class="text-600 text-110 text-blue align-middle">
                                            <select class="form-control input-lg" name="client_id" id="clients"
                                                onchange="getCompanies()">
                                                <option value="">Select Client</option>
                                                @foreach ($client as $client)
                                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </div>
                                    <div>
                                        <select class="form-control input-lg" name="company_name" id="companies"
                                            onchange="getPhone();getAdresse()">
                                            <option disabled selected>Select Company</option>
                                        </select>
                                        </span>
                                    </div>
                                    <div class="text-grey-m2">
                                        <div class="my-1">
                                            <i
                                                class="fa fa-phone fa-flip-horizontal text-secondary"></i>&nbsp;&nbsp;&nbsp;<input
                                                type="text" id="phone" name="company_phone">

                                        </div>
                                        <div class="my-1">

                                        </div>
                                        <div class="my-1"><i class="far fa-address-book"></i>&nbsp;&nbsp;&nbsp;<input
                                                type="text" id="company_address" name="company_address"></div>
                                    </div>
                                </div>
                                <!-- /.col -->

                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Invoice
                                        </div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">ID:</span><input type="text" id="invoice_number"
                                                name="invoice_number"></div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Issue Date:</span><input type="date"
                                                name="invoice_date"></div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                class="text-600 text-90">Status:</span> <span
                                                class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div> --}}

    
    {{-- @livewire('services') --}}
{{-- 
    <div class="row border-b-2 brc-default-l2"></div> --}}


    {{-- <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    Extra note such as company or payment information...
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">$2,250</span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Tax (10%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">$225</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">$2,475</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

    {{-- <hr />
    <div>
        <span class="text-secondary-d1 text-105">Thank you for your business</span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    </div> --}}
    {{-- <script>
        function previewFile(input) {
            var logo = $("input[type=file]").get(0).files[0];
            if (logo) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(logo);

            }
        }

    </script> --}}
    <style>
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

    </style>
    <script>
        function getCompanies() {
            var x = document.getElementById("clients").value;
            $.ajax({
                type: "GET",
                url: "/api/v1/companies?id=" + x,
                success: function(data) {
                    $("#companies").html(data);
                }
            });
        }

        function getPhone() {
            var x = document.getElementById("companies").value;
            $.ajax({
                type: "GET",
                url: "/api/v1/phone?id=" + x,
                success: function(data) {
                    $('#phone').val(data);
                }
            });
        }

        function getAdresse() {
            var x = document.getElementById("companies").value;
            $.ajax({
                type: "GET",
                url: "/api/v1/adresse?id=" + x,
                success: function(data) {
                    $('#company_address').val(data);
                }
            });
        }
        // // function getPrice() {
        // //     var x = document.getElementById("product").value;
        // //     $.ajax({
        // //         type: "GET",
        // //         url: "/api/v1/price?id=" + x,
        // //         success: function (data) {
        // //             $('#price').val(data);
        // //         }
        // //     });
        // // }
        // $(document).ready(function(){
        //     $('#quant').keyup(calculate);
        //     $('#price').keyup(calculate);
        // });
        // function calculate(e)
        // {
        //     $('#demo').val($('#quant').val() * $('#price').val());
        // }
        // function SumProd()
        // {
        //     var quant = document.getElementById("quant").value;
        //     var price = document.getElementById("price").value;
        //     var sum = parseFloat(quant) * parseFloat(price);
        //     if(!NaN(sum))
        //     {
        //         document.getElementById("demo").innerHTML=sum;
        //     }
        // };
        // var quant = document.getElementById('quant').value;
        // console.log(quant);
        // var price = document.getElementById('price').value;
        // console.log(price);
        // total = quant * price;
        // console.log(total);
        // var x = document.getElementById("product").value;
        // document.getElementById("demo").innerHTML = total;
        // //var total = quant*price;
        // //var tot = document.getElementById('total');
        // console.log(x);

    </script>
@endsection
