<?php

namespace App\Livewire\Admin;

use App\Models\Servicio;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
class Servicios extends Component
{
    #[Validate('required')]
    public $nombre;
    public $valorBoton;
    public $idServicio;
    public function mount(){
        $this->valorBoton="Registrar";
    }
    public function guardarServicio(){
        $this->validate();

        if(!$this->idServicio){
            Servicio::create($this->all());
            session()->flash('status', 'Servicio Creado Correctamente.');
            
        }else{
            Servicio::where('id',$this->idServicio)->update(['nombre'=>$this->nombre]);
            session()->flash('status', 'Servicio Actualizado Correctamente.');
            $this->valorBoton="Registrar";
        }

        $this->resetearCampos();
       
    }
    #[On('eliminarServicio')]
    public function eliminarServicio($id){
        Servicio::where('id',$id)->update(['estado'=>'Inactivo']);
        session()->flash('status', 'Servicio Eliminado Correctamente.');
    }
    public function editarServicio($id){
        $this->idServicio=$id;
        $servicio=Servicio::select('nombre')->where('id',$id)->first();
        $this->nombre=$servicio['nombre'];
        $this->valorBoton="Editar";

    }
    private function resetearCampos(){
        $this->reset('nombre');
    }
    public function render(): View
    {
        $dataServicio=Servicio::where('estado','Activo')->get();
        return view('livewire.admin.servicios',compact('dataServicio'))->layout('maestra');
    }
}
