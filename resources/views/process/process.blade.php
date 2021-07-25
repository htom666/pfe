@extends('layout.main')
@section('content')
{{-- 
    <div class="dropzone-container has-image" id="dropzone-1">
        <img src="{{asset('assets/svg/upload-invoice.svg')}}" alt="">
        <form action="POST" class="dropzone-form" action="{{route('process.upload')}}" enctype="multipart/form-data">
            
            <div class="message">
                <h2>Drop Your Invoice Here...</h2>
                <button type="button" class="btn btn-success btn-select btn-rounded btn-wide shadow">Or Click Here</button>
            </div>

            <div class="upload-icon">
                <svg width="48px" height="48px" viewBox="0 0 48 48">
                    <style>
                        @keyframes  Combined-Shape_t { 0% { transform: translate(0px,0px); animation-timing-function: cubic-bezier(0.42,0,0.58,1); } 33.3333% { transform: translate(0px,2px); animation-timing-function: cubic-bezier(0.42,0,0.58,1); } 100% { transform: translate(0px,0px); } }
                        @keyframes  Combined-Shape-2_t { 0% { transform: translate(-0px,4px); animation-timing-function: cubic-bezier(0.42,0,0.58,1); } 33.3333% { transform: translate(-0px,-4px); animation-timing-function: cubic-bezier(0.42,0,0.58,1); } 100% { transform: translate(-0px,4px); } }
                    </style>
                    <title>B_cloud_upload</title>
                    <desc>Created with Sketch.</desc>
                    <path id="Combined-Shape" d="M26,6C34.4373,6,41.3493,12.5308,41.9566,20.8131C45.5579,22.3633,48,25.9377,48,30C48,35.5228,43.5228,40,38,40C36.8954,40,36,39.1046,36,38C36,36.8954,36.8954,36,38,36C41.3137,36,44,33.3137,44,30C44,27.2459,42.1279,24.8641,39.4998,24.1885C38.6031,23.9579,37.9818,23.142,37.9981,22.2162C37.9997,22.1083,37.9997,22.1083,38,22C38,15.3726,32.6274,10,26,10C21.2724,10,17.0463,12.758,15.0986,16.9759C14.7055,17.8273,13.7735,18.2912,12.8572,18.0916C12.5786,18.031,12.292,18,12,18C9.79086,18,8,19.7909,8,22C8,22.2315,8.01945,22.4596,8.05776,22.683C8.20066,23.5167,7.80368,24.3501,7.0663,24.7645C5.18661,25.8208,4,27.8055,4,30C4,33.09,6.34768,35.6675,9.29864,35.9629L10.0986,36.0024C11.2019,36.0569,12.052,36.9954,11.9976,38.0986C11.9431,39.2019,11.0046,40.052,9.90137,39.9976L9.00241,39.9507C3.91134,39.4453,0,35.151,0,30C0,26.7974,1.51959,23.8594,4,21.9989C4.00062,17.5811,7.5821,14,12.1397,14.0012C14.9594,9.11827,20.197,6,26,6z" transform="translate(24,23) translate(-24,-23)" style="animation: Combined-Shape_t 1s linear infinite both;"/>
                    <path id="Combined-Shape-2" d="M26,28.8284L26,40C26,41.1046,25.1046,42,24,42C22.8954,42,22,41.1046,22,40L22,28.8284L19.4142,31.4142C18.6332,32.1953,17.3668,32.1953,16.5858,31.4142C15.8047,30.6332,15.8047,29.3668,16.5858,28.5858L22.5858,22.5858C22.9763,22.1953,23.4882,22,24,22C24.5118,22,25.0237,22.1953,25.4142,22.5858L31.4142,28.5858C32.1953,29.3668,32.1953,30.6332,31.4142,31.4142C30.6332,32.1953,29.3668,32.1953,28.5858,31.4142L26,28.8284L26,28.8284Z" transform="translate(24,36) translate(-24,-32)" style="animation: Combined-Shape-2_t 1s linear infinite both;"/>
                </svg>
            </div>
            <input type="submit" class="btn btn-success btn-rounded btn-wide shadow" value="Proceed to extraction">
        </form>

        <div class="previews-container row"></div>
    </div> --}}
    <!-- Showing Uploaded Files -->
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Upload Invoice</h1>
        </div>
        <div class="panel-body">

            <form id="fileupload-2" class="mt-3" action="{{route('process.upload')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                            <span>Add Invoice...</span>
                            <input type="file" name="invoice"/>
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <span>Start upload</span>
                        </button>
                                                <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>

                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" >
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Upload Invoice</h1>
        </div>
        <div class="panel-body">

            <form id="" class="mt-3" action="{{route('facture.process')}}" method="POST">
                @csrf
            
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <button type="submit" class="btn btn-primary start">
                            <span>Start Extracting</span>
                        </button>
                                                <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>

                    <!-- The global progress state -->
                </div>
            </form>

        </div>

    </div>
{{-- <form method="POST" action="{{route('process.upload')}}" enctype="multipart/form-data">
    @csrf
    {{-- <input type="file" name="invoice" id="invoice" required>
    <input type="submit" value="Import">
</form>
<form action="{{route('facture.process')}}" method="POST">
    @csrf
<p>hello</p>


<input type="submit" value="submit" name="submit">

</form> --}}
@endsection