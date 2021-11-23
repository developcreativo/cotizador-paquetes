<?php

namespace App\Http\Livewire;

use App\Models\Documento;
use App\Models\Paquete;
use App\Models\Tarifario;
use App\Models\Zona;
use Livewire\Component;

class HomeComponent extends Component
{
    public $zonas;
    public $tarifarios;
    public $zona_origen;
    public $zona_destino;
    public $tarifario_id;
    public $ancho = '';
    public $largo = '';
    public $alto = '';
    public $peso = '';
    public $cantidad = '';
    public $tipo = 'sobre';

    public $gramos = 1000;
    public $peso_volumen = '';
    public $precio_estimado =  0;
    public $valor = '';
    public $term = false;
    public function mount()
    {
        $this->zonas = Zona::query()->orderBy('nombre', 'asc')->get();
        $this->tarifarios = Tarifario::query()->get();
        $this->tarifario_id = Tarifario::query()->first()->id;

    }
    public function render()
    {
        return view('livewire.home-component');
    }

    public function calcular()
    {


        if ($this->tipo == 'paquete') {
            $this->validate([
                'ancho' => 'required',
                'largo' => 'required',
                'alto' => 'required',
                'peso' => 'required',
                'cantidad' => 'required',
                'zona_origen' => 'required',
                'zona_destino' => 'required',
                'term' => 'accepted'
            ]);
            $this->peso_volumen = ($this->ancho*$this->largo*$this->alto)/6000;
            $peso_volumen =  (ceil( $this->peso_volumen * 2) / 2);
            $peso_neto = (ceil( $this->peso /1000 * 2) / 2);
            $peso = ($this->peso_volumen >  ($this->peso /1000)) ? $this->peso_volumen : $this->peso /1000;
        }

        if ($this->tipo == 'sobre') {
            $this->onchangeTipo();
            $this->validate([
                'peso' => 'required',
                'cantidad' => 'required',
                'zona_origen' => 'required',
                'zona_destino' => 'required',
                'term' => 'accepted'
            ]);
            $peso = $this->peso /1000;
            $peso_neto = (ceil( $this->peso /1000 * 2) / 2);
            $peso_volumen =  '';
        }



//dd($this->peso_volumen, $this->peso_volumen);
        if ($this->tipo == 'sobre' && (ceil($peso * 2) / 2) > 2) {
            session()->flash('message', 'Los sobres tienen un maximo de 2KG');
            $this->precio_estimado = 0;
            return;
        }

        if ($this->tipo == 'paquete' &&  (int) round($this->peso /1000, 0) > 50) {
            session()->flash('message', 'Los paquetes tienen un maximo de 50KG');
            return;
        }

        if($this->tipo == 'paquete') {
            if ($peso_neto >= $peso_volumen) {
                $peso_menor = $peso_neto;
            }

            if ($peso_volumen > $peso_neto) {
                $peso_menor = $peso_volumen;
            } else {
                if ($peso_neto <= 1 && $peso_volumen <= 1) {
                    $peso = 1;
                    $peso_menor = str_replace('.', ',', $peso);
                }
            }


        }

        if($this->tipo == 'sobre') {
            if ($peso_neto > 1) {
                $peso_menor = $peso_neto;
            }

            if ($peso_neto <= 1) {
                $peso = 1.0;
                $peso_menor = str_replace('.', ',', $peso);
            }
        }



//        if (intval($this->peso_volumen) >  intval($this->peso / 1000)) {
//            $peso = (ceil($peso * 2) / 2);
//            $peso_menor = ($peso > 1) ? $peso :str_replace('.', ',', $peso);
//        }
//        if (intval($this->peso / 1000) == 0 && $this->tipo == 'sobre') {
//            $peso = 1;
//            $peso_menor = ($peso > 1) ? $peso :str_replace('.', ',', $peso);
//        }
//
//        if (intval($this->peso / 1000) == 0 && $this->tipo == 'paquete' && intval($this->peso_volumen) <= 1) {
//
//            $peso = 1;
//            $peso_menor = ($peso > 1) ? $peso :str_replace('.', ',', $peso);
//        }
//
//        if (intval($this->peso / 1000) >= 1 && intval($this->peso_volumen) <= 1) {
//            $peso = 1;
//            $peso_menor = ($peso > 1) ? $peso :str_replace('.', ',', $peso);
//        }


//        if ($this->peso_volumen == ''){
//            if ($this->peso < '1000') {
//                $peso = 1;
//            }
//        }
//
//        if ($this->peso_volumen != '' && (ceil($this->peso_volumen * 2) / 2) < (ceil($this->peso /1000 * 2) / 2)){
//            if ($this->peso < '1000') {
//                $peso = 1;
//            }
//        }
//
//        if ((ceil($this->peso /1000 * 2) / 2) < 1000 || (ceil($this->peso_volumen * 2) / 2) <= (ceil($this->peso /1000 * 2) / 2)){
//            if ($this->peso < '1000') {
//                $peso = 1;
//            }
//        }
//
//
//dd

        if ($this->tipo == 'paquete') {
            $query = Paquete::query()->where('tarifario_id', $this->tarifario_id);
        }
        if ($this->tipo == 'sobre') {
            $query = Documento::query()->where('tarifario_id', $this->tarifario_id);
        }


        $query = $query->where('peso', '=', $peso_menor);
       // dd($query->first(), $peso_menor);
        $zona = Zona::query()->with(['tipoZona'])->find($this->zona_destino);
        if ($zona['tipoZona']['tipo'] == 'zona_uno') {
            $valor  = $query->select('valor_zona_uno')->first();
            $this->valor = $valor['valor_zona_uno'];
        }
        if ($zona['tipoZona']['tipo'] == 'zona_dos') {
            $valor  = $query->select('valor_zona_dos')->first();
            $this->valor = $valor['valor_zona_dos'];
        }


        if ($zona['tipoZona']['tipo'] == 'zona_tres') {
            $valor  = $query->select('valor_zona_tres')->first();
            $this->valor = $valor['valor_zona_tres'];
        }

        if ($zona['tipoZona']['tipo'] == 'zona_cuatro') {
            $valor  = $query->select('valor_zona_cuatro')->first();
            $this->valor = $valor['valor_zona_cuatro'];
        }

        if ($zona['tipoZona']['tipo'] == 'zona_cinco') {
            $valor  = $query->select('valor_zona_cinco')->first();
            $this->valor = $valor['valor_zona_cuatro'];
        }
        $this->precio_estimado = $this->valor * $this->cantidad;
    }

    public function onchangeTipo()
    {
        $this->ancho = '';
        $this->largo = '';
        $this->alto = '';
        $this->peso_volumen = '';
    }
}
