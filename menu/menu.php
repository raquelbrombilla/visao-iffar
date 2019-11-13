<div class="header_area">
		<div class="sub_header">
	        <div class="container">
	            <div class="row ">
	                  <div class="col-2 col-md-6 col-xl-6 col-sm-2 justify-content-start">
	                      <div id="logo">
	                          <a href="index.php"><img src="menu/icon.png" width="145" height="40"></a>
	                      </div>
	                  </div>

	                  <div class="col-10 col-md-6 col-xl-6 col-sm-10 d-flex justify-content-end">
	                    	<div id="divBusca">
							  <input type="text" id="txtBusca" placeholder="Buscar..."/>
							  <img src="menu/barra.png" width="25px" alt="Buscar..." id="btnBusca"/>
								
							</div>
							<?php
									if (!isset($_SESSION['id_usuario'])) {
										echo "<button><a href='/Visao-IFFar/login.php'>Login</a></button>";
									} else {
										echo "<button><a href='/Visao-IFFar/logout.php'>Logout</a></button>";
									}	

								?>
						</div>	            
					</div>
	        </div>
	        				
	        				
	    </div>
	    <div class="main_menu">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <nav class="navbar navbar-expand-lg navbar-light">
	                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                                <i class="ti-menu"></i>
	                            </button>

	                            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
	                                <ul class="navbar-nav">
	                                    <li class="nav-item active">
	                                        <a class="nav-link active" href="/Visao-IFFar/index.php">Home</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a href="/Visao-IFFar/admin/sobre.php" class="nav-link">Sobre</a>
	                                    </li>
	                                     <li class="nav-item dropdown">
	                                        <a class="nav-link dropdown-toggle" href="/Visao-IFFar/publicacoes.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                            Publicações
	                                        </a>
	                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	                                            <a class="dropdown-item" href="/Visao-IFFar/publicacoes.php">Visualizar</a>
	                                            <a class="dropdown-item" href="/Visao-IFFar/cadastro_publicacao.php">Cadastrar</a>
	                                        </div>
	                                    </li>
	                           
	                                    <li class="nav-item">
	                                        <a href="/Visao-IFFar/galeria.php" class="nav-link">Galeria</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a href="/Visao-IFFar/admin/contato.php" class="nav-link">Contato</a>
	                                    </li>

	                                    <?php

	                                    	if (isset($_SESSION['id_usuario'])) {
	                                    		if ($_SESSION['admin'] == 1) {
		                                    		 echo "<li class='nav-item dropdown'>
		                                        		<a class='nav-link dropdown-toggle' href='/Visao-IFFar/user/perfil.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		                                            Administrador
				                                        </a>
				                                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				                                            <a class='dropdown-item' href='/Visao-IFFar/perfil.php'>Meu perfil</a>
				                                            <a class='dropdown-item' href='/Visao-IFFar/user/publicacao.php'>Minhas publicações</a>
				                                            <a class='dropdown-item' href='/Visao-IFFar/admin/solicitacoes.php'>Solicitações</a>
				                                            <a class='dropdown-item' href='/Visao-IFFar/cadastro_publicacao.php'>Publicações</a>
				                                             <a class='dropdown-item' href='/Visao-IFFar/admin/usuarios.php'>Usuários</a>
				                                        </div>
				                                    </li>";
	                                    		} else {
	                                    			echo "<li class='nav-item dropdown'>
		                                        		<a class='nav-link dropdown-toggle' href='/Visao-IFFar/user/perfil.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		                                            Meu perfil
				                                        </a>
				                                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				                                            <a class='dropdown-item' href='/Visao-IFFar/perfil.php'>Meu perfil</a>
				                                            <a class='dropdown-item' href='/Visao-IFFar/user/publicacao.php'>Minhas publicações</a>
				                                        </div>
				                                    </li>";
	                                    		}
	                                    	}
	                                    	
	                                    ?>

	                                </ul>
	                            </div>
	                        </nav>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>