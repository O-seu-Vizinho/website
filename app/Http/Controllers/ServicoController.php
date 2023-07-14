<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    //
        public function viagemaceite($id) {

            $order = Pedidos::find($id);
            return view('acompanhamento')->with([ 'order'=> $order ]);
        }
        public function servicoaceite(Request $request){
        // Obtenha os dados do formulário
        $nomeMotorista = $request->input('nome_motorista');
        $marcaCarro = $request->input('marca_carro');
        $matricula = $request->input('matricula');
        $tempoChegada = $request->input('tempo_chegada');
        $orderId = $request->input('orderId');
        $order= Pedidos::find($orderId);
        // Crie uma nova instância do modelo Servico
        $servico = new Servico();
        $servico->nome_condutor = $nomeMotorista;
        $servico->marca_carro = $marcaCarro;
        $servico->matricula = $matricula;
        $servico->tempo_chegada = $tempoChegada;
        $servico->pedido_id = $orderId;
        $servico->viagem_aceite = 1;

        // Salve o novo serviço no banco de dados
        $servico->save();

        // Redirecione para outra página ou faça qualquer outra ação necessária
        // ...

        // Retorne a visão com os campos desabilitados

       return view('acompanhamento')->with(['order'=>$order,'servico' => $servico]);
    }

    public function emviagem(Request $request){
        // Obtenha os dados do formulário
        $servicoId = $request->input('servico_id');

        $servico= Servico::find($servicoId);

        $servico->viagem_anda=1;
        $servico->save();
        $orderId = $request->input('orderId');
        $order= Pedidos::find($orderId);

        // Redirecione para outra página ou faça qualquer outra ação necessária
        // ...

        // Retorne a visão com os campos desabilitados

       return view('acompanhamento')->with(['order'=>$order,'servico' => $servico]);
    }
    public function concluida(Request $request){
        // Obtenha os dados do formulário
        $servicoId = $request->input('servico_id');
        $servico= Servico::find($servicoId);
        $servico->viagem_concluida=1;
        $servico->save();
        $orderId = $request->input('orderId');
        $order= Pedidos::find($orderId);

        // Redirecione para outra página ou faça qualquer outra ação necessária
        // ...

        // Retorne a visão com os campos desabilitados

       return view('acompanhamento')->with(['order'=>$order,'servico' => $servico]);
    }

}
