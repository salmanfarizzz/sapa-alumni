<?php

namespace App\Http\Controllers;


use App\Models\options;
use App\Models\Question;
use App\Models\Result;
use App\Models\Semester;
use App\Models\TahunAkademik;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('pages.backend.alumni.index');
    }
    
    public function create_alumni()
    {
        $user = auth()->user();

        $questions =  Question::where("status", "=", "alumni")
        ->orderBy('id', 'ASC')
        ->with(['questionOptions' => function ($query) 
        {$query->inRandomOrder();}])
        ->get();

        return view('pages.backend.alumni.test', compact('user', 'questions'));
    }

    public function store_alumni(Request $request)
    {
        $request->validate([
            'questions' => 'required|array',
            'questions.*' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|exists:options,id',
        ], [
            'questions.required' => 'tidak ada pertanyaan',
            'questions.*.required' => 'Pertanyaan wajib diisi',
        ]);

        $user = auth()->user();
        $semester = Semester::where('status', '=', 'aktif')->first();
        $tahun_akademik = TahunAkademik::where('status', '=', 'aktif')->first();
        $options = options::find(array_values($request->input('questions')));
        $data = [
            'user_id' => $user['id'],
            'semester_id' => $semester['id'],
            'tahun_akademik_id' => $tahun_akademik['id'],
            'total_points' => $options->sum('point'),
            'status' => 'alumni',
        ];

        $result = Result::create($data);
        $questions = $options->mapWithKeys(function ($option) {
            return [
                $option->question_id => [
                    'options_id' => $option->id,
                    'option_text' => $option->option_text,
                    'points' => $option->point
                ]
            ];
        })->toArray();
        $result->questions()->sync($questions);

        // return redirect()->route('mahasiswa.hasil_penilaian');
        return redirect()->route('alumni.tracer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
