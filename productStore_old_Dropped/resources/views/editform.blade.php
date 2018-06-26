@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                 <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('editaction')}}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$product->name}}"  name="name"  required autofocus>
                                <input id="_id" type="hidden" class="form-control" value="{{$product->id}}"  name="_id"  required autofocus>
                               
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="qty" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="qty" type="number" class="form-control" name="qty"  value="{{$product->qty}}" required>

                            </div>
                        </div>

                    <div class="form-group">
                            <label for="cprice" class="col-md-4 control-label">Cost Price</label>

                            <div class="col-md-6">
                                <input id="cprice" type="number" class="form-control" name="cprice" value="{{$product->cprice}}"  required>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="sprice" class="col-md-4 control-label">Selling Price</label>

                            <div class="col-md-6">
                                <input id="sprice" type="number" class="form-control" value="{{$product->sprice}}"  name="sprice" required>

                            </div>
                        </div>
                       
                           <div class="form-group">
                            <label for="expdate" class="col-md-4 control-label">Expire Date</label>

                            <div class="col-md-6">
                                <input id="exdate" type="date" class="form-control"  value="{{$product->expdate}}" name="exdate" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
