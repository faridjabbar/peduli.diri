<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perjalanan;
use Illuminate\Support\Facades\Auth;
class perjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perjalanan = perjalanan::where('user_id', Auth::user()->id)->paginate(3);
        return view ('perjalanan.index', compact('perjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('perjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute Wajib Diisi cuy!!!',
            'min' => ':attribute Harus Diisi Minimal :min Karakter Ya !!!',
            'max' => ':attribute Harus Diisi Maksimal :max Karakter Ya !!!',
            'numeric' => ':attribute Harus Diisi Angka'
        ];
        $this->validate($request,[
            'tanggal' => ['required', 'string'],
            'jam' => ['required', 'string'],
            'lokasi' => ['required', 'string',],
            'suhu_tubuh' => ['required', 'string', 'numeric', 'min:18'],
        ],$messages);

        perjalanan::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'suhu_tubuh' => $request->suhu_tubuh,
            'user_id' =>Auth::user()->id
        ]);
        return redirect('/perjalanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        perjalanan::where('id', $id)->delete();
        return redirect('/perjalanan');
    }
}
