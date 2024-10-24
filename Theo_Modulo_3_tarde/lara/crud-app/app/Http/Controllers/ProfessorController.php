<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Professor;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View//Verifica se o usuario esta logado e retorna a view com os dados do banco
    {

        if(session('logado')){
            $professores = Professor::all();
            return view('professores.index')->with('professores',$professores);

        }
        return view('alunos.login');
    }

    public function mostralogin() // retorna pagina de login
    {
        return view('professores.login');
    }

    public function login(Request $request)// faz login de adm
    {
        if($request->professor_email == 'admin@senai.br' && $request->professor_senha == 'adminsenai'){
            session(['logado' => true]);
            $professores = Professor::all();
            return view('alunos.escolha')->with('professores',$professores);
        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);
    }

    public function logout()// sai da conta
    {
        session()->forget('logado');
        return view('professores.login');
    }

    /**
     * Get the user that owns the professorController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View//retorna pagina de criar se logado
    {
        if(session('logado')){

            return view('professores.create');
        }
        return view('alunos.login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse// adiciona no banco com  validações
    {
        $request->validate([
            'professor_email' => 'unique:professores',
            'professor_senha' => 'min:3|confirmed'
        ]);

        $professores = $request->all();
        $professores['professor_senha'] = Hash::make($request->input('professor_senha'));
        Professor::create($professores);
        return redirect('professor')->with('success', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View// mostra os dados
    {
        if(session('logado')){

            $professores = Professor::find($id);
            return view('professores.show')->with('professores', $professores);
        }
        return view('alunos.login');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View// retorna a pagina para editar os dados
    {
        if(session('logado')){

            $professores = Professor::find($id);
            $turmas = Turma::all();
            return view('professores.edit' ,compact('turmas'))->with('professores', $professores);
        }
        return view('alunos.login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse// edita os dados ja existentes
    {
        $request->validate([
            'professor_senha' => 'min:3|confirmed'
        ]);

        $professores = Professor::find($id);
        $input = $request->all();
        $professores->update($input);
        return redirect('professor')->with('success','Editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse//deleta os dados
    {
        Professor::destroy($id);
        return redirect('professor');
    }
}
