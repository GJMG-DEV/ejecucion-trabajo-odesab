<div class="card shadow rounded-3 border-0" style="max-width: 900px; margin: 30px auto;">
    <div class="card-header text-center py-3 rounded-top-3" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
        <h5 class="card-title text-white mb-0" style="font-weight: 600; font-size: 1.6rem;">📋 Registrar Nueva Incidencia</h5>
    </div>

    <form wire:submit="guardarIncidencia">
        <div class="card-body px-4 py-3">
            <div class="row g-3">
                <!-- Datos del Usuario -->
                <h6 class="fw-semibold text-primary mb-2">👤 Datos del Usuario</h6>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="nombre" placeholder="Nombre">
                        <label>Nombre</label>
                        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="apePaterno" placeholder="Apellido Paterno">
                        <label>Apellido Paterno</label>
                        @error('apePaterno') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="apeMaterno" placeholder="Apellido Materno">
                        <label>Apellido Materno</label>
                        @error('apeMaterno') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="dni" maxlength="8" placeholder="DNI">
                        <label>DNI</label>
                        @error('dni') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-sm" wire:model.defer="direccion" placeholder="Dirección">
                        <label>Dirección</label>
                        @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Datos de la Incidencia -->
                <h6 class="fw-semibold text-primary mt-4 mb-2">🛠️ Datos de la Incidencia</h6>

                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select form-select-sm" wire:model.defer="servicioSolicitado">
                            <option value="">Seleccione un servicio</option>
                            <option value="Servicio 1">Servicio 1</option>
                            <option value="Servicio 2">Servicio 2</option>
                            <option value="Servicio 3">Servicio 3</option>
                            <option value="Servicio 4">Servicio 4</option>
                        </select>
                        <label>Servicio Solicitado</label>
                        @error('servicioSolicitado') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control form-control-sm" wire:model.defer="fechaAsignacion">
                        <label>Fecha de Asignación</label>
                        @error('fechaAsignacion') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control form-control-sm" wire:model.defer="fechaFinalizacion">
                        <label>Fecha de Finalización</label>
                        @error('fechaFinalizacion') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select form-select-sm" wire:model.defer="estado">
                            <option value="Pendiente">Pendiente</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                        <label>Estado</label>
                        @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones -->
        <div class="card-footer bg-transparent text-end py-2">
            <button type="button" class="btn btn-sm btn-outline-secondary me-2" wire:click="cerrarModal">
                <i class="bi bi-x-circle me-1"></i> Cancelar
            </button>
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-check-circle me-1"></i> Registrar
            </button>
        </div>
    </form>
</div>