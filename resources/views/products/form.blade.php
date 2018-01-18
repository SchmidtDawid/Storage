
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
            {!! Form::text('value', null, ['class'=>'form-control']) !!}
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
            {!! Form::submit( $buttonText, ['class'=>'btn btn-primary']) !!}
        </div>

    </div>
