<?php
require("../../lib/database.php");
require("../../lib/validator.php");
class Page
{
	public static function header($title)
	{
		session_start();
		ini_set("date.timezone","America/El_Salvador");
		print("
			<!DOCTYPE html>
			<html lang='es'>
			<head>
				<meta charset='utf-8'>
				<title>Dashboard - $title</title>
				<link type='text/css' rel='stylesheet' href='../../css/materialize.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../css/sweetalert2.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../css/icons.css'/>
				<link type='text/css' rel='stylesheet' href='../css/dashboard.css'/>
				<script type='text/javascript' src='../../js/sweetalert2.min.js'></script>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			</head>
			<body>
		");
		if(isset($_SESSION['nombre_usuario']))
		{
			print("
				<header id='header' class='page-topbar'>
					<!-- start header nav-->
					<div class='navbar-fixed'>
						<nav class='navbar-color'>
							<div class='nav-wrapper'>
								<ul class='left'>                      
								<li><h1 class='logo-wrapper'><a href='index.html' class='brand-logo darken-1'><img src='images/materialize-logo.png' alt='materialize logo'></a> <span class='logo-text'>Materialize</span></h1></li>
								</ul>
								<div class='header-search-wrapper hide-on-med-and-down'>
									<i class='mdi-action-search'></i>
									<input type='text' name='Search' class='header-search-input z-depth-2' placeholder='Explore Materialize'/>
								</div>
								<ul class='right hide-on-med-and-down'>
									<li><a href='javascript:void(0);' class='waves-effect waves-block waves-light translation-button'  data-activates='translation-dropdown'><img src='images/flag-icons/United-States.png' alt='USA' /></a>
									</li>
									<li><a href='javascript:void(0);' class='waves-effect waves-block waves-light toggle-fullscreen'><i class='mdi-action-settings-overscan'></i></a>
									</li>
									<li><a href='javascript:void(0);' class='waves-effect waves-block waves-light notification-button' data-activates='notifications-dropdown'><i class='mdi-social-notifications'><small class='notification-badge'>5</small></i>
									
									</a>
									</li>                        
									<li><a href='app-email.html#' data-activates='chat-out' class='waves-effect waves-block waves-light chat-collapse'><i class='mdi-communication-chat'></i></a>
									</li>
								</ul>
								<!-- translation-button -->
								<ul id='translation-dropdown' class='dropdown-content'>
								<li>
									<a href='app-email.html#!'><img src='images/flag-icons/United-States.png' alt='English' />  <span class='language-select'>English</span></a>
								</li>
								<li>
									<a href='app-email.html#!'><img src='images/flag-icons/France.png' alt='French' />  <span class='language-select'>French</span></a>
								</li>
								<li>
									<a href='app-email.html#!'><img src='images/flag-icons/China.png' alt='Chinese' />  <span class='language-select'>Chinese</span></a>
								</li>
								<li>
									<a href='app-email.html#!'><img src='images/flag-icons/Germany.png' alt='German' />  <span class='language-select'>German</span></a>
								</li>
								
								</ul>
								<!-- notifications-dropdown -->
								<ul id='notifications-dropdown' class='dropdown-content'>
								<li>
									<h5>NOTIFICATIONS <span class='new badge'>5</span></h5>
								</li>
								<li class='divider'></li>
								<li>
									<a href='app-email.html#!'><i class='mdi-action-add-shopping-cart'></i> A new order has been placed!</a>
									<time class='media-meta' datetime='2015-06-12T20:50:48+08:00'>2 hours ago</time>
								</li>
								<li>
									<a href='app-email.html#!'><i class='mdi-action-stars'></i> Completed the task</a>
									<time class='media-meta' datetime='2015-06-12T20:50:48+08:00'>3 days ago</time>
								</li>
								<li>
									<a href='app-email.html#!'><i class='mdi-action-settings'></i> Settings updated</a>
									<time class='media-meta' datetime='2015-06-12T20:50:48+08:00'>4 days ago</time>
								</li>
								<li>
									<a href='app-email.html#!'><i class='mdi-editor-insert-invitation'></i> Director meeting started</a>
									<time class='media-meta' datetime='2015-06-12T20:50:48+08:00'>6 days ago</time>
								</li>
								<li>
									<a href='app-email.html#!'><i class='mdi-action-trending-up'></i> Generate monthly report</a>
									<time class='media-meta' datetime='2015-06-12T20:50:48+08:00'>1 week ago</time>
								</li>
								</ul>
							</div>
						</nav>
					</div>
					<!-- end header nav-->
			</header>
			");
		}
		else
		{
			print("
				<header class='navbar-fixed'>
					<nav class='brown'>
						<div class='nav-wrapper'>
							<a href='../main/' class='brand-logo'><i class='material-icons'>dashboard</i></a>
						</div>
					</nav>
				</header>
				<main class='container'>
			");
			$filename = basename($_SERVER['PHP_SELF']);
			if($filename != "login.php" && $filename != "register.php")
			{
				self::showMessage(3, "¡Debe iniciar sesión!", "../main/login.php");
				self::footer();
				exit;
			}
			else
			{
				print("<h3 class='center-align'>".$title."</h3>");
			}
		}
	}

	public static function footer()
	{
		print("
			</main>
			<footer class='page-footer brown'>
				<div class='container'>
					<div class='row'>
						<div class='col s12 m6'>
							<h5 class='white-text'>Dashboard</h5>
							<a class='white-text' href='mailto:dacasoft@outlook.com'><i class='material-icons left'>email</i>Ayuda</a>
						</div>
						<div class='col s12 m6'>
							<h5 class='white-text'>Enlaces</h5>
							<a class='white-text' href='../../public/' target='_blank'><i class='material-icons left'>store</i>Sitio público</a>
						</div>
					</div>
				</div>
				<div class='footer-copyright'>
					<div class='container'>
						<span>©".date(' Y ')."CoffeeCode, todos los derechos reservados.</span>
						<span class='white-text right'>Diseñado con <a class='red-text text-accent-1' href='http://materializecss.com/' target='_blank'><b>Materialize</b></a></span>
					</div>
				</div>
			</footer>
			<script type='text/javascript' src='../../js/jquery-2.1.1.min.js'></script>
			<script type='text/javascript' src='../../js/materialize.min.js'></script>
			<script type='text/javascript' src='../js/dashboard.js'></script>
			</body>
			</html>
		");
	}

	public static function setCombo($label, $name, $value, $query)
	{
		$data = Database::getRows($query, null);
		print("<select name='$name' required>");
		if($data != null)
		{
			if($value == null)
			{
				print("<option value='' disabled selected>Seleccione una opción</option>");
			}
			foreach($data as $row)
			{
				if(isset($_POST[$name]) == $row[0] || $value == $row[0])
				{
					print("<option value='$row[0]' selected>$row[1]</option>");
				}
				else
				{
					print("<option value='$row[0]'>$row[1]</option>");
				}
			}
		}
		else
		{
			print("<option value='' disabled selected>No hay registros</option>");
		}
		print("
			</select>
			<label>$label</label>
		");
	}

	public static function showMessage($type, $message, $url)
	{
		$text = addslashes($message);
		switch($type)
		{
			case 1:
				$title = "Éxito";
				$icon = "success";
				break;
			case 2:
				$title = "Error";
				$icon = "error";
				break;
			case 3:
				$title = "Advertencia";
				$icon = "warning";
				break;
			case 4:
				$title = "Aviso";
				$icon = "info";
		}
		if($url != null)
		{
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false}).then(function(){location.href = '$url'})</script>");
		}
		else
		{
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false})</script>");
		}
	}
}
?>