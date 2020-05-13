<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Albalex Electric | www.albalexelectric.pe</title>
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
        <a href="{{ route('fiemec')}}" class="logo" style="text-decoration: none !important;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AE</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size: 17px;"><b>ALBALEX ELECTRIC</b></span>
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
               
                <a href=""><i class="fas fa-cogs" data-toggle="modal" data-target="#create"></i></a>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name}} {{ Auth::user()->paterno}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">cerrar</button>
                      </form>         
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>

      
     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/avatar.png" alt="" class="img-circle">
            </div>
            <div class="pull-left info">
              <span>{{ Auth::user()->name}} {{ Auth::user()->paterno}}</span>     
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACIÓN</li>
            <li class="treeview">
              <a href="{{ route('fiemec')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span> Panel de Control</span>
              </a>
            </li>
            <!--
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
          -->
            <li class="treeview">
              <a href="#">
                <i class="fas fa-dolly"></i>
                 <span>Productos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @if(Auth::user()->idCargo==1)
                <li><a href="{{ route('producto')}}"><i class="fas fa-circle-notch"></i> Albalex Electric </a></li>
                @endif
                <li><a href="{{ route('catalogo')}}"><i class="fas fa-circle-notch"></i> Catálogo</a></li>
                @if(Auth::user()->idCargo==1)
                <li><a href="{{ route('productobandejas')}}"><i class="fas fa-circle-notch"></i> Accesorios Albalex Electric</a></li>
                @endif
              </ul>
            </li>            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-powerpoint"></i>
                <span>Proforma</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('proforma')}}"><i class="fas fa-circle-notch"></i> Proforma Unitaria</a></li>
                <li><a href="{{ route('tablero')}}"><i class="fas fa-circle-notch"></i> Tableros</a></li>
                <li><a href="{{ route('servicio')}}"><i class="fas fa-circle-notch"></i> Servicios</a></li>
                <li><a href="{{ route('bandejas')}}"><i class="fas fa-circle-notch"></i> Bandejas</a></li>
              </ul>
            </li>
            @if(Auth::user()->idCargo==1)
            <li class="treeview">
              <a href="#">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('clientes')}}"><i class="fas fa-circle-notch"></i> Cliente</a></li>
                <li><a href="{{ url('proforma/representante')}}"><i class="fas fa-circle-notch"></i> Representante</a></li>
                
              </ul>
            </li>
            @endif
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-clipboard-list"></i>
                <span>Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fas fa-circle-notch"></i> Usuarios</a></li>
                <li><a href="ventas/cliente"><i class="fas fa-circle-notch"></i> Clientes</a></li>
                <li><a href="ventas/cliente"><i class="fas fa-circle-notch"></i> Proforma de Productos</a></li>
                <li><a href="ventas/cliente"><i class="fas fa-circle-notch"></i> Proforma de Servicios</a></li>
                <li><a href="{{ route('tablero')}}"><i class="fas fa-circle-notch"></i> Proforma de Tableros</a></li>
              </ul>
            </li>
               --> 
               @if(Auth::user()->idCargo==1)       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('empleado')}}"><i class="fas fa-circle-notch"></i> Usuarios</a></li>
                
              </ul>
            </li>
            @endif
           @if(Auth::user()->idCargo==1)
             <li>
              <a href="{{route('ajustes')}}">
                <i class="far fa-sun"></i> <span>Ajustes</span>
              </a>
            </li>
             @endif 
            <li>
              <a href="{{ route('inventarios')}}">
                <i class="fa fa-info-circle"></i> <span>Inventario</span>
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
          <b>Version</b> 1.0
        </div>
        <strong>
          <span class="pi-header-block pi-header-block-txt">
            <script type="text/javascript">
              copyright=new Date();
              update=copyright.getFullYear();
              document.write("  © Copyright –  Albalex Electric con Mantis Code 2019 - " + update + " " );
            </script> 
          </span>
        </strong> All rights reserved.
      </footer>

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
                          "paging":   false,
                          "info":     false,


                         "tableTools": {
                             "sRowSelect": "multi",
                             "aButtons": [
                                 {
                                     "sExtends": "select_none",
                                     "sButtonText": "Borrar selección"
                                 }]
                         },
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

