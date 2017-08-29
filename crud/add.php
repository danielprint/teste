<html>
<head>
<title>Inscrição</title>
</head>

<body>
<?php
//adicionando conexão com banco de dados
include_once("config.php");



if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$tel =	mysqli_real_escape_string($mysqli, $_POST['tel']);
	$curso =	mysqli_real_escape_string($mysqli, $_POST['curso']);
	
	    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $age);
        // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    
     $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
     
        // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    
    
	// verificando se algum campo esta vazio
	if(empty($name) || empty($age) || empty($email) || empty($curso) || $idade < '18') {
				
		if(empty($name)) {
			echo "<font color='red'>Nome é obrigatório.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Data de nascimento é obrigatório.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>E-mail é obrigatório.</font><br/>";
		}
		
		if(empty($curso)) {
			echo "<font color='red'>Escolha um curso.</font><br/>";
		}
		
		if($idade < '18') {
			echo "<font color='red'>É necessário ser maior de idade</font><br/>";
		}
		
		//Voltando para pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// se todos os campos estão preenchidos, se da o cadastro.
			
		//inserindo resuldado no banco de dados	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email,tel,curso) VALUES('$name','$age','$email','$tel','$curso')");
		
		//mensagem de ok
		echo "<font color='green'>Inscrito!.";
		echo "<font color='green'>Parabens $name, você esta foi inscrito no curso de $curso.";
		echo "<br/><a href='../index.html'>Voltar</a>";
	}
}
?>
</body>
</html>
