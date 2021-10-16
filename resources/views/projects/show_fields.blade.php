{{-- <div class="row">
<!-- Id Field -->
<div class="form-group col">
    {!! Form::label('id', __('models/projects.fields.id').':') !!}
    <p>{{ $project->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group col">
    {!! Form::label('name', __('models/projects.fields.name').':') !!}
    <p>{{ $project->name }}</p>
</div>
</div> --}}
<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/projects.fields.description').':') !!}
    <p>{{ $project->description }}</p>
</div>
<div class="row">
<!-- From Field -->
<div class="form-group col">
    {!! Form::label('from', __('models/projects.fields.from').':') !!}
    <p>{{ $project->from->toDateString() }}</p>
</div>

<!-- To Field -->
<div class="form-group col">
    {!! Form::label('to', __('models/projects.fields.to').':') !!}
    <p>{{ $project->to->toDateString() }}</p>
</div>
</div>
<div class="row">
<!-- Created At Field -->
<div class="form-group col">
    {!! Form::label('created_at', __('models/projects.fields.created_at').':') !!}
    <p>{{ $project->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col">
    {!! Form::label('updated_at', __('models/projects.fields.updated_at').':') !!}
    <p>{{ $project->updated_at }}</p>
</div>
</div>

