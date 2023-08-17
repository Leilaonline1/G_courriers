<?php
namespace App\Http\Controllers;
use App\Models\TypeCourrier;
use App\Models\CourrierEnv;
use App\Models\CourrierRecu;
use Illuminate\Http\Request;
use App\Http\Request\TypeCourrierRequest;
use Auth;

class TypeCourrierController extends Controller
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
        $typeCourriers = TypeCourrier::with('courrierEnv')->get();
        $typeCourriers = TypeCourrier::with('courrierRecu')->get();
        $typeCourriers = TypeCourrier::paginate(5);
        return view('typeCourriers.index', compact('typeCourriers'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $typeCourriers = TypeCourrier::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('typeCourriers.search', compact('typeCourriers'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courrierEnvs = CourrierEnv::all();
        $courrierRecus = CourrierRecu::all();
        return view('typeCourriers.create',compact('courrierEnvs','courrierRecus'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $typeCourrier = new TypeCourrier();
        $typeCourrier->libelle_t = $request->post('libelle_t');
        $typeCourrier->id_courrE = $request->post('id_courrE');
        $typeCourrier->id_courrR = $request->post('id_courrR');
        $typeCourrier->save();

        session()->flash('Add', 'Le type a été ajouté avec succés ');
        return back();
        return redirect(route('typeCourriers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeCourrier $typeCourrier)
    {
        return view('typeCourriers.show', compact('typeCourrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeCourrier $typeCourrier)
    {

        $courrierEnvs = CourrierEnv::all();
        $courrierRecus = CourrierRecu::all();
        return view('typeCourriers.edit',compact('typeCourrier', 'courrierEnvs','courrierRecus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeCourrier $typeCourrier, Request $request)
    {
        $typeCourrier->libelle_t = $request->post('libelle_t');
        $typeCourrier->save();

        session()->flash('edit', ' Le type a été modifié avec succes ');
        return back();
        return redirect(route('typeCourriers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeCourrier $typeCourrier)
    {
        $typeCourrier->delete();

        return back()
            ->with('info', $typeCourrier->name . 'a été supprimé avec succée');
    }
}


