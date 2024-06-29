@extends('layout.main_layout')
@section('title')
<title>Tentang Pesantren | PPATQ-RF</title>
@endsection

@section('content')
@include('About.content')
@include('metode.content')

@endsection

@section('script')
<script>
    $(document).ready(function() {
     var tabsNewAnim = $('#navbarSupportedContent');
     var selectorNewAnim = tabsNewAnim.find('li').length;
     var activeItemNewAnim = tabsNewAnim.find('.active');
     activeItemNewAnim.removeClass('active');
     $('#about').addClass('active');
     setTimeout(function() {
         test();
     }, 100); // Slight delay to ensure elements are rendered
 });
</script>
@endsection