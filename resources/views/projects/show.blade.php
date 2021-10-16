@extends('layouts.app')
@section('title')
    @lang('models/projects.singular') @lang('crud.details')
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('css/stop.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $project->name }}</h1>
            <div class="section-header-breadcrumb">
                <a href="" data-toggle="modal" data-target="#addtime" href="#" data-id="{{ \Auth::id() }}"
                    class="btn btn-primary form-btn float-right">Add Time Manually</a>
            </div>
        </div>

        <div class="content">
            @include('vendor.flash.message')

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        @include('projects.show_fields')
                    </div>
                </div>
            </div>

            <h3>Add Tracking Time</h3>
            <div class="card">
                <div class="card-header">
                    <h4>Tracking</h4>
                    <div class="card-header-action">
                        <a href="" data-toggle="modal" data-target="#addtime" href="#" data-id="{{ \Auth::id() }}"
                            class="btn btn-primary ">Add Time Manually</a>
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse" style="">
                    <div class="card-body">

                        <section class="clock">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 input-wrapper">
                                        <div class="input">
                                            <input type="hidden" id="num" class="form-control" min="0">

                                        </div>
                                        <div class="buttons-wrapper" >
                                            <button class="btn btn-success" id="start-cronometer">Start Timer</button>
                                        </div>
                                    </div>
                                    <div id="timer" class="col-12">
                                        <div class="clock-wrapper">
                                            <span class="hours">00</span>
                                            <span class="dots">:</span>
                                            <span class="minutes">00</span>
                                            <span class="dots">:</span>
                                            <span class="seconds">00</span>
                                        </div>
                                    </div>
                                    <div class="buttons-wrapper">
                                        <button class="btn btn-success" id="resume-timer">Resume Timer</button>
                                        <button class="btn btn-danger" id="stop-timer">Stop Timer</button>
                                        <button class="btn btn-warning" id="reset-timer">Reset Timer</button>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <form action="{{ route('addtime', ['id' => $project->id]) }}" method="POST">
                            @csrf
                            <input id="output1" name="time" type="hidden" class="text-center"></input>
                            <div class="form-group col-sm-12">
                                <label>Comment:</label>
                                <div class="input-group">
                                    <textarea class="form-control input-group__addon" name="comment" id="" cols="30"
                                        rows="20"></textarea>

                                </div>
                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
            <h3>Tracking Records</h3>
            @foreach ($project->times as $item)
                <div class="card ">
                    <div class="card-header">
                        <h4>{{ $item->time }} <code>{{ $item->user->name }}</code></h4>
                        @if (Auth::user()->role_id == 1 || Auth::user()->id == $item->user_id)

                            <div class="card-header-action">
                                {!! Form::open(['route' => ['tracks.destroy', $item->id], 'method' => 'delete']) !!}
                                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("' . __('crud.are_you_sure') . '")']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        {{ $item->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div id="addtime" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time</h5>
                    <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
                </div>

                <form method="POST" action="{{ route('addtimemanual', ['id' => $project->id]) }}">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="alert alert-danger d-none" id=""></div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>Start time:</label><span class="required confirm-pwd"></span><span
                                    class="required">*</span>
                                <div class="input-group">
                                    <input class="form-control input-group__addon" type="time" name="start"
                                        required>

                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>End time:</label><span class="required confirm-pwd"></span><span
                                    class="required">*</span>
                                <div class="input-group">
                                    <input class="form-control input-group__addon" type="time" name="end"
                                        required>

                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Comment:</label>
                                <div class="input-group">
                                    <textarea class="form-control input-group__addon" name="comment" id="" cols="30"
                                        rows="20"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" id="btnPrPasswordEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                            <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('page_js')
    <script src="{{ asset('js/stop.js') }}"></script>

@endsection
