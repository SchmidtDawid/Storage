@extends('master')
@section('content')

    <div class="jumbotron">

        <h3> {{ $product->product_name }} </h3>


        <p>aktualna cena: {{$product->prices->last()['value']}} PLN<br>

        {{--  <a href="{{ action('ProductsController@edit', $product->id) }}" role="button" class="btn btn-primary">Edytuj</a>  --}}
        <button class="btn btn-text" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            Historia
          </button>
        </p>



        <div class="collapse" id="collapseExample2">
          <div class="card-body">
              <table>
              <theader>
            <tr>
                <th>cena</th>
                <th><span>aktualizacja</span></th>
            </tr>
        </theader>
        <tbody>
                @foreach($product->prices->reverse() as $price)
                <tr>
                        <td>{{$price['value']}}PLN</td>
                        <td><span>{{$price['created_at']}}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
             </p>
        </div>
        </div>
        {{--  przycisk do aktualizacji ceny  --}}
        <button class="btn btn-primary btn-price" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Aktualizuj cenę
        </button>
        {{--  formularz aktualizacji ceny  --}}
      <div class="collapse" id="collapseExample">
        <div class="card-body">
            {!! Form::model($product, ['method'=>'PATCH', 'action'=>['ProductsController@update', $product->id]]) !!}

            @include('products.form_errors')

            {{--  @include('products.form', ['buttonText'=>'Zapisz zmiany'])  --}}

            <div class="form-group">
                <div>
                    {!! Form::hidden('product_name', 'nazwa produktu:') !!}
                </div>

                <div>
                    {!! Form::hidden('product_name', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div>
                    {!! Form::hidden('description', 'opis produktu:') !!}
                </div>

                <div>
                    {!! Form::hidden('description', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div>
                    {!! Form::label('value', 'cena:') !!}
                </div>

                <div>
                    {!! Form::text('value', null) !!}
                </div>
            </div>

            <div class="form-group">
                    <div>
                        {!! Form::hidden('VendorList', 'dostawca:') !!}
                    </div>

                    <div>
                        {!! Form::hidden('VendorList', $vendors , null, ['class'=>'form-control']) !!}
                    </div>
                </div>

            <div class="form-group">

                <div>
                    {!! Form::submit( 'zatwierdź' , ['class'=>'btn btn-primary btn-price']) !!}
                </div>

            </div>

        {!! Form::close() !!}
        </div>
      </div>
      <br>


        <p>dostawca: {{$product->vendors->first()['name']}}</p>
        <p class="description">{{ $product->description }} </p>

        <p>ostatnia aktualizacja: <br>{{ $product->user->name }} <br>{{ $product->updated_at }}</p>


        <a href="{{ action('ProductsController@edit', $product->id) }}" role="button" class="btn btn-primary">Edytuj</a>

        {!! Form::model($product, ['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id]]) !!}
            <button class="btn btn-danger">Usuń</button>
        {!! Form::close() !!}
    </div>

@stop
