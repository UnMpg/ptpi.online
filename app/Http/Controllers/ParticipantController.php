<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Participant;
use App\Topic;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $certificates = Certificate::all();
        $seminar_id = $request->seminar_id;
        return view('admin.participant.index', compact('certificates', 'seminar_id'));
    }

    public function show()
    {
        # code...
    }

    public function fetchParticipant(Request $request)
    {
        $columns = array(
            0 => 'nama',
            1 => 'email',
            2 => 'provinsi',
            3 => 'pekerjaan',
            4 => 'created_at',
            5 => 'id',
            6 => 'id',
        );

        if ($request->seminar_id) {
            $totalData = Participant::whereHas('certificates', function ($query) {
                $query->where('certificates.id', request('seminar_id'));
            })->count();
        } else {
            $totalData = Participant::count();
        }


        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            if ($request->seminar_id) {
                $posts = Participant::whereHas('certificates', function ($query) {
                    $query->where('certificates.id', request('seminar_id'));
                })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $posts = Participant::offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }
        } else {
            $search = $request->input('search.value');

            if ($request->seminar_id) {
                $posts =  Participant::whereHas('certificates', function ($query) {
                    $query->where('certificates.id', request('seminar_id'));
                })
                    ->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('provinsi', 'LIKE', "%{$search}%")
                    ->orWhere('pekerjaan', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $posts =  Participant::where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('provinsi', 'LIKE', "%{$search}%")
                    ->orWhere('pekerjaan', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }

            if ($request->seminar_id) {
                $totalFiltered = Participant::whereHas('certificates', function ($query) {
                    $query->where('certificates.id', request('seminar_id'));
                })
                    ->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('provinsi', 'LIKE', "%{$search}%")
                    ->orWhere('pekerjaan', 'LIKE', "%{$search}%")
                    ->count();
            } else {
                $totalFiltered = Participant::where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('provinsi', 'LIKE', "%{$search}%")
                    ->orWhere('pekerjaan', 'LIKE', "%{$search}%")
                    ->count();
            }
        }


        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $reset =  action('ParticipantController@resetPassword', $post->id);
                $seminar = '';

                foreach ($post->certificates as $certificate) {
                    $seminar .= '<span class="badge badge-info mr-1">' . $certificate->id . '</span>';
                }

                $nestedData['nama'] = $post->nama;
                $nestedData['email'] = $post->email;
                $nestedData['provinsi'] = $post->provinsi;
                $nestedData['pekerjaan'] = $post->pekerjaan;
                $nestedData['created_at'] = $post->created_at ? $post->created_at->format('d M Y - H:i:s') : '-';
                $nestedData['aksi'] = '<a onclick="return confirm(\'Are you sure?\')" href="' . $reset . '" title="RESET" class="btn btn-sm btn-outline-warning text-center">reset</a>';
                $nestedData['seminar'] = $request->seminar_id ? '<span class="badge badge-info mr-1">' . $request->seminar_id . '</span>' : $seminar;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function resetPassword($id)
    {
        $participant = Participant::find($id)->update(['password' => bcrypt('secret')]);
        if ($participant) {
            return back();
        }
    }

    public function getPreTest(Topic $topic)
    {
        return view('participants.quiz.pretest', compact('topic'));
    }

    public function getPostTest(Topic $topic)
    {
        return view('participants.quiz.posttest', compact('topic'));
    }

    public function quizList()
    {
        $topics = Topic::all();
        return view('participants.quiz.index', compact('topics'));
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return back();
    }
}
