<!DOCTYPE html>
<html lang="en">
    @include('layouts.certifiedDashboard.header')
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"> <img src="{{ asset('assets/certified/img/lsp.png') }}" width="30px" alt=""> <span>LSP - TPI</span></a>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    {{-- side Info --}}
                    @include('layouts.certifiedDashboard.sideInfo')
                    {{-- /side Info --}}
                    <br />

                    {{-- side Bar --}}
                    @include('layouts.certifiedDashboard.sideBar')
                    {{-- /side Bar --}}

                    {{-- side Footer --}}
                    @include('layouts.certifiedDashboard.sideFooter')
                    {{-- /side Footer --}}

                </div>
            </div>

            <!-- top navigation -->
            @include('layouts.certifiedDashboard.topNav')
            <!-- /top navigation -->

            {{-- content  --}}
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                          <h3>@yield('title-page')</h3>
                        </div>
          
                        <div class="title_right">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    @yield('content')
                </div>   
            </div>
            {{-- /content  --}}

            {{-- footer  --}}
            @include('layouts.certifiedDashboard.footer')
            {{-- /footer  --}}
        </div>
    </div>

    {{-- js --}}
    @include('layouts.certifiedDashboard.body')
    {{-- /js --}}

    {{-- script tambahan --}}
    @yield('script')
    {{-- /script tambahan --}}

    

    {{-- ajax Notive --}}
    <script>
        var userID = "{{ auth('certified')->user()->id }}";


        function addNotive(title, tanggal,id){
            var notive = `<li class="nav-item" data-toggle="modal" data-target=".modal-${id}">
                  <a class="dropdown-item">
                      <span class="image"><i class="fa fa-envelope-o"></i></span>
                      <span>
                          <span>{{ auth('certified')->user()->nama }}</span>
                          <span class="time">${tanggal}</span>
                      </span>
                      <span class="message">
                          ${title}
                      </span>
                  </a>
                </li>`;

            
            $("#list-notive").append(notive);
        }

        function addModal(id,title,body,tanggal){
            var notiveModal = `
        <div class="modal fade modal-${id}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">${title}</h5>           
                    <div class="close">
                        <h6 class="text-end" style="float: left; padding-top:0.8rem;">${tanggal}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                </div>
                <div class="modal-body">
                    <div class="notive-modal">
                        <div class="notive-content">
                            <div class="notive-header">
                                <div class="row">
                                    <div class="col-md-3 kop-ptpi">
                                        <img src="{{ asset('assets/home/img/logo-ptpi.png') }}" alt="">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h3>LSP - TPI</h3>
                                        <p>Lembaga Sertifikasi Person Teknik Perumasakitan Indonesia</p>
                                    </div>
                                    <div class="col-md-3 kop-lsp">
                                        <img src="{{ asset("assets/certified/img/lsp.png") }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="notive-isi">
                                <br>
                                ${body}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        `;
        $(".kumpulan-modal").append(notiveModal);
        }

        function getNotif(){
            return $.ajax({
                        type: "GET",
                        url: "{{ url('/sertifikasi/get-notive') }}",
                        async: false
                    }).responseText
        }

        $(document).ready(function(){

            let response = JSON.parse(getNotif());
            $(".jml_notive").append(response.jml_notive);
            $.each(response.data, function(index, value){
                // console.log(value);
                var yourDate = value.created_at;
                var tanggal = moment.utc(yourDate,"YYYY-MM-DD\THH:mm:ss\Z").format("DD MM YYYY");
                // console.log(tanggal);
                addNotive(value.title,tanggal,value.id);
                addModal(value.id,value.title,value.body,tanggal);
            })
        })    
        //     $.ajax({
        //         url: "{{ url('/sertifikasi/get-notive') }}",
        //         type : "GET",
        //         async: false,
        //         success: function(response){
        //             // console.log(response);
        //             response.forEach(element => {
        //                 // console.log(element.jml_notive);
        //                 // console.log(element.data[0]);
        //                 if (element.jml_notive < 1) {
        //                     $(".badge").remove();
        //                 }
        //                 $(".jml_notive").append(element.jml_notive);
        //                 for (let index = 0; index < element.data.length; index++) {
        //                     // console.log(element.data[index].title); 
        //                     modal.push({'id' : element.data[index].id , 'title' : element.data[index].title , 'body': element.data[index].body , 'tanggal' : element.data[index].created_at });
        //                     // console.log(title);
                            
        //                     addNotive(element.data[index].title , element.data[index].created_at , element.data[index].id );

        //                 }
                       
        //             });

        //         },
        //         error : function(response){
        //             console.log(response);
        //         }

        //     })

        // })

        // for (let index = 0; index < modal.length; index++) {
        //     const element = modal[index];
        //     console.log(element);
            
        // }
        
    </script>
    <div class="kumpulan-modal">
    </div>
    {{-- Modal  --}}
    

    
</body>
</html>