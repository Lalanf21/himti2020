<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </div>

    <!-- /.container-fluid -->

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?= $this->session->flashdata('pesan') ?>
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Selamat datang!</h4>
                <p>Selamat datang <strong> <?= $this->session->userdata('nama') ?> </strong> di dashboard HIMTI-UMT,Anda login sebagai <strong> <?= $this->session->userdata('level') ?> </strong>
                </p>
            </div>
        </div>
    </div>
</div>