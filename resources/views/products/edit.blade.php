@extends('master')
@section('content')


{!! Form::model($product, ['method'=>'PATCH', 'class'=>'custom-form', 'action'=>['ProductsController@update', $product->id]]) !!}

    @include('products.form_errors')

    {{--  @include('products.form', ['buttonText'=>'Zapisz zmiany'])  --}}

    <div class="form-group">
        <div>
            {!! Form::label('product_name', 'nazwa produktu:') !!}
        </div>

        <div>
            {!! Form::text('product_name', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div>
            {!! Form::label('description', 'opis produktu:') !!}
        </div>

        <div>
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
            <div>
                {!! Form::label('value', 'cena:') !!}
            </div>

            <div>
                {!! Form::text('value', $price, ['class'=>'form-control']) !!}
            </div>
        </div>

    <div class="form-group">
        <div>
            {!! Form::label('VendorList', 'dostawca:') !!}
        </div>

        <div>
            {!! Form::select('VendorList', $vendors , null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">

        <div>
            {!! Form::submit( 'Zatwierdź zmiany' , ['class'=>'btn btn-primary']) !!}
        </div>

    </div>

{!! Form::close() !!} @stop
