  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {title}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{base_url({base_level}/dashboard)}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kabupaten</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Input Kabupaten Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        <form action="<?php echo site_url('admin/kabupaten/tambah_proses'); ?>" method="post">
          <div class="form-group">
          <label>ID Kabupaten</label>
          <input type="text" name="id_kabupaten" class="form-control" require>
          </div>
          <label>Provinsi</label>
                <select name="idprovinsi_kabupaten" class="form-control" id="provinsi">
                <option>---Masukkan Provinsi---</option>
                <?php
                foreach ($lokasi['provinsi'] as $prov) {
                    ?>
                    <option <?php echo $lokasi['provinsi_selected'] == $prov->id_provinsi ? 'selected="selected"' : '' ?>
                        value="<?php echo $prov->id_provinsi ?>"><?php echo $prov->nama_provinsi ?></option>
                    <?php
                }
                ?>
                </select>
          </div>
          <div class="form-group">
          <label>Nama Kabupaten</label>
          <input type="text" name="nama_kabupaten" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href={base_url(admin/kabupaten)} class="btn btn-primary">Batal</a>
        </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->