<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', __('models/tracks.fields.project_id').':') !!}
    {!! Form::number('project_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', __('models/tracks.fields.time').':') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/tracks.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comment', __('models/tracks.fields.comment').':') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tracks.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
