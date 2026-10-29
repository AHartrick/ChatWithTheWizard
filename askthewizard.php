<?php

$message = '';

$cat = [
	'meow ',
	'z',
	'HISSSS!',
	'...?',
	'Mrroow~',
	'*grunt*',
	'*hacking*',
	'*snort*',
	'*chittering*',
	'prrrrr~',
	'*presents dead lizard*',
];

$random_answer = mt_rand (0, 10);
$random_amount = mt_rand (1, 8);

$bg = NULL;
$error = NULL;
$message = NULL;

$action = filter_input(INPUT_POST, 'action');

if ($action === 'ask_question') {
    $question = filter_input(INPUT_POST, 'question');

    if ($question == '') {
   	    $message = "You need to ask a question first.";
		
    } else{	
		$bg .= "<img src='/askthewizard/speech_bubble.jpg' alt='speech bubble' />";
	
		if ($random_answer == 0 || $random_answer == 1){
		$message = str_repeat($cat[$random_answer], $random_amount);
		$message .= '.';
		} else{
		$message = $cat[$random_answer];
		}
    }

}

?>

<!DOCTYPE html>
<html>
<style>

body {
	background-image: url('wizard.jpg');
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
	font-size: 1.5em;
	text-align: center;
}

body.ask {
	background-image: url('speech_bubble.jpg');
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}

.answer {
	position: fixed;
	width: 25%;
	top: 33%;
	right: 37%;	
}

button {
	border-radius: 12px;
	text-align: center;
}
	
	
.ask {
	position: fixed;
	top: 60%;
	left: 40%;
}

</style>
<body class="<?php echo ($bg != NULL) ? 'ask' : ''; ?>"> 

	<section class = "answer">
		<p> <?php echo $message ?> </p>
	</section>

	<section class = "ask">
		<div>
		<br>
		<form method = "POST" action = "">
			<textarea name = "question" rows = "5" cols = "40" placeholder = "ASK AND YOU SHALL RECIEVE"></textarea>
			<br>
			<button type = "submit" name = "action" value = "ask_question"> Ask. *</button>
		</form>	
		</div>
	</section>
	
</body>

</html>