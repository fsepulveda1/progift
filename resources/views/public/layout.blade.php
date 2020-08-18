<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Pro-Gift | ')@yield('main-title','Articulos publicitarios Ferias y regalos corporativos santiago chile')</title>
    <meta name="keywords" content="pro-gift, pro, gift, merchandising, Ferias, articulos, regalos, regalo, publicitarios, publicitario, corporativos, corporativo, empresas, santiago, las condes, chile, metro, manquehue" />
    <meta name="description" content="@yield('page-description','12 años en el Mercado - Más de 2.000 Productos disponibles - Envíos a todo Chile. - Lo invitamos a cotizar con nosotros.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/icons/favicon.ico">

    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/fontawesome-free/css/all.min.css">
</head>
<body>
<div class="page-wrapper">

    @include('public.header')

    @yield('content')

    @include('public.footer')

</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active"><a href="{{ url('/') }}">INICIO</a></li>
                <li><a href="{{ url('/nuestra-empresa') }}">NUESTRA EMPRESA</a></li>
                <li><a href="{{ url('/mi-cotizacion') }}">MI COTIZACIÓN</a></li>
                <li><a href="{{ url('/preguntas-frecuentes') }}">PREGUNTAS FRECUENTES</a></li>
                <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
                <li><a href="{{ url('/tips') }}">TIPS</a></li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Add Cart Modal -->
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body add-cart-box text-center">
                <p>Acabas de añadir a<br>tu cotización:</p>
                <h4 id="productTitle"></h4>
                <img src="" id="productImage" width="100" height="100" alt="adding cart image">
                <div class="btn-actions">
                    <a href="{{ url('/mi-cotizacion') }}"><button class="btn-primary">Mi Cotización</button></a>
                    <a href="#"><button class="btn-primary" data-dismiss="modal">Continuar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Plugins JS File -->
<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins.min.js"></script>
<script src="/assets/js/matchHeight.min.js"></script>
<!-- Main JS File -->
<script src="/assets/js/main.js"></script>

<!-- www.addthis.com share plugin -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f39905c391aec6f"></script>
<script src="/js/custom.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ setting('admin.google_analytics_client_id') }}', 'pro-gift.cl');
    ga('send', 'pageview');

</script>
</body>
</html>
		

        