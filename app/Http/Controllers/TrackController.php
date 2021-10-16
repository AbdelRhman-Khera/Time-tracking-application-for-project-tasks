<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Repositories\TrackRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class TrackController extends AppBaseController
{
    /** @var  TrackRepository */
    private $trackRepository;

    public function __construct(TrackRepository $trackRepo)
    {
        $this->trackRepository = $trackRepo;
    }

    /**
     * Display a listing of the Track.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tracks = $this->trackRepository->paginate(10);

        return view('tracks.index')
            ->with('tracks', $tracks);
    }

    /**
     * Show the form for creating a new Track.
     *
     * @return Response
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created Track in storage.
     *
     * @param CreateTrackRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackRequest $request)
    {
        $input = $request->all();

        $track = $this->trackRepository->create($input);

        Flash::success('Added successfully');

        return redirect(route('tracks.index'));
    }

    public function manual($id,Request $request)
    {
        $start = new Carbon($request->start);
        $end = new Carbon($request->end);

        if ($start > $end) {
            Flash::error('Wrong! end time is bigger than start time')->important();
            return back();
        }

        $time = $start->diff($end)->format('%H:%I');

        $input = $request->all();
        $input['time'] = $time;
        $input['user_id'] = Auth::user()->id;
        $input['project_id'] = $id;

        $track = $this->trackRepository->create($input);

        Flash::success('Added successfully');
        return back();
    }

    public function addtime($id,Request $request)
    {
        $time = substr($request->time, 0, -3);
        $t =date("H:i",strtotime($time));

        $input = $request->all();
        $input['time'] = $t;
        $input['user_id'] = Auth::user()->id;
        $input['project_id'] = $id;

        $track = $this->trackRepository->create($input);

        Flash::success('Added successfully');
        return back();
    }
    /**
     * Display the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $track = $this->trackRepository->find($id);

        if (empty($track)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tracks.singular')]));

            return redirect(route('tracks.index'));
        }

        return view('tracks.show')->with('track', $track);
    }

    /**
     * Show the form for editing the specified Track.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $track = $this->trackRepository->find($id);

        if (empty($track)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tracks.singular')]));

            return redirect(route('tracks.index'));
        }

        return view('tracks.edit')->with('track', $track);
    }

    /**
     * Update the specified Track in storage.
     *
     * @param int $id
     * @param UpdateTrackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackRequest $request)
    {
        $track = $this->trackRepository->find($id);

        if (empty($track)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tracks.singular')]));

            return redirect(route('tracks.index'));
        }

        $track = $this->trackRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tracks.singular')]));

        return redirect(route('tracks.index'));
    }

    /**
     * Remove the specified Track from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $track = $this->trackRepository->find($id);

        if (empty($track)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tracks.singular')]));

            return redirect(route('tracks.index'));
        }

        $this->trackRepository->delete($id);

        Flash::success('Deleted successfully');
        return back();
    }
}
