<?php

namespace App\Http\Controllers;

use App\Galeries;
use App\Albums;
use Auth;
use File;
use Image;
use Illuminate\Http\Request;

class GaleriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 4;
        $galeries = Galeries::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeries->currentPage() - 1);

        // return $galeries;

        return view('pages.visitor.galery.index', compact('galeries', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Albums::all();
        return view('pages.visitor.galery.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $galery = new Galeries();
        $galery->nama_galeri = $request->nama_galeri;
        $galery->keterangan = $request->keterangan;
        $galery->id_album = $request->id_album;
        $galery->id_user = Auth::user()->id;

        $foto = $request->foto;
        $nama_file = time() . '.' . $foto->getClientOriginalExtension();

        Image::make($foto)->resize(180, 130)
            ->save('assets/thumb/' . $nama_file);

        $foto->move('assets/images', $nama_file);

        $galery->foto =  $nama_file;

        $galery->save();
        return redirect('/galeri')->with('pesan', 'Data galery photo berhasil di simpan');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function show(Galeries $galeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeries $galeries)
    {
        $albums = Albums::all();
        return view('pages.visitor.galery.edit', compact('galeries', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeries $galeries)
    {
        // return $galeries; // old data

        $galery = Galeries::find($galeries->id);
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        if ($request->has('foto')) {
            $galery->nama_galeri = $request->nama_galeri;
            $galery->keterangan = $request->keterangan;
            $galery->id_album = $request->id_album;

            $foto = $request->foto;
            $nama_file = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(180, 130)
                ->save('assets/thumb/' . $nama_file);

            $foto->move('assets/images/', $nama_file);

            $galery->foto =  $nama_file;

            // delete old img 
            File::delete('assets/images/' . $galeries->foto);
            File::delete('assets/thumb/' . $galeries->foto);
        } else {
            $galery->nama_galeri = $request->nama_galeri;
            $galery->keterangan = $request->keterangan;
            $galery->id_album = $request->id_album;
        }

        $galery->update();
        return redirect('/galeri')->with('pesan', 'Data galery photo berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeries  $galeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeries $galeries)
    {
        File::delete('assets/images/' . $galeries->foto);
        File::delete('assets/thumb/' . $galeries->foto);
        Galeries::find($galeries->id)->delete();
        return redirect('/galeri')->with('pesan', 'Data galeri berhasil dihapus');
    }
}
