<!-- Vendor JS Files -->
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('front/js/main.js') }}"></script>

<script type="text/javascript">

    $(function () {
      var table = $('.data-table-koperasi').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          ajax: "{{ route('koperasi') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'nomor', name: 'nomor'},
              {data: 'nama', name: 'nama'},
              {data: 'tahun_berdiri', name: 'tahun_berdiri'},
              {data: 'kecamatan', name: 'kecamatan'},
              {data: 'alamat', name: 'alamat'},
              {data: 'kode', name: 'kode'},
              {data: 'sertifikat', name: 'sertifikat'},
              {data: 'status', name: 'status'},
          ]
      });
    });

    $(function () {
      var table = $('.data-table-ukm').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          ajax: "{{ route('ukm') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'nama_perusahaan', name: 'nama_perusahaan'},
              {data: 'nama_pemilik', name: 'nama_pemilik'},
              {data: 'nib', name: 'nib'},
              {data: 'kecamatan', name: 'kecamatan'},
              {data: 'desa', name: 'desa'},
              {data: 'jenis_usaha', name: 'jenis_usaha'},
              {data: 'tahun', name: 'tahun'},
            //   {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });

  </script>
