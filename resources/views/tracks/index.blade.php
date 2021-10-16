@extends('layouts.app')
@section('title')
     @lang('models/tracks.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/tracks.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('tracks.create')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('tracks.table')
            </div>
       </div>
   </div>
    
        @include('stisla-templates::common.paginate', ['records' => $tracks])

    </section>
@endsection



