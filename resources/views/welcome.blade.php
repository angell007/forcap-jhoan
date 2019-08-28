<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>FORCAP</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="grey darken-1" role="navigation">
        <div class="blue nav-wrapper"><a id="logo-container" href="#" class="brand-logo logo">FORCAP</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#mision">Misión</a></li>
                <li><a href="#vision">Visión</a></li>
                <li><a href="#objetivos">Objetivos</a></li>
                <li><a href="#contacto">Contacto</a></li>
                @if (Route::has('login'))

                @auth
                <li><a href="{{ url('/home') }}" class="white black-text waves-effect waves-light btn">INICIO</a></li>
                @else
                <li><a href="{{ url('/login') }}" class="white black-text waves-effect waves-light btn">INICIE SECIÓN</a></li>
                @endauth
                @endif
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="#mision">Misión</a></li>
                <li><a href="#vision">Visión</a></li>
                <li><a href="#objetivos">Objetivos</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <!-- QUIENES SOMOS -->
    <section>
        <div class="slider fullwidth">
            <ul class="slides">
                <li>
                     <img src="img/Bca.jpeg"> 
                    <!-- <div class="caption center-align">  -->
                    <!-- </div> -->
                </li>
            </ul>
        </div>
    </section>
    <!-- MISION -->
    <div class="divider"></div>
    <section class="seccionMision" id="mision">
        <div class="divider"></div>
        <div class="secton no-pad-bot">
            <div class="container">
                <div class="caption center-align">
                    <h1 class="header center light black-text misionTexto">MISIÓN</h1>
                    <h4 class="light black-text" align="justify">Desarrollamos actividades de caracter empresarial para el fomento, capacitación y crédito dirigidas a los diferentes sectores como el educativo y económico, teniendo en cuenta las encaminadas al desarrollo productivo, tecnológico y autosostenible para la region del magdalenta medio y sus zonas aledañas garantizando a través del mejoramiento continuo mayor calidad de vida para la generacion de empresas y empleo, la prestación de un excelente servicio y la competitividad territorial.</h4>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!-- VISION -->
    <div class="divider"></div>
    <section class="seccionMision" id="vision">
        <div class="divider"></div>
        <div class="secton no-pad-bot">
            <div class="container">
                <div class="caption center-align">
                    <h1 class="header center light black-text misionTexto">VISIÓN</h1>
                    <h4 class="light black-text" align="justify">Seremos lideres a nivel local y regional en el desarrollo de proyectos socio/economicos que contribuyan a la puesta en marcha de una politica de paz y al crecimiento integral de la región; innovando en el desarrollo tecnológico del sector productivo y comercial, garantizando la productividad.
                        <br>
                        <br>
                        A través del desarrollo de nuestras actividades se ampliara la cobertura en el servicio de capacitación, foménto y crédito logrando extenderse a otros sectores como la Academia y en especial la Educación Superior.
                        <br>
                        <br>
                        EL FORCAP, se fortalecerá en su estructira administrativa y financiera junto con el apoyo de sus funcionarios se buscara el mejoramiento continuo logrando brindar atención integral a todos los habitantes no solo del Municipio sino de toda la región del Magdalena medio.
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!-- OBJETIVOS -->
    <div class="divider"></div>
    <section class="seccionMision" id="objetivos">
        <div class="divider"></div>
        <div class="secton">
            <div class="container">

                <h1 class="header left light black-text">OBJETIVOS</h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2 class="light blue-text" align="left">Objetivo general</h2>

                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Asignar recursos rotatorios para el fomento, capacitación y crédito a las actividades empresariales de todas las áreas económicas de los habitantes del Municipio de Barrancabermeja.</h4>

                <h2 class="light blue-text" align="left">Objetivos especificos</h2>

                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Diseñar, implementar, evaluar y fortalecer los procesos asistenciales y administrativos que permitan el logro de la misión y visión de la entidad.</h4>
                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Propender por el desarrollo del talento humano fundamentado en nuestros valores corporativos y centrados en la atención de nuestros usuarios.</h4>
                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Apoyar la implementación de actividades productivas y empresariales que garanticen el desarrollo económico de la región.</h4>
                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Garantizar un ágil y eficaz desarrollo de las actividades que realiza la oficina para una excelente prestación del servicio eficiente, eficaz y adecuado a las normas que rigen la administración pública.</h4>
                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Unificar procedimientos y créditos de trabajo para evitar la duplicidad de funciones y facilitar la realización y logro de los objetivos que tiene el municipio de Barrancabermeja.</h4>
                <h4 class="light black-text " align="justify"><i class="material-icons">chevron_right</i>Facilitar la supervisión y calificación objetiva de las labores que realiza la dependencia y sus funcionarios.</h4>

            </div>
        </div>
    </section>
    <br>
    <footer class="page-footer blue" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Contacto</h5>
                    <p class="grey-text text-lighten-4"><i class="material-icons">settings_phone</i> 555 555 5555 </p>
                    <p class="grey-text text-lighten-4"><i class="material-icons">mail_outline</i>capacitaciones.forcapbca@gmail.com</p>

                </div>
            </div>
        </div>
        <!--  <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="">Ramiro Mesa System engineriing aprentice</a>
      </div>
    </div> -->
    </footer>


    <!--Scripts-->
    <script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/init.js"></script>
    <script src="/js/materialize.js"></script>


</body>

</html>