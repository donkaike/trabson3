<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lancamento;
use App\Models\Sistema;

class ServicosController extends Controller
{
    public function getServices(){

        $slogan = "Sistemas personalizados sob medida. blabla pipipi popopo";

        $servicos = Lancamento::all();

        return view('welcome', compact('slogan', 'servicos'));
    }

    public function addForm(){
        $servicos = Sistema::all();
        return view('form', compact('servicos'));
    }

    public function adicionar(Request $request){

        $lancamento = new Lancamento();
        $lancamento->horas = $request->horas;
        $lancamento->sistema_id = $request->sistema_id;

        $lancamento->save();

        return redirect()->route('servicos.listar');
    }
}
