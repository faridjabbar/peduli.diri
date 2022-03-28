<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use PDF;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = user::find($id);
        return view('user.edit', compact('user'));
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
        $messages = [
            'required' => ':attribute Wajib Diisi cuy!!!',
            'min' => ':attribute Harus Diisi Minimal :min Karakter Ya !!!',
            'max' => ':attribute Harus Diisi Maksimal :max Karakter Ya !!!',
            'numeric' => ':attribute Harus Diisi Angka'
        ];
        $this->validate($request,[
            'nik' => ['required', 'string', 'min:16' ,'max:17'],
            'name' => ['required', 'string', 'min:6', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50',],
            'telp' => ['required', 'string', 'numeric', 'min:18'],
            'alamat' =>['required'],
        ],$messages);
        
         user::where('id',$id)
             ->update([
        //         'nik' => $request->nik,
        //         'telp' => $request->telp,
        //         'username' => $request->username,
        //         'email' => $request->email,
                 'alamat' => $request->alamat,
        //         'foto' => $request->foto,
             ]);
        $user = user::find($id);
        $user->update($request->all());
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('image/',$request->file('foto')->getClientOriginalName());
                $user->foto = $request->file('foto')->getClientOriginalName();
                $user->save();
            }
        return redirect('/home');
    }

    public function cetak_pdf()
    {
    	$user = user::all();
 
    	$pdf = PDF::loadview('user_pdf',['user'=>$user]);
    	return $pdf->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}