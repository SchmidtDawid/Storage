@extends('master')
@section('content')


  @if( Session::has('product_created'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('product_created')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">nazwa</th>
        <th scope="col">opis</th>
        <th scope="col">dostawca</th>
        <th scope="col">cena</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>

        @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td><a href="{{url('products', $product->id)}}">{{$product->product_name}}</a></td>
        <td>{{ str_limit($product->description, $limit=60) }}</td>
        <td>{{$product->vendors->first()['name']}}</td>
        <td>{{$product->prices->last()['value'] }} PLN</td>
        <td>
            <a href="{{url('products', $product->id)}}"><button class="btn btn-primary btn-small">Widok</button></a>

            {{--  przycisk usuwający produkt  --}}
          {!! Form::model($product, ['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id]]) !!}
            <button class="btn btn-danger btn-small">Usuń</button>
          {!! Form::close() !!}


        </td>
      </tr>
        @endforeach

    </tbody>
  </table>

  {{ $products->links() }}

  <a href="{{ url('products', 'create') }}" role="button" class="btn btn-primary">Dodaj</a>

@stop
