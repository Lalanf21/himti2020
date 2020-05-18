<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-fingerprint"></i> Talkshow Data Security 2020
        <p class="text-muted">Send link zoom ke email peserta</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<?= $this->session->flashdata('pesan') ?>
			<div class="card shadow">
				<div class="card-body">
					<form action="<?=site_url('send-emails') ?>" method="POST">
						<div class="form-group">
							<label for="link">Link zoom</label>
							<textarea name="link" id="link" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-arrow-right"> Send emails</i>
                            </button>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>