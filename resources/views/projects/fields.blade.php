<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/projects.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/projects.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from', __('models/projects.fields.from').':') !!}
    {!! Form::date('from', null, ['class' => 'form-control','id'=>'from']) !!}
</div>


<!-- To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to', __('models/projects.fields.to').':') !!}
    {!! Form::date('to', null, ['class' => 'form-control','id'=>'to']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('projects.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
