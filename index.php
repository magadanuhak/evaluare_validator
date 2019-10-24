<?php

	require "vendor/autoload.php";

	$v = new Valitron\Validator($_POST);

	$v->rules([
	    'required' => [
	        ['name'],
	        ['email'],
	        ['password'],
	        ['password_confirmation']
	    ],
	    'equals' => [
	    	['password', 'password_confirmation']
	    ],
	    'numeric' => [
	        ['age']
	    ],
	     'lengthMin' => [
	        ['name', 3],
	        ['age', 1],
	        ['password', 10],
	        ['password_confirmation', 10]
	    ],
	    'lengthMax' =>[
	    	['name', 15],
	    	['password', 20],
	    	['password_confirmation', 20]
	    	
	    ],
	    'min' => [
	    	['age', 1]
	    ],
	    'max' => [
	    	['age', 100]
	    ],
	    'email' => [
	        ['email']
	    ],
	    'date' => [
        	['birthdate']
    	],
    	'integer' => [
    		['age']
    	],
		'regex' => [
			['phone', '/^((\+373)+([0-9]){8})$/']
		]
	
	]);
	

?>
<form method="POST">
	Nume:<input type="text" name="name"><br>
	Email:<input type="text" name="email"><br>
	Telefon:<input type="text" name="phone"><br>
	Virsta:<input type="number" name="age"><br>
	Parola:<input type="password" name="password"><br>
	Confirmare parola:<input type="password" name="password_confirmation"><br>
	Data nasterii:<input type="date" name="birthdate"><br>
	<input type="submit" value="Vezi">	
</form>
<?php 
	if($v->validate()) {
    echo "Totul a fost validat cu succes!";
	} else {
	    // Errors
	    foreach ($v->errors() as $key => $error) {
	    	?>
	    		<div class="error">
	    			<?=$key?> | <? 
	    							foreach($error as $err){
	    								echo $err." ";
	    							}
	    							?>
	    		</div>	
	    	 <?
	    }
	}
?>
<style>
	.error{
		background: red; color:white; padding:10px; border:solid 1px black; margin-top:5px;
	}
</style>