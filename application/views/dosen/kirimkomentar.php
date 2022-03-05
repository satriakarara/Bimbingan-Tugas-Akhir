<br>
<br>
<div class="container">
<div class="card">
  <div class="card-header">
  Kirim Komentar
  </div>
  <div class="card-body">
  <div class="row mt-3">
        <div class="col-md-6">
        <?php if( validation_errors() ):?>
            <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
            </div>       
        <?php endif;?>
            
            <?php echo form_open_multipart(''); ?>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload File (opsional)</label>
                    <input type="file" name="file" class="form-control" id="nama">
                </div>
                 <div class="mb-3">
                    <label for="nip" class="form-label">Komentar</label>                    
                    <textarea class="form-control" name="komentar" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary float-right">Kirim Komentar</button>
            
            <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>
   

</div>