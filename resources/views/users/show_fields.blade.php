<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/users.fields.id').':') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <p>{{ $user->role_id }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/users.fields.created_at').':') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/users.fields.updated_at').':') !!}
    <p>{{ $user->updated_at }}</p>
</div>

