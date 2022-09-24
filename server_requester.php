<?php

if (isset($_GET['f']))
{
	$f = $_GET['f'];
	
	if ($f == 'replay_auth')
	{
		// Manager auth.
		$manager_ids = array(
			'Frank:' => 1,
			'Loopish:' => 172,
		);
		$manager_cookies = array(
			'Frank:' => "41a4957a55d749d59c6fe048bfee513a",
			'Loopish:' => "25b3dfc270cb4c7b9dc792333dd93c9d",
		);

		$login = $_POST['login'];
		$response = array(
			"server_id" => $manager_ids[$login],
            "official" => 1, // if not official, it's considered to be un-authorized.
            "session" => $manager_cookies[$login],
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
			'Frank:1' => 931,
			'Loopish:1' => 932,
		);
		$server_cookies = array(
			'Frank:1' => "41a4957a55d749d59c6fe048bfee513a",
			'Loopish:1' => "25b3dfc270cb4c7b9dc792333dd93c9d",
		);

		$login = $_POST['login'];
		$response = array(
			"server_id" => $server_ids[$login],
            "session" => $server_cookies[$login],
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
