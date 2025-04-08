<div class="container py-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row g-4">
        <!-- Formulario de Registro -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 fw-bold text-primary">Registrar Nuevo Servicio</h4>
                    <form wire:submit="guardarServicio">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="nombre"
                                placeholder="Nombre del Servicio">
                            <label for="servicio">Nombre del Servicio</label>
                            <span>
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>

                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i> {{$valorBoton}}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabla de Servicios con Búsqueda -->
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h4 class="fw-bold text-secondary m-0">Servicios Registrados</h4>
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar servicio...">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dataServicio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td class="text-end">
                                            <button wire:click="editarServicio({{$item->id}})" class="btn btn-sm btn-outline-primary me-1 rounded-pill">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button onclick="confirmarEliminacion({{$item->id}})" class="btn btn-sm btn-outline-danger rounded-pill">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Eliminar servicio?',
            html: "<strong>Esta acción no se puede deshacer.</strong>",
            iconHtml: '<i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>',
            customClass: {
                popup: 'rounded-4 shadow-lg border-0',
                title: 'fw-bold fs-3 text-dark',
                htmlContainer: 'fs-6 text-secondary',
                confirmButton: 'btn btn-danger px-4 rounded-pill',
                cancelButton: 'btn btn-outline-secondary px-4 rounded-pill ms-2'
            },
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            background: '#f9f9f9',
            backdrop: `
                rgba(0,0,0,0.4)
                left top
                no-repeat
            `,
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('eliminarServicio', { id });
            }
        });
    }

    $wire.on('swal:exito', mensaje => {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: mensaje,
            showConfirmButton: false,
            timer: 1800,
            customClass: {
                popup: 'rounded-3 shadow',
                title: 'text-success fw-bold'
            },
            background: '#e6f9f1'
        });
    });
</script>