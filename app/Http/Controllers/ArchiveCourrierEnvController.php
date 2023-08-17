<?php
namespace App\Http\Controllers;
use App\Models\ArchiveCourrierEnv;
use App\Models\CourrierEnv;
use Illuminate\Http\Request;
use App\Http\Request\ArchiveCourrierEnvRequest;
use Auth;

class ArchiveCourrierEnvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $archiveCourrierEnvs = ArchiveCourrierEnv::with('courrierEnv')->get();
        $archiveCourrierEnvs = ArchiveCourrierEnv::paginate(5);
        return view('archiveCourrierEnvs.index', compact('archiveCourrierEnvs'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $archiveCourrierEnvs = ArchiveCourrierEnv::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('archiveCourrierEnvs.search', compact('archiveCourrierEnvs'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courrierEnvs = CourrierEnv::all();
        return view('archiveCourrierEnvs.create',compact('courrierEnvs'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $archiveCourrierEnv = new ArchiveCourrierEnv();

        $archiveCourrierEnv->date_archivage = $request->post('date_archivage');
        $archiveCourrierEnv->id_courrE = $request->post('id_courrE');
        $archiveCourrierEnv->save();

        session()->flash('Add', 'La courrier a été ajouté avec succés ');
        return back();
        return redirect(route('archiveCourrierEnvs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ArchiveCourrierEnv $archiveCourrierEnv)
    {
        return view('archiveCourrierEnvs.show', compact('archiveCourrierEnv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ArchiveCourrierEnv $archiveCourrierEnv)
    {

        $courrierEnvs = CourrierEnv::all();
        return view('archiveCourrierEnvs.edit',compact('archiveCourrierEnv', 'courrierEnvs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchiveCourrierEnv $archiveCourrierEnv, Request $request)
    {
        $archiveCourrierEnv->date_archivage = $request->post('date_archivage');
        $archiveCourrierEnv->save();

        session()->flash('edit', ' La courrier a été modifié avec succes ');
        return back();
        return redirect(route('archiveCourrierEnvs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArchiveCourrierEnv $archiveCourrierEnv)
    {
        $archiveCourrierEnv->delete();

        return back()
            ->with('info', $archiveCourrierEnv->name . 'a été supprimé avec succée');
    }
}


