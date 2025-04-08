<?php

namespace App\Livewire\Admin;

use App\Models\Persona;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Trabajadores extends Component
{
    public $modal=false;
    #[Validate('required')]
    public $nombre;
    #[Validate('required')]
    public $apePaterno;
    #[Validate('required')]
    public $apeMaterno;
    #[Validate('required')]
    public $dni;
    #[Validate('required')]
    public $celular;
    #[Validate('required')]
    public $cargo;

    public $idEmpleado;
    public function abrirModal(){
        
        $this->modal=true;
    }
    public function cerrarModal(){
        $this->modal=false;
    }
    public function guardarObreros(){
        //dd($this->idEmpleado);
       if(!$this->idEmpleado){
        $data=$this->all();
        $data['tipo']='obrero';
        $this->validate();
        Persona::create($data);
        session()->flash('status', 'Trabajador Creado Correctamente.');
       }else{
        Persona::where('id',$this->idEmpleado)->update([
            'nombre'=>$this->nombre,
            'apePaterno'=>$this->apePaterno,
            'apeMaterno'=>$this->apeMaterno,
            'dni'=>$this->dni,
            'celular'=>$this->celular,
            'cargo'=>$this->cargo
        ]);
        session()->flash('status','Trabajador Editado Correctamente');
       }
       
        $this->cerrarModal();
    }
    #[On('eliminarTrabajadores')]
    public function eliminarTrabajadores($id){
      
        Persona::where('id',$id)->update(['estado'=>'Inactivo']);
        
        session()->flash('status','Trabajador Eliminado Correctamente');
    }
    public function editarTrabajadores($id){
        $this->idEmpleado=$id;
        //dd( $this->idEmpleado);
        $data=Persona::where('id',$id)->first();
        $this->nombre=$data['nombre'];
        $this->apePaterno=$data['apePaterno'];
        $this->apeMaterno=$data['apeMaterno'];
        $this->dni=$data['dni'];
        $this->celular=$data['celular'];
        $this->cargo=$data['cargo'];
        $this->abrirModal();
        //dd($data);
    }
    public function render():View
    {   $data=Persona::where('estado','Activo')->get();
        return view('livewire.admin.trabajadores', compact('data'))->layout('maestra');
    }
}
