
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FIEMEC | www.fiemec.pe</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 4.1 -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css')}}">



  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header navbar-fixed-top">

        <!-- Logo -->
        <a href="{{ route('fiemec')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>HE</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>FIEMEC</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li>
               
                <a href="#" ><i class="fas fa-cogs" data-toggle="modal" data-target="#create"></i></a>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Cerrar
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>                      
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      @include('modal')
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="{{ route('fiemec')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span> Panel de Control</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Administrador</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Artículos </a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-dolly"></i>
                 <span>Productos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('producto')}}"><i class="fa fa-circle-o"></i> Fiemec </a></li>
                <li><a href="{{ route('catalogo')}}"><i class="fa fa-circle-o"></i> Catálogo</a></li>
              </ul>
            </li>            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-powerpoint"></i>
                <span>Proforma</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('proforma')}}"><i class="fa fa-circle-o"></i> Productos</a></li>
                <li><a href="{{ route('tablero')}}"><i class="fa fa-circle-o"></i> Tableros</a></li>
                <li><a href="{{ route('servicio')}}"><i class="fa fa-circle-o"></i> Servicios</a></li>
                <li><a href="{{ route('bandejas')}}"><i class="fa fa-circle-o"></i> Bandejas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-plus "></i>
                <span>Cliente</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Nuevo Cliente</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-clipboard-list"></i>
                <span>Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Proforma de Productos</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Proforma de Servicios</a></li>
                <li><a href="{{ route('tablero')}}"><i class="fa fa-circle-o"></i> Proforma de Tableros</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('contenido')
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2018 <a href="www.incanatoit.com">KMT ADVANCE SYSTEMS</a>.</strong> All rights reserved.
      </footer>
</div>
      
    <!-- jQuery 2.1.4 -->
    <!-- jQuery 2.1.4 -->
    <script src="{{asset("js/jQuery-2.1.4.min.js")}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/bootstrap-select.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("js/app.min.js")}}"></script>

    <script src="{{asset("https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js")}}"></script>
    <script type="text/javascript">
  $(document).ready(function() {
                     $('#example').DataTable({
                         "tableTools": {
                             "sRowSelect": "multi",
                             "aButtons": [
                                 {
                                     "sExtends": "select_none",
                                     "sButtonText": "Borrar selección"
                                 }]
                         },
                         "pagingType": "simple_numbers",
//Actualizo las etiquetas de mi tabla para mostrarlas en español
                         "language": {
                             "lengthMenu": "Mostrar _MENU_ registros.",
                             "zeroRecords": "No se encontró registro.",
                             "info": "Mostrando _START_ de _END_ elementos (_TOTAL_ registros totales).",
                             "infoEmpty": "0 de 0 de 0 registros",
                             "infoFiltered": "(Encontrado de _MAX_ registros)",
                             "search": "Buscar: ",
                             "processing": "Procesando la información",
                             "paginate": {
                                 "first": " |< ",
                                 "previous": "Ant.",
                                 "next": "Sig.",
                                 "last": " >| "
                             }
                         }
                     });
                 } );
    </script>
  </body>
</html>

