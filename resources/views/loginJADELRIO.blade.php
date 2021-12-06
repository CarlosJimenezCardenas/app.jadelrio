<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JA DEL RIO - Cotizador</title>

        <!-- CSS -->		
		<link rel="stylesheet" href="./css/login.css" type="text/css" media="all" />  
	</head>
	<body>
		<form method="post" action="loginJADELRIO">
			@csrf		
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-body">
			        <div class="column" id="main">	
			        	<center>
			        		<img src="../images/logo4.png" width="200px" height="100px">
						</center>
						</br></br></br>
			          <form>
			            <div class="form-group">
							<table>
								<tr>
									<td><span class='textoLogin'>Email</span></td>
									<td><input class='inputLogin' type="email" id="email" name="email" aria-describedby="emailHelp" placeholder="E-mail"></td>
								</tr>
								<tr>
									<td><span class='textoLogin'>Password</span></td>
									<td>
										<input class='inputLogin' type="password" id="password" name="password" placeholder="Password">
									</td>
								</tr>
							</table>			              
						</div>
						</br>
			            <button type="submit" class="btn btn-primary"><span class='textoBotonIngresa'>Ingresar</span></button>
			          </form>
			        </div>
			        <div>
			          <?xml version="1.0" encoding="UTF-8"?>
			          <svg width="67px" height="578px" viewBox="0 0 67 578" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
			              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			                   <path d="M11.3847656,-5.68434189e-14 C-7.44726562,36.7213542 5.14322917,126.757812 49.15625,270.109375 C70.9827986,341.199016 54.8877465,443.829224 0.87109375,578 L67,578 L67,-5.68434189e-14 L11.3847656,-5.68434189e-14 Z" id="Path" fill="#B51640"></path>
			              </g>
			          </svg>
			        </div>
			        <div class="column" id="secondary">
			          <div class="sec-content">
			          	<a href="{{ url('/home') }}" class="letraHeader">Home</a>
			            <h2>Balance • Ethics • Certainty</h2>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
		<!-- Start of HubSpot Embed Code -->
		<!--<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/9299534.js"></script>-->
		<!-- End of HubSpot Embed Code -->
	</body>
</html>