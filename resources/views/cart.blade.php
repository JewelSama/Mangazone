
@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product @php echo count($manga); @endphp </th>
                        <!-- <th>Quantity</th> -->
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                        @if (count($manga))
                       @foreach ($manga as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="/manga/{{$item->id}}"> <img class="media-object" src="{{asset('storage/' .$item->manga_cover)}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$item->name}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">{{$item->category}}</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <!-- <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="6">
                        </td> -->
                        <td class="col-sm-1 col-md-1 text-center"><strong>₦{{number_format($item->price)}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>₦{{number_format($item->price)}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="/remove-from-cart/{{$item->id}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    @endforeach 
                    @else
                    <td>Cart is  Empty</td>
                    @endif
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>₦{{number_format($total)}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <!-- <td><h5>Estimated shipping</h5></td> -->
                        <!-- <td class="text-right"><h5><strong>n</strong></h5></td> -->
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>₦{{number_format($total)}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button"  class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                            <form action="/pay" method="post">
                                @csrf
                        <button type="submit"  @unless (count($manga))
                            disabled
                        @endunless class="btn btn-default">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></form></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection