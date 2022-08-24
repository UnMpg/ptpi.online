<!-- jQuery -->
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- Format Money -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('assets/dashboard/dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dashboard/dist/js/demo.js') }}"></script>
<!-- DataTables -->
{{-- <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Custom Script Js -->
<script src="{{ asset('js/script.js') }}"></script>

{{-- quill --}}
{{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.5/quill.min.js" integrity="sha256-OEsiRE77EL46ZjgPqmsXfsNcOQPrMG/M6hHBF65jXP4=" crossorigin="anonymous"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script> --}}
<script>
  
    
    // $(function() {
    //     $("#tables").DataTable({
    //         "responsive": true,
    //         "autoWidth": false,
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copy', 'excel'
    //         ]
    //     });

    //     var table = $("#example1").DataTable({
    //         "responsive": true,
    //         "autoWidth": false,
    //     });
    //     $('a.toggle-vis').on('click', function(e) {
    //         e.preventDefault();

    //         // Get the column API object
    //         var column = table.column($(this).attr('data-column'));

    //         // Toggle the visibility
    //         column.visible(!column.visible());
    //     });
    //     $('.select2').select2();
    //     //Initialize Select2 Elements
    //     $('.select2bs4').select2({
    //         theme: 'bootstrap4'
    //     })
    // });


    function addForm(){
    var addrow = `
    <div class="baru-data">
      <div class="form-group row">
        <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Pendidikan</label>
        <div class="col-sm-10">
        <select name="pendidikan[]" class="form-control" id="exampleFormControlSelect2" >
          <option value="">-- Pendidikan --</option>
          <option value="s1">S1 - Sarjana</option>
          <option value="s2">S2 - Magister</option>
          <option value="s3">S3 - Doktor</option>
        </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="Universitas[]" class="col-sm-2 col-form-label">Perguruan Tinggi</label>
        <div class="col-sm-10">
          <input name="universitas[]" type="text" class="form-control" id="inputPassword3"  placeholder="Perguruan Tinggi">
        </div>
      </div>

      <div class="form-group row">
        <label for="jurusan" class="col-sm-2 col-form-label">Program Studi</label>
        <div class="col-sm-10">
          <input name="jurusan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Program Studi">
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 ">
          <div class="form-group row">                       
            <label for="Tahun Masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
            <div class="col-sm-8">
              <input name="tahun_masuk[]" type="date" class="form-control" id="inputPassword3"  >
            </div>
          </div>
        </div>
        <div class="col-md-6">                              
          <div class="form-group row">                       
            <label for="Tahun Lulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
            <div class="col-sm-8">
              <input name="tahun_lulus[]" type="date" class="form-control" id="inputPassword3" >
            </div>
          </div>
        </div>
      </div>
      <div class="button-group ">
        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
    </div>
  </div>`;

    $("#dynamic_form").append(addrow);

  }


  function addPengalaman(){
    var pengalaman= ` 
    <div class="data-pengalaman">
      <div class="form-group row">
        <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan/Posisi</label>
        <div class="col-sm-10">
          <input name="pengalaman_jabatan[]" type="text" class="form-control" id="inputPassword3"  placeholder="Jabatan/Posisi">
        </div>
      </div>

      <div class="form-group row">
        <label for="exampleFormControlSelect5" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
        <div class="col-sm-10">
        <select name="pengalaman_jenis[]" class="form-control" id="exampleFormControlSelect5" >
          <option value="">-- Jenis Pekerjaan --</option>
          <option value="teknik">Teknik</option>
          <option value="manajemen">Manajemen</option>
          <option value="admin">Admin</option>
        </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="Institusi" class="col-sm-2 col-form-label">Institusi</label>
        <div class="col-sm-10">
          <input name="pengalaman_institusi[]" type="text" class="form-control"  placeholder="Institusi">
        </div>
      </div>

      <div class="form-group row">
        <label for="Durasi" class="col-sm-2 col-form-label">Durasi / Jam</label>
        <div class="col-sm-10">
          <input name="pengalaman_durasi[]" type="text" class="form-control"  placeholder="Durasi / Jam">
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 ">
          <div class="form-group row">                       
            <label for="Tahun Masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
            <div class="col-sm-8">
              <input name="pengalaman_tahunawal[]" type="date" class="form-control"   >
            </div>
          </div>
        </div>
        <div class="col-md-6">                              
          <div class="form-group row">                       
            <label for="Tahun Lulus" class="col-sm-4 col-form-label">Sampai</label>
            <div class="col-sm-8">
              <input name="pengalaman_tahunakhir[]" type="date" class="form-control"  >
            </div>
          </div>
        </div>
      </div>

      <div class="button-group ">
        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
      </div>
    </div>
    `;

    $("#dynamic_pengalaman").append(pengalaman);

  }



  $("#dynamic_form").on("click", ".btn-tambah", function(){
    var dynamic_value = $("#dynamic_form").attr("data-id");
    console.log(dynamic_value);
    addForm()
    $(this).css("display","none")     
    var valtes = $(this).parent().find(".btn-hapus").css("display","");
  })

  $("#dynamic_form").on("click", ".btn-hapus", function(){
    $(this).parent().parent('.baru-data').remove();
    var bykrow = $(".baru-data").length;
    if(bykrow==1){
      $(".btn-hapus").css("display","none")
      $(".btn-tambah").css("display","");
    }else{
      $('.baru-data').last().find('.btn-tambah').css("display","");
    }
    });



  $("#dynamic_pengalaman").on("click", ".btn-tambah", function(){
    addPengalaman()
    $(this).css("display","none")     
    var valtes = $(this).parent().find(".btn-hapus").css("display","");
  })


    $("#dynamic_pengalaman").on("click", ".btn-hapus", function(){
      $(this).parent().parent('.data-pengalaman').remove();
      var bykrow = $(".data-pengalaman").length;
      if(bykrow==1){
        $(".btn-hapus").css("display","none")
        $(".btn-tambah").css("display","");
      }else{
        $('.data-pengalaman').last().find('.btn-tambah').css("display","");
      }
    });

  


  var judul_halaman = $("#judul_halaman").text();  
  if(judul_halaman == "Insert Data"){
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    }
   
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  // for (i = 0; i < y.length; i++) {
  //   // If a field is empty...
  //   if (y[i].value == "") {
  //     // add an "invalid" class to the field:
  //     y[i].className += " invalid";
  //     // and set the current valid status to false
  //     valid = false;
  //   }
  // }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  }


  // $(function(){

  // })

  

</script>