<?php

if (isset($_GET['f']))
{
	$f = $_GET['f'];

	$id = 1; // use either 1 or 172.
	$cookies = array(
		1 => "41a4957a55d749d59c6fe048bfee513a",
		172 => "25b3dfc270cb4c7b9dc792333dd93c9d",
	);
	
	if ($f == 'replay_auth')
	{
		// Manager auth.
		$response = array(
			"server_id" => $id,
            "official" => 1, // if not official, it's considered to be un-authorized.
            "session" => $cookies[$id],
			"chat_address" => "kongor.online",
            "chat_port" => 11033,
		);

		echo serialize($response);
		return;
	}

	if ($f == 'new_session')
	{
		// dedicated auth.
		$server_ids = array(
			1 => 931,
			172 => 932,
		);

		$response = array(
			"server_id" => $server_ids[$id],
            "session" => $cookies[$id],
			"chat_address" => "kongor.online",
            "chat_port" => 11032,
            "leaverthreshold" => 0.05,
		);

		echo serialize($response);
		return;
	}

	// Unknown request.
	die();
}

?>
