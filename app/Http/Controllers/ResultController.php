<?php

namespace App\Http\Controllers;
use App\Models\BobotVariabel;
use App\Models\Question;
use App\Models\Result;
use App\Models\Semester;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();

        // $results = Result::where('status', '=', 'mahasiswa')->get();

        $semester = Semester::all();
        $tahun_akademik = TahunAkademik::all();
        $query = Result::query();
        $query->where('user_id', '=', $user['id']);

        if ($request->has('semester')) {
            $query->where('semester_id', $request->input('semester'));
        }

        if ($request->has('tahun_akademik')) {
            $query->where('tahun_akademik_id', $request->input('tahun_akademik'))->where('status', '=', "alumni");
        }

        if ($request->input('semester') == null && $request->input('tahun_akademik') == null) {
            $query->where('status', '=', "alumni");
        }

        $results = $query->get();
        
        return view('pages.backend.result.index', compact('user', 'results', 'semester', 'tahun_akademik'));
    }
}
