<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" 
        class="block mt-1 w-full" 
        type="text" wire:model='titulo'
        :value="old('titulo')" 
        placeholder="Titulo De La Vacante"/>
        @error('titulo')
           <livewire:mostrar-alerta :message="$message"/>

        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            wire:model='salario'

            id="salario"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
            focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="">--Seleccione--</option>
            @foreach ($salarios  as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>   
            @endforeach

        </select>
        @error('salario')
           <livewire:mostrar-alerta :message="$message"/>

        @enderror
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select 
            wire:model='categoria' 
            id="categoria"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
            focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="">--Seleccione--</option>
            @foreach ($categorias  as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>   
            @endforeach

        </select>
        @error('categoria')
           <livewire:mostrar-alerta :message="$message"/>

        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" 
        class="block mt-1 w-full" 
        type="text" wire:model='empresa' 
        :value="old('empresa')" 
        placeholder="Nombre De La Empresa"/>
        
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo Día Para Postularse')" />
        <x-text-input id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" wire:model='ultimo_dia'
        :value="old('ultimo_dia')" 
        />
        @error('ultimo_dia')
           <livewire:mostrar-alerta :message="$message"/>

        @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Del Trabajo')" />
        <textarea 
        id="descripcion" 
        wire:model='descripcion' 
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring
        focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
        >
        </textarea>
        @error('descripcion')
        <livewire:mostrar-alerta :message="$message"/>

     @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model='new_image'
        accept="image/*"/>
        @error('new_image')
           <livewire:mostrar-alerta :message="$message"/>

        @enderror
    </div>
    <div class="my-5 w-80">
        <x-input-label for="imagen" :value="__('Imagen Actual')" />
        <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen Vacante '.$titulo }}">
    </div>
   <div class="my-5 w-80 ">
        @if($new_image)
        <x-input-label for="new_image" :value="__('Imagen Nueva')" />
        <img src="{{$new_image->temporaryUrl()}}">
        @endif
   </div>
    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>
    