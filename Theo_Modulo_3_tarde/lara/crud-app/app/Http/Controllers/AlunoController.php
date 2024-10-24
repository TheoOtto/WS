<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Professor;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View //Verifica se o usuario esta logado e retorna a view com os dados do banco
    {
        if(session('logado')){
            $alunos = Aluno::all();
            return view('alunos.index')->with('alunos',$alunos);
        }
        return view('alunos.login');
    }

    public function mostralogin() // retorna pagina de login
    {
        return view('alunos.login');
    }

    public function login(Request $request)// faz login de adm
    {
        if($request->aluno_email == 'admin@senai.br' && $request->aluno_senha == 'adminsenai'){
            session(['logado' => true]);
            $alunos = Aluno::all();
            return view('alunos.escolha')->with('alunos',$alunos);
        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);

    }

    public function logout()// sai da conta
    {
        session()->forget('logado');
        return view('alunos.login');
    }



    public function mostraloginaluno()// retorna a pagina de login de aluno
    {
        return view('alunos.loginaluno');
    }

    public function loginaluno(Request $request)// faz validaçõa do login do aluno
    {
        $aluno = Aluno::where('aluno_email', $request->aluno_email)->first();

        if($aluno && Hash::check($request->aluno_senha , $aluno->aluno_senha)){
            session(['logadohome' => true, 'id', $aluno->aluno_id]);
            $alunos = Aluno::all();
            return view('alunos.home')->with('alunos',$alunos);

        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);

    }


    public function mostraloginprofessor()//retorna pagina login de professor
    {
        return view('alunos.loginprofessor');
    }

    public function loginprofessor(Request $request)// valida login do professor
    {
        $professor = Professor::where('professor_email', $request->professor_email)->first();

        if($professor && Hash::check($request->professor_senha , $professor->professor_senha)){
            session(['logadohome' => true, 'id', $professor->professor_id]);
            $professor = Professor::all();
            return view('alunos.home')->with('professores',$professor);

        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);

    }

    /**
     * Get the user that owns the AlunoController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    // public function turma()
    // {
    //     return $this->belongsTo(Turma::class, 'aluno_turma');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View//retorna pagina de criar aluno se estiver logado
    {
        if(session('logado')){
            $turmas = Turma::all();
            return view('alunos.create', compact('turmas'));
        }
        return view('alunos.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse// adiciona no banco com  validações
    {
        $request->validate([
            'aluno_email' => 'unique:alunos',
            'aluno_senha' => 'min:3|confirmed',
            'aluno_telefone' => 'max:11'
        ]);

        $alunos = $request->all();
        $alunos['aluno_senha'] = Hash::make($request->input('aluno_senha'));
        Aluno::create($alunos);
        return redirect('aluno')->with('success', 'Criado com sucesso');
    }

    public function home()// retorna home page se estivar logado
    {
        if(session('logado')){
            return view('alunos.home');
        }
        return view('alunos.login');
        if(session('logadohome')){
            return view('alunos.home');
        }
        return view('alunos.login');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View// mostra os dados do aluno
    {

        if(session('logado')){
            $alunos = Aluno::find($id);
            return view('alunos.show')->with('alunos', $alunos);
        }
        return view('alunos.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View// retorna a pagina para editar os dados
    {
        if(session('logado')){

            $alunos = Aluno::find($id);
            $turmas = Turma::all();
            return view('alunos.edit' ,compact('turmas'))->with('alunos', $alunos);
        }
        return view('alunos.login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse// edita os dados ja existentes do aluno
    {
        $request->validate([
            'aluno_senha' => 'min:3|confirmed'
        ]);

        $alunos = Aluno::find($id);
        $input = $request->all();
        $alunos->update($input);
        return redirect('aluno')->with('success','Editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse// deleta OS DADOS
    {
        Aluno::destroy($id);
        return redirect('aluno');
    }
}
