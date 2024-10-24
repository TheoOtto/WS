<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Area;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View//Verifica se o usuario esta logado e retorna a view com os dados do banco
    {
        if(session('logado')){
            $cursos = Curso::all();
            return view('cursos.index')->with('cursos',$cursos);
        }
        return view('alunos.login');
    }

    public function mostralogin()//retorna pagina de login
    {
        return view('cursos.login');
    }

    public function login(Request $request)// faz login de adm
    {
        if($request->curso_email == 'admin@senai.br' && $request->curso_senha == 'adminsenai'){
            session(['logado' => true]);
            $cursos = Curso::all();
            return view('alunos.escolha')->with('cursos',$cursos);
        }
        return back()->withErrors([
            'email' => 'Credenciais Inválidas'
        ]);
    }

    public function logout()// sai da conta
    {
        session()->forget('logado');
        return view('cursos.login');
    }

    /**
     * Get the user that owns the cursoController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View//retorna pagina de criar se estiver logado
    {

        if(session('logado')){
            $areas = Area::all();
            return view('cursos.create', compact('areas'));

        }
        return view('alunos.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse// adiciona no banco com  validações
    {
        $request->validate([
            'curso_email' => 'unique:cursos',
            'curso_senha' => 'min:3|confirmed'
        ]);

        $cursos = $request->all();
        $cursos['curso_senha'] = Hash::make($request->input('curso_senha'));
        Curso::create($cursos);
        return redirect('curso')->with('success', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View// mostra os dados do curso
    {
        if(session('logado')){

            $cursos = Curso::find($id);
            return view('cursos.show')->with('cursos', $cursos);
        }
        return view('alunos.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View// retorna a pagina para editar os dados
    {
        if(session('logado')){

            $cursos = Curso::find($id);
            $areas = Area::all();
            return view('cursos.edit' ,compact('areas'))->with('cursos', $cursos);
        }
        return view('alunos.login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse// edita os dados ja existentes
    {
        $request->validate([
            'curso_senha' => 'min:3|confirmed'
        ]);

        $cursos = Curso::find($id);
        $input = $request->all();
        $cursos->update($input);
        return redirect('curso')->with('success','Editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse// deleta
    {
        Curso::destroy($id);
        return redirect('curso');
    }
}
