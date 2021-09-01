@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Discounts List</h1>
    </div>
    <div class="panel-body">
        <br>
        <br>
        <div class="row">

            <div class="col-md-12 my-2">

                <table id="datatable-column-search" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice ID</th>
                            <th>User</th>
                            <th>Discounts</th>
                            <th>Rest to pay</th>
                            <th>Discount created Date</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice ID</th>
                            <th>User</th>
                            <th>Discounts</th>
                            <th>Rest to pay</th>
                            <th>Discount created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($discount as $discount)
                            <tr>
                            <td>{{$discount->id}}</td>
                            <td>{{ $discount->facture_id }}</td>
                            <td>{{ $discount->user_id }}</td>
                            <td>{{ $discount->discount }}</td>
                            <td>{{ $discount->rest_to_pay }}</td>
                            <td>{{$discount->created_at}}</td>
                            <td>
                                <form action="{{ route('discount.destroy', $discount->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection