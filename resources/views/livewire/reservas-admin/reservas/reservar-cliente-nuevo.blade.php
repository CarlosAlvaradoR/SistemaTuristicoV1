<div>
    <div class="row">
        @include('reservar_admin.comunes.formulario_reserva')
    </div>

    @if (session()->has('mensaje-falla-pago'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'ADVERTENCIA!',
                text: 'El pago por reserva debe de ser mayor al 20 %'
            });
        </script>
    @endif

    
    @include('common.alerts')
</div>
