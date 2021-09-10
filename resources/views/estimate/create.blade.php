@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Create Estimate</h1>
    </div>
    <div class="panel-body">
        <form method="POST" action="{{ route('estimate.store') }}">
            @csrf
            @if (Session::has('success'))
            <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
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
                           <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h6>Client Type : </h6>
                                    <br>
                                    <select data-toggle="select2" data-search="true" class="custom-select" name="type_client" id="type" onchange="filtreClients()">
                                        <option disabled selected>Select client type</option>
                                        <option value="Client">Client</option>
                                        <option value="Prospect">Prospect</option>
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
                                            <input type="text" id="estimate_number"
                                            name="estimate_number" class="form-control" value="{{$estimate}}">
                                        </div>
                                        @error('estimate_number')
                                        <div class="error">
                                        {{ $message }}
                                       </div>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Issue Date
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="estimate_date" data-toggle="datetime" placeholder="Select a date & time">
                                        </div>
                                        @error('estimate_date')
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
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        @livewire('products')
                        <button type="submit" class="btn btn-info-lightened">Create Estimate</button>
        </form>
    </div>
</div>
    <script>
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

    </script>
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
        function filtreClients() {
            var x = document.getElementById("type").value;
            $.ajax({
                type: "GET",
                url: "/api/v1/filtreClients?type_client=" + x,
                success: function(data) {
                    $("#clients").html(data);
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
