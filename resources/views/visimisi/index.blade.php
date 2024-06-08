@extends('layout.main_layout')
@section('title')
<title>Visi Misi</title>
@endsection
@section('content')
<div class="p-4">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <p class="fs-2 text-center p-3 text-green">VISI DAN MISI
            </p>
            <p class="fs-3">
                PONDOK PESANTREN ANAK-ANAK
                TAHFIDZUL QUR’AN RF
            </p>
    </div>
    <div class="card flex-col flex-md-row  p-2 mb-4">
        <img class="image-responsive" src="{{asset('img/visi1.jpg')}}" alt="Visi Image">
        <div class="card-body">
          <h4 class="card-title text-center fs-3">VISI</h4>
          <p class="card-text">"Bersama QU", Komitmen untuk membangun sebuah komunitas yang dijiwai oleh nilai-nilai keimanan dan keislaman yang kokoh. Visi ini mencerminkan tekad untuk bersama-sama menjalani kehidupan dengan bertaqwa kepada Allah, menjunjung tinggi nilai-nilai kesantunan dalam berinteraksi, berjuang untuk kemajuan yang berkelanjutan, dan menghidupkan Al-Qur'an sebagai pedoman utama dalam segala aspek kehidupan.</p>
        </div>
      </div>
    <div class="card flex-column-reverse flex-md-row  p-2 mb-4">
        <div class="card-body">
            <h4 class="card-title text-center fs-3">MISI</h4>
            <p class="card-text p-4">" Misi kami adalah menghasilkan generasi yang hafal Al-Qur'an dengan mutu yang unggul, bukan hanya sekedar dalam hafalan, tetapi juga dalam pemahaman dan aplikasi nilai-nilai Al-Qur'an dalam kehidupan sehari-hari. Kami berkomitmen untuk mencetak generasi yang tidak hanya cemerlang dalam akademik, tetapi juga memiliki karakter yang terkait erat dengan ajaran Al-Qur'an. Kami bertekad untuk meningkatkan mutu imtaq (keimanan) dan iptek (ilmu pengetahuan dan teknologi) dalam pendidikan, serta menegakkan ahlakul karimah sebagai landasan moral dan etika dalam bermasyarakat."</p>
        </div>
        <img class="image-responsive" src="{{asset('img/misi1.jpg')}}" alt="Misi Image">
      </div>
  
</div>

@endsection


@section('script')
<script>
       $(document).ready(function() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        activeItemNewAnim.removeClass('active');
        $('#visimisi').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered
    
        // Call test() when the window is resized
        $(window).on('resize', function() {
            setTimeout(function() {
                test();
            }, 500);
        });
    
    });
</script>
@endsection