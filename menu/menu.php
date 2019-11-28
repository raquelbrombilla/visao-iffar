<div class="header_area">
		<div class="sub_header">
	        <div class="container">
	            <div class="row ">
	                  <div class="col-12 col-md-4 col-xl-4 col-sm-4 d-flex mt-auto justify-content-xl-start justify-content-md-start justify-content-sm-start justify-content-lg-start justify-content-center align-content-center">
	                      <div id="logo">
	                          <a href="/Visao-IFFar/index.php"><img src="/Visao-IFFar/menu/icon.png" width="145" height="40"></a>
	                      </div>
	                  </div>

	                  <div class="col-12 col-md-8 col-xl-8 col-sm-8 d-flex justify-content-xl-end justify-content-md-end justify-content-sm-end justify-content-lg-end justify-content-center align-content-center">
	                    	<div id="divBusca">
	                    		<form method="POST" action="pesquisar_publicacoes.php">
							  	<input type="text" id="txtBusca" name="pesquisar" placeholder="Buscar...">
								<button type="submit" class="btnn"><img src='/Visao-IFFar/menu/barra.png' width='25px' id='btnBusca'></button>
 
<!-- 							  <input type="submit" value="<img src='/Visao-IFFar/menu/barra.png' width='25px' id='btnBusca'">
 -->
								</form>	
							</div>


							<div class="col-2 col-md-2 col-xl-2 col-sm-2">
							<?php
									if (!isset($_SESSION['id_usuario'])) {
										echo "<button class='btn botao-color'><a href='/Visao-IFFar/login.php' class='a-btn'>LOGIN</a></button>";
									} else {
										echo "<button class='btn botao-color'><a href='/Visao-IFFar/logout.php' class='a-btn'>LOGOUT</a></button>";
									}	

								?>
							</div>
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
	                                        <a class="nav-link dropdown-toggle" href="/Visao-IFFar/#publicacao" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                            Publicações
	                                        </a>
	                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	                                            <a class="dropdown-item" href="/Visao-IFFar/#publicacao">Visualizar</a>
	                                            <a class="dropdown-item" href="/Visao-IFFar/cadastro_publicacao.php">Cadastrar</a>
	                                            <?php
	                                            	if (isset($_SESSION['id_usuario'])) 		{
	                                            		echo '<a class="dropdown-item" href="/Visao-IFFar/user/publicacao.php">Minhas publicações</a>';
	                                            	}
	                                           
	                                            ?>
	                                        </div>
	                                    </li>
	                                    
	                                    <?php

	                                    	if (isset($_SESSION['id_usuario'])) {
	                                    		if ($_SESSION['admin'] == 1) {
		                                    		 echo "<li class='nav-item dropdown'>
		                                        		<a class='nav-link dropdown-toggle' href='/Visao-IFFar/perfil.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		                                            Administrador
				                                        </a>
				                                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				                                            <a class='dropdown-item' href='/Visao-IFFar/perfil.php'>Meu perfil</a>
				                                            <a class='dropdown-item' href='/Visao-IFFar/admin/solicitacoes.php'>Solicitações</a>
				                                             <a class='dropdown-item' href='/Visao-IFFar/admin/usuarios.php'>Usuários</a>
				                                        </div>
				                                    </li>";
	                                    		} else {
	                                    			echo "
	                                    			<li class='nav-item'>
				                                        <a class='nav-link' href='/Visao-IFFar/perfil.php'>Meu perfil</a>
				                                    </li> ";
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