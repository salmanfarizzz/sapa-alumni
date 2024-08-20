<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\options;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question_id)
    {
        $user = auth()->user();

        $question = Question::findOrFail($question_id);

        $options = options::where('question_id', '=', $question_id)->get();

        $option_count = options::where('question_id', '=', $question_id)->get()->count();

        // dd($option_count);

        return view('pages.backend.option.index', compact('user', 'question', 'options', 'option_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question_id)
    {
        $user = auth()->user();

        $question = Question::findOrFail($question_id);

        return view('pages.backend.option.create', compact('user', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'option_text' => 'required',
            'point' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',

        ], [
            'question_id.required' => 'Pertanyaan wajib diisi',
            'option_text.required' => 'Jawaban wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.regex:/^[0-9]+(\.[0-9][0-9]?)?$/' => 'Nilai harus bernilai angka',
        ]);

        $data = [
            'question_id' => $request->input('question_id'),
            'option_text' => $request->input('option_text'),
            'point' => $request->input('point'),
        ];

        options::create($data);

        return redirect()->route('type.jawaban_pertanyaan', $request->input('question_id'))->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function show(options $options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function edit(options $options)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, options $options)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function destroy(options $options)
    {
        //
    }
}
