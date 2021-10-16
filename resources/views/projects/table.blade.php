<div class="table-responsive">
    <table class="table" id="projects-table">
        <thead>
            <tr>
                <th>@lang('models/projects.fields.name')</th>
                <th>@lang('models/projects.fields.description')</th>
                <th>@lang('models/projects.fields.from')</th>
                <th>@lang('models/projects.fields.to')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->from->toDateString() }}</td>
                    <td>{{ $project->to->toDateString() }}</td>
                    <td class=" text-center">
                        {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-light action-btn '><i
                                    class="fa fa-eye"></i></a>

                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("' . __('crud.are_you_sure') . '")']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
