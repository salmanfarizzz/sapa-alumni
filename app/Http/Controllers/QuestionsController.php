<?php

namespace App\Http\Controllers;
use App\Models\Semester;
use App\Models\TahunAkademik;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $semester = Semester::all();
        $tahun_akademik = TahunAkademik::all();
        $query = Question::query();

        if ($request->has('semester')) {
            $query->where('semester_id', $request->input('semester'));
        }
        if ($request->has('tahun_akademik')) {
            $query->where('tahun_akademik_id', $request->input('tahun_akademik'));
        }

        $data = $query->get();
        return view('pages.backend.pertanyaan.index', compact('user', 'data', 'semester', 'tahun_akademik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        $semester = Semester::where('status', '=', 'aktif')->get();

        $tahun_akademik = TahunAkademik::where('status', '=', 'aktif')->get();

        return view('pages.backend.pertanyaan.create', compact('user', 'semester', 'tahun_akademik'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'question_text' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'tipe' => 'required',
            'status' => 'required'

        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'semester.required' => 'semester wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
            'status.required' => 'Status jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id'           => $user['id'],
            'question_text'     => $request->input('question_text'),
            'semester_id'       => $request->input('semester'),
            'tahun_akademik_id' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => $request->input('status'),
        ];

        Question::create($data);
        
        return redirect('/question')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        $user = auth()->user();

        return redirect('/question')->with([
            'message' => 'Data Pertanyaan berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user
        ]);
    }
}
