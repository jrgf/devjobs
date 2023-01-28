<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">


        @if(count($vacantes)>0)
        @foreach ($vacantes as $vacante)

        <div class="bg-white border-b p-6 border-gray-200 gap-3 mt-5 md:flex md:justify-between md:items-center ">
            <div class="leading-10">
                <a href="{{route('vacantes.show',$vacante->id)}}" class="font-bold text-xl">
                    {{$vacante->titulo}}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{$vacante->empresa}}
                </p>
                <p>Ultimo Día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>
            <div class="flex gap-3 items-stretch flex-col md:flex-row mt-5 md:mt-0">
                <a href="{{route('candidatos.index',$vacante)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    {{$vacante->candidatos->count()}} Candidatos
                </a>
                <a href="{{route('vacantes.edit',$vacante->id)}}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                </a>
                <button wire:click="$emit('mostrarAlerta',{{$vacante->id}})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </button>
            </div>
        </div>

        @endforeach
        @else
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endif
    </div>
    <div class="mt-10">
        {{$vacantes->links()}}
    </div>
</div>
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta',vacanteId=>{
        Swal.fire({
        title: '¿Eliminar Vacante?',
        text: "Una vacante eliminada no se puede recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('eliminarVacante',vacanteId);
            Swal.fire(
            'Borrado',
            'Su vacante ha sido borrada',
            'success'
        )
        }
        });
    });
    
</script>
@endpush