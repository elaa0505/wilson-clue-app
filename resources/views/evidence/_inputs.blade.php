

<div class="row">
    <!-- evidence title -->
    <div class="form-group col-xs-12 col-sm-4">
        {!! Form::label('title', 'Evidence Title') !!}
        {!! Form::text('title', null, array('class'=>'form-control')) !!}
    </div>
</div>
    <div class="row">
        <div class="form-group col-xs-12">
            @include('partials._image_input',['current' => $evidence->src, 'alt' => $evidence->title])
        </div>
    </div>
<div class="row">
    <div class="form-group col-xs-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>