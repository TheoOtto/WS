<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Professor;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View//Verifica se o usuario esta logado e retorna a view com os dados do banco
    {
        if(session('logado')){
            $disciplinas = Disciplina::all();
            return view('disciplinas.index')->with('disciplinas',$disciplinas);
        }
        return view('disciplinas.login');
    }

    public function mostralogin()// retorna pagina de login
    {
        return view('disciplinas.login');
    }

    public function login(Request $request)// faz login de adm
    {
        if($request->disciplina_email == 'admin@senai.br' && $request->disciplina_senha == 'adminsenai'){
            session(['logado' => true]);
            $disciplinas = Disciplina::all();
            return view('alunos.escolha')->with('disciplinas',$disciplinas);
        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);
    }

    public function logout()// sai da conta
    {
        session()->forget('logado');
        return view('disciplinas.login');
    }

    /**
     * Get the user that owns the disciplinaController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    // public function turma()
    // {
    //     return $this->belongsTo(Turma::class, 'disciplina_turma');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View//retorna pagina de criar se estiver logado
    {
        if(session('logado')){

            $professores = Professor::all();
            $turmas = Turma::all();
            return view('disciplinas.create', compact('professores' , 'turmas'));
        }
        return view('alunos.login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse// adiciona no banco com  validações
    {
        $request->validate([
            'disciplina_nome' => 'unique:disciplinas',
        ]);

        $disciplinas = $request->all();
        Disciplina::create($disciplinas);
        return redirect('disciplina')->with('success', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View// mostra o dados
    {
        if(session('logado')){

            $disciplinas = Disciplina::find($id);
            return view('disciplinas.show')->with('disciplinas', $disciplinas);
        }
        return view('alunos.login');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View// retorna a pagina para editar os dados
    {
        if(session('logado')){

            $disciplinas = Disciplina::find($id);
            $turmas = Turma::all();
            $professores = Professor::all();
            return view('disciplinas.edit' ,compact('turmas' , 'professores'))->with('disciplinas', $disciplinas);
        }
        return view('alunos.login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse// edita os dados ja existentes
    {

        $disciplinas = Disciplina::find($id);
        $input = $request->all();
        $disciplinas->update($input);
        return redirect('disciplina')->with('success','Editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse//deleta
    {
        Disciplina::destroy($id);
        return redirect('disciplina');
    }
}
