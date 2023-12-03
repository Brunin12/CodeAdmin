<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>


<script>
    $(() => {
        $('.navbar').hide().show(750)

        if (localStorage.getItem('dark-mode') === 'enabled') {
            $('body').addClass('dark-mode');
            $('#toogleMode i').removeClass('fa-moon').addClass('fa-sun');
        }


        $('#toogleMode').on('click', function() {
            if ($('body').hasClass('dark-mode')) {
                $('body').removeClass('dark-mode');
                $('#toogleMode i').removeClass('fa-sun').addClass('fa-moon');
                localStorage.setItem('dark-mode', 'disabled');
            } else {
                $('body').addClass('dark-mode');
                $('#toogleMode i').removeClass('fa-moon').addClass('fa-sun');
                localStorage.setItem('dark-mode', 'enabled');
            }
        });

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('Service Worker registrado com sucesso:', registration);
                    })
                    .catch(error => {
                        console.log('Falha ao registrar o Service Worker:', error);
                    });
            });
        }
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Link para o CSS do SweetAlert2 via CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<?php if (session()->has('success')) : ?>
    <script>
        $(() => {
            Swal.fire({
                title: 'Sucesso!',
                text: '<?= session('success') ?>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
<?php elseif (session()->has('error')) : ?>
    <script>
        $(() => {
            Swal.fire({
                title: 'Erro!',
                text: '<?= session('error') ?>',
                icon: 'error',
                showConfirmButton: true
            });
        });
    </script>
<?php endif; ?>