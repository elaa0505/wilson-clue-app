<div class="row">
    @foreach($models as $mini)
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="well text-center">
                <p class="lead">{{ $mini->name }}</p>
                <div class="text-center">
                    {!! Html::image($mini->src,null,array('class'=>'media-object-128')) !!}
                </div>
                <p>{{ $mini->year }}</p>
                <a href="{{ route('admin.minigameImage.edit', $mini->id) }}" class="btn btn-primary btn-sm">
                    <span class="fa fa-edit"></span> Edit
                </a>
            </div>
        </div>
    @endforeach
</div>
