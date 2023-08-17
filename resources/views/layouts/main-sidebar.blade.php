<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(4, 35, 6);">
    <a href="#" class="brand-link" style="background-color: rgb(4, 35, 6)">
      <span class="brand-text font-weight">Courriers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>

        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item menu-open">
                <a href="{{ url ('dashboard')}}" class="nav-link active">
                <i class="nav-icon fas fa-solid fa-landmark"></i>

                  <p>
                 Accueil
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas bi bi-link"></i>
                  <p>
                  Gestion des Pieces Jointes
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url ('pieceJointes')}}" >
                        <i class="bi bi-list"></i>
                      <p> Liste des Pieces Jointes</p>
                    </a>
                  </li>
                </ul>
          
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas bi bi-link"></i>
                  <p>
                  Gestion des Services
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url ('services')}}" >
                        <i class="bi bi-list"></i>
                      <p> Liste des services</p>
                    </a>
                  </li>
                </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas bi bi-link"></i>
                      <p>
                      Gestion des Courriers
                        <i class="fas fa-angle-left right"></i>
    
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a class="nav-link " href="{{ url ('courrierEnvs')}}" >
                            <i class="bi bi-list"></i>
                          <p> Courriers Entrants</p>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a class="nav-link " href="{{ url ('courrierRecus')}}" >
                              <i class="bi bi-list"></i>
                            <p> Courriers Sortants</p>
                          </a>
                        </li>
                      </ul>
           

                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas bi bi-link"></i>
                          <p>
                          Gestion des Courriers Archivés
                            <i class="fas fa-angle-left right"></i>
        
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a class="nav-link " href="{{ url ('archiveCourrierEnvs')}}" >
                                <i class="bi bi-list"></i>
                              <p>Archive Courriers Entrants</p>
                            </a>
                          </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a class="nav-link " href="{{ url ('archiveCourrierRecus')}}" >
                                  <i class="bi bi-list"></i>
                                <p>Archive Courriers Sortants</p>
                              </a>
                            </li>
                          </ul>
                     
    
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas bi bi-link"></i>
                              <p>
                              Gestion des type de Courriers 
                                <i class="fas fa-angle-left right"></i>
            
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a class="nav-link " href="{{ url ('typeCourriers')}}" >
                                    <i class="bi bi-list"></i>
                                  <p>Liste des type de courriers</p>
                                </a>
                              </li>
                            </ul>

       <!--   <li class="nav-item">
            <a class="nav-link fas fa-power-off" href="{{ route('logout') }}"


            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}

         </a>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>
        -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
