<header class="app-bar fixed-top" data-role="appbar" style="background-color: #e5e5e5">
    <div class="atas">
        <div class ="logo" style="margin-left: 50px">
            <img src="img/Logo.png" alt="logo" class="img">
        </div>
        <a href="<?= $_url ?>" class="app-bar-element branding judul">
        <h1><b>Sistem Pengisian KRS</b></h1>
        <h2 style="margin-top: -10px">Universitas Padjadjaran</h2>
        </a></br>
        <?php if ($_access != ''): ?>
        <ul class="app-bar-menu place-right fg-dark" data-flexdirection="reverse">
        <?php if ($_access == 'admin'): ?>
            <li><a class="text-bold fg-black" href="<?= $_url ?>krs">KRS</a></li>
            <li><a href="<?= $_url ?>dosen">Dosen</a></li>
            <li><a href="<?= $_url ?>mahasiswa">Mahasiswa</a></li>
            <li><a href="<?= $_url ?>matakuliah">Mata Kuliah</a></li>
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-user icon"></span></a>
                <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                    <li><a href="<?= $_url ?>user">User</a></li>
                    <li><a href="<?= $_url ?>user/change-password">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= $_url ?>sign/out">Sign Out</a></li>
                </ul>
            </li>
        <?php elseif ($_access == 'mahasiswa'): ?>
            <li><a href="<?= $_url ?>krs/view/<?= $_id ?>">KRS</a></li>
            <li><a href="<?= $_url ?>mahasiswa/jadwal/">Jadwal</a></li>
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-user icon"></span></a>
                <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                    <li><a href="<?= $_url ?>mahasiswa/edit">Edit Profile</a></li>
                    <li><a href="<?= $_url ?>user/change-password">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= $_url ?>sign/out">Sign Out</a></li>
                </ul>
            </li>
        <?php endif; ?>
        </ul>

        <span class="app-bar-pull"></span>
        <?php endif; ?>

    </div>
    </header>

    <br />
    <br />