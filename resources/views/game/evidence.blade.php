@extends('layouts.game', ['title' => 'Clue - '.$game->name])

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.game.edit.evidence', $game) !!}
@stop
@section('game.content')

    @include('admin._alert')

    <div class="row">
        {!! Form::model($game, ['route'=> ['admin.game.update',$game->id], 'method' => 'put']) !!}
        <div class="col-xs-12">
            <h2>Evidence Room</h2>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                {!! Form::label('evidence_location_id','Location') !!}
                {!! Form::select('evidence_location_id',$locations->pluck('name','id'), ($game->evidence_location ? $game->evidence_location->id : null), array('placeholder' => 'Select a location', 'class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importEvidenceRoomModal">
                Import From Previous Game
            </button>
        </div>
        <div class="col-sm-12 col-md-9">

            <legend>Case File Items</legend>
            <div class="form-group" id="caseFileItems">
                @if($game->case_file_items)
                    @foreach($game->case_file_items as $cf_item)
                        @include('game._case_file_item_form')
                    @endforeach
                @endif

                <button type="button" class="btn btn-success pull-right load-case-file-form" data-url="{{ route('admin.casefileItemForm') }}"><span class="fa fa-plus-circle"></span> Add Item</button>
            </div>


            <legend>Evidence <small>(drag and drop to add/remove)</small></legend>
            {!! Form::hidden('evidence_list',implode(',',$game->evidence->pluck('id')->all())) !!}
            <div class="table">
                <div class="table-cell-col-2">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>Evidence Items</h4>
                            <div class="well" id="evidenceList">
                                @include('evidence._select_list',array('evidence'=> $game->evidence))
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-cell-col-2">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>Available Items</h4>
                            <div class="well" id="availableEvidence">
                                @include('evidence._select_list',array('evidence'=>$evidence))
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('modal')
    @include('game._import_evidence_room_modal')
@stop


