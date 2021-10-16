<div class="table-responsive">
    <table class="table" id="tracks-table">
        <thead>
            <tr>
                <th>@lang('models/tracks.fields.project_id')</th>
        <th>@lang('models/tracks.fields.time')</th>
        <th>@lang('models/tracks.fields.user_id')</th>
        <th>@lang('models/tracks.fields.comment')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tracks as $track)
            <tr>
                       <td>{{ $track->project_id }}</td>
            <td>{{ $track->time }}</td>
            <td>{{ $track->user_id }}</td>
            <td>{{ $track->comment }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['tracks.destroy', $track->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('tracks.show', [$track->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('tracks.edit', [$track->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
