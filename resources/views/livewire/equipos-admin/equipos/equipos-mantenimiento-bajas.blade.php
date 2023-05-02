<div>
    <style>
        .loader {
            border: 6px solid #f3f3f3;
            /* Light grey */
            border-top: 6px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="row">
        <div class="col-xxl-12 col-md-12">
            <section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="font-icon font-icon-cogwheel"></i>
										Equipos en Mantenimiento
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="glyphicon glyphicon-music"></span>
										Equipos Dados de Baja   
									</span>
								</a>
							</li>
                            
						</ul>
					</div>
				</div><!--.tabs-section-nav-->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                        Tab 1
                        @livewire('equipos-admin.equipos.equipos-mantenimiento-bajas.mantenimiento', [$equipo])
                    </div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                        Tab 2
                        @livewire('equipos-admin.equipos.equipos-mantenimiento-bajas.bajas', [$equipo])
                    </div><!--.tab-pane-->
					
				</div><!--.tab-content-->
			</section><!--.tabs-section-->


        </div>
    </div>

    



    


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#modal-mantenimiento-bajas').modal('show')
            });
            window.livewire.on('close-modal-equipo', msg => {
                $('#modal-equipo').modal('hide')
            });
            window.livewire.on('show-modal-equipo-stock', msg => {
                $('#modal-stock').modal('show')
            });
            window.livewire.on('close-modal-equipo-stock', msg => {
                $('#modal-stock').modal('hide')
            });
            window.livewire.on('category-updated', msg => {
                $('#theModal').modal('hide')
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            //fecha_inicial
            var fecha = new Date();
            formateada = fecha.toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric'
            });

        });
    </script>


    @include('common.alerts')
</div>
