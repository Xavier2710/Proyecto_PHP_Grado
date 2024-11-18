<?php

if(isset($_SESSION['mensaje'])  && isset($_SESSION['icono'])){
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            icon: "<?=$icono;?>",
            title: " ",
            text: "<?=$mensaje;?>",
            confirmButtonColor: "#D6B357",
            denyButtonColor: '#D92B3A',
            confirmButtonTextColor: '#F2F2F2',
            denyButtonTextColor: '#F2F2F2',
        });
    </script>
<?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}
?>