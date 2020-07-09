<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Paneli Adminit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Fillimi <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Galeria</a>
            </li>

        </ul>

    </div>
    <div class="flex-column-reverse">
        <?php 
            $name = $user->data()->first_name;
            ?>
            Pershendetje <?php echo $name; ?>, nese doni te dilni nga sistemi <a href="logout.php">kliko ketu</a>.
    </div>

</nav>