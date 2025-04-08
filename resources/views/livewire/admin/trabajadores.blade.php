<div class="container-fluid py-5">
  @if (session('status'))
      <div class="alert alert-success shadow-sm">
          {{ session('status') }}
      </div>
  @endif

  <div class="card shadow-sm p-4 rounded-4">
      <!-- Header y botón -->
      <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="fw-bold text-primary mb-0">Gestión de Obreros</h4>
          <button class="btn btn-outline-primary px-4 py-2 shadow-sm rounded-pill fw-semibold" wire:click="abrirModal">
            <i class="bi bi-plus-circle me-2"></i> Nuevo Obrero
        </button>
      </div>

      <!-- Buscador -->
      <div class="mb-3 d-flex justify-content-end">
        <input type="text" class="form-control form-control-sm shadow-sm" placeholder="Buscar obrero..." style="height:40px;width: 320px; max-width: 100%; border-radius: 0.75rem;">
    </div>

      <!-- Tabla -->
      <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle shadow-sm rounded-3">
              <thead class="table-light">
                  <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>DNI</th>
                      <th>Celular</th>
                      <th>Cargo</th>
                      <th class="text-center">Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Ejemplo de fila, aquí va tu foreach -->
                  @foreach ($data as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apePaterno .' ' .$item->apeMaterno}}</td>
                        <td>{{$item->dni}}</td>
                        <td>{{$item->celular}}</td>
                        <td>
                          <span class="badge rounded-pill bg-info text-dark">{{$item->cargo}}</span>
                          
                        </td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-outline-warning me-1" wire:click="editarTrabajadores({{$item->id}})"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminacion({{$item->id}})">
                              <i class="bi bi-trash-fill"></i>
                          </button>
                      </td>
                      </tr>
                  @endforeach
                  
                  <!-- Fin foreach -->
              </tbody>
          </table>
      </div>
  </div>

  <!-- Modal -->
  @if ($modal)
  <div class="modal d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">Registro de Obreros</h5>
                <button type="button" class="btn-close btn-close-white" wire:click="cerrarModal"></button>
            </div>

            <form wire:submit="guardarObreros">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="nombre" placeholder="Nombre">
                                <label>Nombre</label>
                                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="apePaterno" placeholder="Apellido Paterno">
                                <label>Apellido Paterno</label>
                                @error('apePaterno') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="apeMaterno" placeholder="Apellido Materno">
                                <label>Apellido Materno</label>
                                @error('apeMaterno') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="dni" maxlength="8" placeholder="DNI">
                                <label>DNI</label>
                                @error('dni') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="celular" maxlength="9" placeholder="Celular">
                                <label>Celular</label>
                                @error('celular') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- Campo para Cargo -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" wire:model.defer="cargo" placeholder="Cargo">
                                <label>Cargo</label>
                                @error('cargo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cerrarModal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Registrar Obrero
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
      
  @endif
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
                Livewire.dispatch('eliminarTrabajadores', {
                    id
                });
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
