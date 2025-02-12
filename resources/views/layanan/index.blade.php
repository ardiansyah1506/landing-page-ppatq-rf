@extends('layout.main_layout')
@section('title')
<title>Layanan | PPATQ-RF</title>
@endsection
@section('header')
<style>
    #services .services-list {
        padding-top: 50px;
    }
    .services-list .service-block {
        margin-bottom: 25px;
    }
    .services-list .service-block .ico {
        font-size: 38px;
        float: left;
    }
    .services-list .service-block .text-block {
        margin-left: 58px;
    }
    .services-list .service-block .text-block .name {
        font-size: 20px;
        font-weight: 900;
        margin-bottom: 5px;
    }
    .services-list .service-block .text-block .info {
        font-size: 16px;
        font-weight: 300;
        margin-bottom: 10px;
    }
    .services-list .service-block .text-block .text {
        font-size: 12px;
        line-height: normal;
        font-weight: 300;
    }
    .highlight {
        color: #2ac5ed;
        font-weight:bold;
    }
</style>
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container bootstrap snippets bootdey">
        <section id="services" class="current">
            <div class="services-top">
                <div class="container bootstrap snippets bootdey">
                    <div class="row text-center">
                        <div class="section-title text-center position-relative py-4 mb-4 mx-auto" style="max-width: 600px;">
                            <h2 class="fw-bold text-green text-uppercase text-green">Layanan PPATQ</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                            <div class="services-list">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-person-add highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">PSB</div>
                                                <div class="text">Penerimaan Santri Baru (PSB) adalah proses pendaftaran dan seleksi bagi calon santri yang ingin menempuh pendidikan di pesantren. Proses ini mencakup tahapan pendaftaran, seleksi administrasi, tes akademik, serta wawancara untuk memastikan kesesuaian calon santri dengan lingkungan dan kurikulum pesantren. <a class="fs-6 fw-bold fst-italic" href="https://psb.ppatq-rf.id/">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-wallet-fill highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Payment</div>
                                                <div class="text">Payment adalah layanan pembayaran resmi dari pondok pesantren yang memudahkan santri dan wali santri dalam melakukan transaksi keuangan. Melalui sistem ini, pembayaran biaya pendidikan, asrama, dan administrasi lainnya dapat dilakukan dengan mudah dan aman menggunakan berbagai metode seperti transfer bank, e-wallet, dan kartu kredit. Layanan ini dirancang untuk memastikan kenyamanan dan transparansi dalam setiap transaksi. <a class="fs-6 fw-bold fst-italic" href="https://payment.ppatq-rf.id/">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-envelope-arrow-up highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Sambung Rasa</div>
                                                <div class="text">Sambung Rasa adalah layanan komunikasi dan konsultasi yang disediakan oleh pondok pesantren untuk mempererat hubungan antara santri, wali santri, serta pengasuh. Melalui layanan ini, wali santri dapat berinteraksi langsung dengan pihak pondok untuk menyampaikan aspirasi, bertanya seputar perkembangan santri, atau mendapatkan bimbingan terkait kehidupan pesantren. Dengan adanya Sambung Rasa, diharapkan tercipta hubungan yang harmonis dan penuh keberkahan dalam lingkungan pesantren. <a class="fs-6 fw-bold fst-italic" href="https://payment.ppatq-rf.id/index.php/keluhan">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-cast highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Sosial Media</div>
                                                <div class="text">Sosial Media adalah sarana informasi dan komunikasi resmi pondok pesantren yang digunakan untuk menyebarkan berita, kegiatan, dan perkembangan pesantren kepada santri, wali santri, serta masyarakat luas. Melalui platform seperti Facebook, Instagram, dan WhatsApp, pondok pesantren dapat berbagi konten inspiratif, jadwal kegiatan, serta pengumuman penting. Dengan adanya sosial media, diharapkan tercipta keterhubungan yang lebih erat antara pesantren dan komunitasnya, serta memudahkan akses informasi secara cepat dan akurat.</div>
                                                <div class="text fs-3 mt-2">
                                                    <span>
                                                        <a href="https://www.tiktok.com/@ppatq.raudlatulfalah?lang=en" class="text-decoration-none">
                                                            <i class="bi bi-tiktok"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.facebook.com/pprtq.r.falah" class="text-decoration-none">
                                                            <i class="bi bi-facebook"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.youtube.com/@PPATQTV" class="text-decoration-none">
                                                            <i class="bi bi-youtube"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.instagram.com/ppatq_raudlatulfalah/" class="text-decoration-none">
                                                            <i class="bi bi-instagram"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
@endsection


@section('script')
<script>
       $(document).ready(function() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        activeItemNewAnim.removeClass('active');
        $('#layanan').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered
    });
</script>
@endsection