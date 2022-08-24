<script src="{{ asset('assets/certified/dashboard/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/certified/js/scripts.js') }}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



<script>
    $("#tentang_kami").click(function(){
        if ($('.tentang').hasClass("show")) {
            $('.tentang').removeClass("show");
        }else{
            $('.tentang').addClass("show");
        }
    })
    $("#ruang_lingkup").click(function(){
        if ($('.lingkup').hasClass("show")) {
            $('.lingkup').removeClass("show");
        }else{
            
            $('.lingkup').addClass("show");
        }
    })

    $("#sertifikasi").click(function(){
        if ($('.sertifikasi').hasClass("show")) {
            $('.sertifikasi').removeClass("show");
        }else{
            
            $('.sertifikasi').addClass("show");
        }
    })
</script>