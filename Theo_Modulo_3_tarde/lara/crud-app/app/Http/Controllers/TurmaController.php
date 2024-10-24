<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View//Verifica se o usuario esta logado e retorna a view com os dados do banco
    {
        if(session('logado')){
            $turmas = Turma::all();
            return view('turmas.index')->with('turmas',$turmas);

        }
        return view('alunos.login');
    }

    public function mostralogin()// retorna pagina de login
    {
        return view('turmas.login');
    }

    public function login(Request $request)// faz login de adm
    {
        if($request->turma_email == 'admin@senai.br' && $request->turma_senha == 'adminsenai'){
            session(['logado' => true]);
            $turmas = Turma::all();
            return view('alunos.escolha')->with('turmas',$turmas);
        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);
    }

    public function logout()// sai da conta
    {
        session()->forget('logado');
        return view('turmas.login');
    }

    /**
     * Get the user that owns the turmaController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View//retorna pagina de criar aluno se estiver logado
    {
        if(session('logado')){
            $cursos = Curso::all();
            return view('turmas.create', compact('cursos'));
        }
        return view('alunos.login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse// adiciona no banco com  validações
    {
        $request->validate([
            'turma_nome' => 'unique:turmas',
        ]);

        $turmas = $request->all();
        $turmas['turma_senha'] = Hash::make($request->input('turma_senha'));
        Turma::create($turmas);
        return redirect('turma')->with('success', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View// mostra os dados
    {
        if(session('logado')){
            $turmas = Turma::find($id);
            return view('turmas.show')->with('turmas', $turmas);
        }
        return view('alunos.login');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View// retorna a pagina para editar os dados
    {
        if(session('logado')){
            $turmas = Turma::find($id);
            $cursos = Curso::all();
            return view('turmas.edit' ,compact('cursos'))->with('turmas', $turmas);
        }
        return view('alunos.login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse// edita os dados ja existentes
    {
        $request->validate([
            'turma_senha' => 'min:3|confirmed'
        ]);

        $turmas = Turma::find($id);
        $input = $request->all();
        $turmas->update($input);
        return redirect('turma')->with('success','Editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse// DELETA OS DADOS
    {
        Turma::destroy($id);
        return redirect('turma');
    }
}
