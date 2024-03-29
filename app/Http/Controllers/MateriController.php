<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use TonchikTm\PdfToHtml\Pdf;

class MateriController extends Controller
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
    public function index()
    {
        $materi = Materi::paginate(10);
        return view('materi.index', ['materi' => $materi]);
    }

    public function convertToPDF(){
        $pdf = new Pdf('C:/xampp/htdocs/e-learning/pdf/virus.pdf', [
            'pdftohtml_path' => 'C:/xampp/htdocs/e-learning/poppler-0.68.0/bin/pdftohtml.exe',
            'pdfinfo_path' => 'C:/xampp/htdocs/e-learning/poppler-0.68.0/bin/pdfinfo.exe',
            'generate' => [ // settings for generating html
                'singlePage' => false, // we want separate pages
                'imageJpeg' => false, // we want png image
                'ignoreImages' => false, // we need images
                'zoom' => 1.5, // scale pdf
                'noFrames' => true, // we want separate pages
            ],
            'clearAfter' => true, // auto clear output dir (if removeOutputDir==false then output dir will remain)
            'removeOutputDir' => true, // remove output dir

            'html' => [ // settings for processing html
                'inlineCss' => false, // replaces css classes to inline css rules
                'inlineImages' => true, // looks for images in html and replaces the src attribute to base64 hash
                'onlyContent' => false, // takes from html body content only
            ]
            ]);

            $arrayTag = array();
            // get pdf inf
            // $pdfInfo = $pdf->getInfo();

            // get count pages
            // $countPages = $pdf->countPages();

            // get content from one page

            // get content from all pages and loop for they
            foreach ($pdf->getHtml()->getAllPages() as $page) {
                array_push($arrayTag, $page);
            }

           return $arrayTag;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pdf = $this->convertToPDF();

        return view('materi.create', ['pdf' => $pdf]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_materi' => 'required',
            'konten_materi' => 'required'
        ]);

        $materi = new Materi;
        $materi->nama_materi = $request->input('nama_materi');
        $materi->konten_materi = $request->input('konten_materi');
        $materi->mapels_id = $request->input('mapels_id');
        $materi->save();

        return redirect('/materi')->with('success', 'New Lecture Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materi = Materi::find($id);
        return view ('materi.show')->with ('materi',$materi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::find($id);
        return view ('materi.edit')->with('materi',$materi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_materi' => 'required',
            'konten_materi' => 'required'
        ]);

        $materi = Materi::find($id);
        $materi->nama_materi = $request->get('nama_materi');
        $materi->konten_materi = $request->get('konten_materi');
        $materi->mapels_id = $request->get('mapels_id');
        $materi->save();

        return redirect('/materi')->with('success', 'New Lecture Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi= materi::find($id);
        $materi->delete();
        return redirect('/materi')->with('success', 'Lecture Removed');
    }
}
