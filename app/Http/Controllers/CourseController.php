<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Kuis;
use App\Pertanyaan;


class CourseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth:guru','auth:siswa','auth']);
    // }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    $materi = Materi::where('mapels_id', $id)->paginate(10);
    return view('courses.index', ['course' => $materi]);
  }
  public function kuis($id)
  {
    $pertanyaan = Pertanyaan::with('jawaban')->where('materis_id', $id)->paginate(10);
    return view ('courses.kuis',['course' => $pertanyaan]);
  }

  public function materiquiz($id){
    $materi = Materi::find($id);
        return view ('courses.materiquis')->with('materi',$materi);
  }
}
