<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $new_image;
    use WithFileUploads;
    protected $rules = [
        'titulo'=>'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        'new_image'=>'nullable|image|max:1024',
        

    ];
    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo=$vacante->titulo;
        $this->salario =$vacante->salario_id;
        $this->categoria=$vacante->categoria_id;
        $this->empresa=$vacante->empresa;
        $this->ultimo_dia=Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion=$vacante->descripcion ;
        $this->imagen=$vacante->imagen;
    }
    public function editarVacante(){
        $datos=$this->validate();
        //Revisar si hay una nueva imagen
        if($this->new_image){
            $imagen=$this->new_image->store('public/vacantes');
            $datos['imagen']=str_replace('public/vacantes/','',$imagen);
        }

        //Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //Asignar los valores
        $vacante->titulo=$datos['titulo'];
        $vacante->salario_id=$datos['salario'];
        $vacante->categoria_id=$datos['categoria'];
        $vacante->empresa=$datos['empresa'];
        $vacante->ultimo_dia=$datos['ultimo_dia'];
        $vacante->descripcion=$datos['descripcion'];
        $vacante->imagen=$datos['imagen'] ?? $vacante->imagen;
        


        //Guardar la vacante y redireccionar
        $vacante->save();
        session()->flash('mensaje','La vacante se ha actualizado correctamente');
        return redirect()->route('vacantes.index');
    }
   
    public function render()
    {
        $categorias=Categoria::all();
        $salarios=Salario::all();
        return view('livewire.editar-vacante',['categorias'=>$categorias,'salarios'=>$salarios]);
    }
}
