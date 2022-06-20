<!-- Vendor JS Files -->
<script src="{{ asset('assets/home/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/home/vendor/appear/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/home/vendor/knob/jquery.knob.js') }}"></script>
<script src="{{ asset('assets/home/vendor/parallax/parallax.js') }}"></script>
<script src="{{ asset('assets/home/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
<script src="{{ asset('assets/home/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/home/vendor/venobox/venobox.min.js') }}"></script>
<!-- Format Money -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Template Main JS File -->
<script src="{{ asset('assets/home/js/main.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>



<script>
    $(document).ready(function() {
        $(document).scroll(function () {
            var scroll = $(this).scrollTop();
            // console.log(scroll);
            if (scroll > 80) {
                
                $('#navbar-section').css({"position":"fixed","top":"0"});
            } else {
                $('#navbar-section').css({"position":"relative","top":"0"});
                
            }
        });
    });

    $( "#icon-jakarta" ).on("click",(function() {
       console.log("ter klik");
       $(".img-jakarta").css("display", "inline-block");
    }))
    // $( "#icon-jakarta" ).click(function() {
    //    console.log("ter klik");
    //     });

    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    })

    function toggle_div(){
        if($('#sidebar').hasClass("active")){
            // console.log("ada");
            $('#sidebar').removeClass("active");

        }else{
            $('#sidebar').addClass("active");
            // console.log("tidak");
        }
        
    }

    function bottom_toggle(){
        if($('#bottom-bar').hasClass("active")){
            // console.log("ada");
            $('#bottom-bar').removeClass("active");

        }else{
            $('#bottom-bar').addClass("active");
            // console.log("tidak");
        }
        
    }

    var selector = '.bottom-bar li a';
    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f7d2230f0e7167d0016c658/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
