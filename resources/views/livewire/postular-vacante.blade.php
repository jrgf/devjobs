<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center ">
    <h3 class="text-center text-2xl font-bold my-4 ">Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-200 text-green-600 font-bold p-2 my-5 text-sm ">
            {{session('mensaje')}}
        </div>
    @else 
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <p class="font-bold">Opps!</p>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        
    @endif
        <form class="w-96 mt-5 mb-4" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv" value="{{__('Curriculum o Hoja de Vida')}}" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>
            @error('cv')
            <livewire:mostrar-alerta :message="$message" />
            @enderror
            <x-primary-button class="my-5">
                {{__('Postularme')}}
            </x-primary-button>
        </form>
        
    @endif
</div>
    