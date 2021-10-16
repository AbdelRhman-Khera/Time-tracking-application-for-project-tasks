<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/tracks.fields.id').':') !!}
    <p>{{ $track->id }}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', __('models/tracks.fields.project_id').':') !!}
    <p>{{ $track->project_id }}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', __('models/tracks.fields.time').':') !!}
    <p>{{ $track->time }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/tracks.fields.user_id').':') !!}
    <p>{{ $track->user_id }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', __('models/tracks.fields.comment').':') !!}
    <p>{{ $track->comment }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/tracks.fields.created_at').':') !!}
    <p>{{ $track->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/tracks.fields.updated_at').':') !!}
    <p>{{ $track->updated_at }}</p>
</div>

