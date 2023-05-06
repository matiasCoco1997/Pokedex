<?php
echo "
    <footer>
            <h4>Grupo 3:</h4>
            <h5>Coco Matías</h5>
            <h5>Gambaro Victoria</h5>
            <h5>Orquin Nuria</h5>
            <h5>Cosentino Rodrigo</h5>
        </footer>
        <script>
            const menuIcon = document.querySelector('#menu-icon');
            const loginForm = document.querySelector('#login-form');

            menuIcon.addEventListener('click', function() {
                loginForm.classList.toggle('visible');
            });
        </script>
     ";
