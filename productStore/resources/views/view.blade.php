@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                

                <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif                  

                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product</th>
                <th>Qty</th>
                <th>CostPrice</th>
                <th>Selling Price</th>
                <th>Amount in Stock</th>
                <th>Expiry date</th>
                <th>Creation Date</th>
                <th>Action 1</th>
                <th>Action 2</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)  
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->amount_instock}}</td>
                <td>{{$product->cprice}}</td>
                <td>{{$product->sprice}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->expdate}}</td>
                <td>{{$product->created_at}}</td>
                <td><a href="{{ route('edit',$product->id) }}" >Edit</a></td>
                <td> <form action="{{url('deleteaction')}}"  method="post">
                @csrf
                    <input name="_id" type="hidden" value="{{$product->id}}">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form></td>
            </tr>
            
      @endforeach
            </tbody>
        <tfoot>
            <tr>
               <th>Product ID</th>
                <th>Product</th>
                <th>Qty</th>
                <th>CostPrice</th>
                <th>Selling Price</th>
                <th>Amount in Stock</th>
                <th>Expiry date</th>
                <th>Creation Date</th>
                <th>Action 1</th>
                <th>Action 2</th>

            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 