<?php
namespace App\Http\Controllers;
use App\Models\PieceJointe;
use Illuminate\Http\Request;
use App\Http\Request\PieceJointeRequest;
use Auth;

class PieceJointeController extends Controller
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
        $pieceJointes = PieceJointe::paginate(5);

        return view('pieceJointes.index', compact('pieceJointes'));
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $pieceJointes = PieceJointe::where('name', 'LIKE', '%'.$search_text.'%')->get();

        return view('pieceJointes.search', compact('pieceJointes'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pieceJointes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $pieceJointe = new PieceJointe();
        $pieceJointe->libelle_pj = $request->post('libelle_pj');
        $pieceJointe->lien = $request->post('lien');
        $pieceJointe->save();

        session()->flash('Add', 'La piece jointe a été ajouté avec succés ');
        return back();
        return redirect(route('pieceJointes.index'));
    }
    
    public function upload(Request $request)
    {
        $pieceJointe = $request->file('lien');

        if ($pieceJointe) {
            $path = $pieceJointe->store('assets/uploads/piecesJointes/'); // Store in storage/app/assets/files
            // Save the path to the database or perform other actions
            return "File uploaded successfully!";
        } else {
            return "No file selected.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PieceJointe $pieceJointe)
    {
        return view('pieceJointes.show', compact('pieceJointe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PieceJointe $pieceJointe)
    {
        return view('pieceJointes.edit', compact('pieceJointe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PieceJointe $pieceJointe, Request $request)
    {
        $pieceJointe->libelle_pj = $request->post('libelle_pj');
        $pieceJointe->lien = $request->post('lien');
        $pieceJointe->save();

        session()->flash('edit', ' La piece jointe a été modifié avec succes ');
        return back();
        return redirect(route('pieceJointes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PieceJointe $pieceJointe)
    {
        $pieceJointe->delete();

        return back()
            ->with('info', $pieceJointe->name . 'a été supprimé avec succée');
    }
}


