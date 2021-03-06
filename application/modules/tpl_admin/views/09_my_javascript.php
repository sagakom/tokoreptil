<!-- page script -->
<script>
  $(document).ready(function() {
    $('#tabel_pesan').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0],
        "searchable": false,
        "orderable": true,
        "visible": true
      },
      { 
        "targets": [1, 2, 3, 4, 5],
        "searchable": true,
        "orderable": false,
        "visible": true
      },
      {
        "targets": [5],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [6],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });

    $('#tabel_personal').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0,1,2,3],
        "searchable": true,
        "orderable": true,
        "visible": true
      },
      {
        "targets": [0],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [1],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });

     $('#tabel_kategori').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0,1],
        "searchable": true,
        "orderable": true,
        "visible": true
      },
      {
        "targets": [0],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [1],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });

     $('#tabel_subkategori').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0,1,2],
        "searchable": true,
        "orderable": true,
        "visible": true
      },
      {
        "targets": [0],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [1],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });

    $('#tabel_barang').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0,1],
        "searchable": true,
        "orderable": true,
        "visible": true
      },
      {
        "targets": [0],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [1,2,3,5,7,8,9],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });

    $('#tabel_artikel').DataTable({
      "order": [[0, 'desc']],
      "columnDefs": [
      {
        "targets": [0,1],
        "searchable": true,
        "orderable": true,
        "visible": true
      },
      {
        "targets": [0],
        "searchable": false,
        "orderable": false,
        "visible": false
      },
      {
        "targets": [1],
        "searchable": false,
        "orderable": false,
        "visible": true
      }]
    });
  });
</script>
<script>
     $("#kabupaten").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
</script>