<?php
	if( isset($_POST["Text_Apellido_paterno_Registro"]) &&
		isset($_POST["Text_Apellido_materno_Registro"]) &&
		isset($_POST["Text_Nombre(s)_Registro"]) &&
		isset($_POST["Date_Fecha_de_Nacimiento_Registro"]) &&
		isset($_POST["Date_Fecha_de_Registro"]) &&
		isset($_POST["NAME_Radios"]) &&
		isset($_POST["Password_Contrasena_Registro"])
	){
		$Apellido_paterno=$_POST["Text_Apellido_paterno_Registro"];
		$Apellido_materno=$_POST["Text_Apellido_materno_Registro"];
		$Nombre=$_POST["Text_Nombre(s)_Registro"];
		$Fecha_de_nacimiento=$_POST["Date_Fecha_de_Nacimiento_Registro"];
		$Fecha_de_registro=$_POST["Date_Fecha_de_Registro"];
		$Radios=$_POST["NAME_Radios"];
		$Contrasena=$_POST["Password_Contrasena_Registro"];

		//Establecer conexión con php my admin
		function Conexion_BD(){
			$Establecer_Conexion = mysqli_connect("	127.0.0.1","root","","doña_bety_bd");
			if($Establecer_Conexion){
				echo "Se estableció la conexión";
			} //if
			else{
				echo "No se estableció la conexión<br><br>";
				echo ("<br><br>
				<div align='center'>
					<a href='Otras_paginas/Menu/Pagina_2/Formulario.html'><img width='80%' src='Error_1.png'></a>
				</div>");
			} //else
		}
		

		function Guardar_Usuario($Establecer_Conexion){

			global $Apellido_paterno,$Apellido_materno,$Nombre,$Fecha_de_nacimiento,$Fecha_de_registro,$Radios,$Contrasena;

			$Instruccion =
			"INSERT INTO empleados (Apellido_paterno,Apellido_materno,Nombre,Fecha_de_nacimiento,Fecha_de_registro,Tipo_de_acceso,Contrasena)
			VALUES
			('".$Apellido_paterno."',
			 '".$Apellido_materno."',
			 '".$Nombre."',
			 '".$Fecha_de_nacimiento."',
			 '".$Fecha_de_registro."',
			 '".$Radios."',
			 '".$Contrasena."'
			)";

			if (mysqli_query($Establecer_Conexion,$Instruccion)){
				echo "Mensaje_1: El usuario se guardó con éxito.";
				mysqli_close($Establecer_Conexion);//Se cierra la conexión a MySQL
			} //if
			else
			{
				echo "Error_2: No se guardaron los datos.";
				mysqli_close($Establecer_Conexion);//Se cierra la conexión a MySQL
			}
		
		} //Guardar_Usuario ()

	}
	else{
		echo "No llegaron los datos al servidor";
		echo ("<br><br>
		<div align='center'>
			<a href='Otras_paginas/Menu/Pagina_2/Formulario.html'><img width='80%' src='Error_1.png'></a>
		</div>");
	}
?>