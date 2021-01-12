<?php

namespace App\Http\Controllers;

use App\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AlbumsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 0;
        $albums = Albums::all();

        return view('pages.visitor.album.index', compact('albums', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.visitor.album.create');
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
            "nama_album" => 'required',
            "gambar" => 'required|image|mimes:jpeg,jpg,png'
        ]);

        // var_dump($request->nama_album);


        $album = new Albums;
        $album->nama_album = $request->nama_album;
        $album->album_seo = Str::slug($request->nama_album);

        $gambar = $request->gambar;
        $namafile = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move('assets/images', $namafile);

        $album->gambar = $namafile;

        $album->save();
        return redirect('/album')->with('pesan', 'Data album berhasil disimpan');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function show(Albums $albums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $album)
    {
        // $album = Albums::find($id)[0];
        return view('pages.visitor.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Albums $albums)
    {
        // var_dump($request->nama_album, 'request'); data baru
        // var_dump($albums->nama_album, 'albums'); data lama
        // var_dump($albums);
        $this->validate($request, [
            "nama_album" => 'required',
        ]);

        $album = Albums::find($albums->id);

        if ($request->has('gambar')) {
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);

            $gambar = $request->gambar;
            $namafile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('assets/images', $namafile);

            $album->gambar = $namafile;

            // deleted file before
            File::delete('assets/images/' . $albums->gambar);
        } else {
            $album->nama_album = $request->nama_album;
            $album->album_seo = Str::slug($request->nama_album);
        }

        $album->update();
        return redirect('/album')->with('pesan', 'Data album berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Albums $albums)
    {
        File::delete('assets/images/' . $albums->gambar);
        Albums::find($albums->id)->delete();
        return redirect('/album')->with('pesan', 'Data album berhasil dihapus');
    }
}
