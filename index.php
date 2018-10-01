<?php

// Wanna see all PHP errors? Uncomment this
//ini_set('display_errors', '1');

// Set to 0 if you don't want to use the generator form to generate public multichats
$useGenerator = 1;

// Set all stream-variables to Twitch-Channelnames or YouTube-VideoIDs
// Set all streamType-variables to 0 if stream is live on Twitch and 1 if stream is live on YouTube
$stream1 = "rocketbeanstv";
$stream1Type = 0;
$stream2 = "monstersandexplosions";
$stream2Type = 0;
$stream3 = "2ccaHpy5Ewo";
$stream3Type = 1;

// That's all, you can modify any code starting here, but it's not necessary
$player1 = "";
$link1 = "";
$chat1 = "";

$player2 = "";
$link2 = "";
$chat2 = "";

$player3 = "";
$link3 = "";
$chat3 = "";

$chatonly = false;
$construt = false;
$size = sizeof($_GET);

if ($useGenerator == 1)
{
	if ($size == 1 && isset($_GET["chatonly"])) $size = 0;

	if ($size > 0)
	{
		if (isset($_GET["stream1"]))
		{
			try
			{
				$stream1Type = (int)substr($_GET["stream1"], 0, 1);
				$stream1 = substr($_GET["stream1"], 1);
			}
			catch (Exception $e)
			{
				$stream1 = "";
			}
		}
		else
		{
			$stream1 = "";
		}

		if (isset($_GET["stream2"]))
		{
			try
			{
				$stream2Type = (int)substr($_GET["stream2"], 0, 1);
				$stream2 = substr($_GET["stream2"], 1);
			}
			catch (Exception $e)
			{
				$stream2 = "";
			}
		}
		else
		{
			$stream2 = "";
		}

		if (isset($_GET["stream3"]))
		{
			try
			{
				$stream3Type = (int)substr($_GET["stream3"], 0, 1);
				$stream3 = substr($_GET["stream3"], 1);
			}
			catch (Exception $e)
			{
				$stream3 = "";
			}
		}
		else
		{
			$stream3 = "";
		}
	}
	else
	{
		$construt = true;
		echo "<center>Type in your stream-URLs (like 'https://www.twitch.tv/monstersandexplosions' or 'https://www.youtube.com/watch?v=2ccaHpy5Ewo'). Leave the input field blank, if you don't need more streams and press 'Generate':<br>";
		echo "<button onclick=\"constructMultistream(1)\">Generate (Chat-only)</button>";
		echo "<button onclick=\"constructMultistream(0)\">Generate (With video)</button><br><br></center>";

		$stream1Form = "<center>Stream 1: <input type=\"text\" name=\"stream1\" id=\"stream1\"></center>";

		$stream2Form = "<center>Stream 2: <input type=\"text\" name=\"stream1\" id=\"stream2\"></center>";

		$stream3Form = "<center>Stream 3: <input type=\"text\" name=\"stream1\" id=\"stream3\"></center>";
	}
}

if (isset($_GET["chatonly"]))
{
	$chatonly = true;
	$chatHeight = "100%";
}
else
{
	$chatonly = false;
	$chatHeight = "50%";
}

if ($stream1Type == 0)
{
	$player1 = "https://player.twitch.tv/?channel=" . $stream1;
	$link1 = "https://www.twitch.tv/" . $stream1;
	$chat1 = "https://www.twitch.tv/embed/" . $stream1 . "/chat?darkpopout";
}
else
{
	$player1 = "https://gaming.youtube.com/embed/" . $stream1 . "?autoplay=1";
	$link1 = "https://gaming.youtube.com/watch?v=" . $stream1;
	$chat1 = "https://gaming.youtube.com/live_chat?v=" . $stream1 . "&embed_domain=" . $_SERVER['HTTP_HOST'];
}

if ($stream2Type == 0)
{
	$player2 = "https://player.twitch.tv/?channel=" . $stream2;
	$link2 = "https://www.twitch.tv/" . $stream2;
	$chat2 = "https://www.twitch.tv/embed/" . $stream2 . "/chat?darkpopout";
}
else
{
	$player2 = "https://gaming.youtube.com/embed/" . $stream2 . "?autoplay=1";
	$link2 = "https://gaming.youtube.com/watch?v=" . $stream2;
	$chat2 = "https://gaming.youtube.com/live_chat?v=" . $stream2 . "&embed_domain=" . $_SERVER['HTTP_HOST'];
}

if ($stream3Type == 0)
{
	$player3 = "https://player.twitch.tv/?channel=" . $stream3;
	$link3 = "https://www.twitch.tv/" . $stream3;
	$chat3 = "https://www.twitch.tv/embed/" . $stream3 . "/chat?darkpopout";
}
else
{
	$player3 = "https://gaming.youtube.com/embed/" . $stream3 . "?autoplay=1";
	$link3 = "https://gaming.youtube.com/watch?v=" . $stream3;
	$chat3 = "https://gaming.youtube.com/live_chat?v=" . $stream3 . "&embed_domain=" . $_SERVER['HTTP_HOST'];
}

$count = 0;
if ($stream1 != "") $count++;
if ($stream2 != "") $count++;
if ($stream3 != "") $count++;
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">

<?php
echo "<div class=\"container-full\">";
echo "<div class=\"row\" style=\"height:100%\">";

if ($stream1 != "")
{
	echo "<div class=\"col\">";
	if ($construt == true) echo $stream1Form;
	if ($chatonly == false) echo "<iframe src=\"" . $player1 . "\" style=\"border: none; height: 50%; width: 100%;\" allowfullscreen=\"true\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link1 . "\">here</a>!</p></iframe>";
	echo "<iframe src=\"" . $chat1 . "\" style=\"border: none; height: " . $chatHeight . "; width: 100%;\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link1 . "\">here</a>!</p></iframe>";
	echo "</div>";
}

if ($stream2 != "")
{
	echo "<div class=\"col\">";
	if ($construt == true) echo $stream2Form;
	if ($chatonly == false) echo "<iframe src=\"" . $player2 . "\" style=\"border: none; height: 50%; width: 100%;\" allowfullscreen=\"true\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link2 . "\">here</a>!</p></iframe>";
	echo "<iframe src=\"" . $chat2 . "\" style=\"border: none; height: " . $chatHeight . "; width: 100%;\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link2 . "\">here</a>!</p></iframe>";
	echo "</div>";
}

if ($stream3 != "")
{
	echo "<div class=\"col\">";
	if ($construt == true) echo $stream3Form;
	if ($chatonly == false) echo "<iframe src=\"" . $player3 . "\" style=\"border: none; height: 50%; width: 100%;\" allowfullscreen=\"true\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link3 . "\">here</a>!</p></iframe>";
	echo "<iframe src=\"" . $chat3 . "\" style=\"border: none; height: " . $chatHeight . "; width: 100%;\"><p>Your browser does not support iFrames, check out the channel <a href=\"" . $link3 . "\">here</a>!</p></iframe>";
	echo "</div>";
}

echo "</div>";
echo "</div>";
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
function constructMultistream(chatonly)
{
	var stream1 = "";
	stream1 = $('#stream1').val();
	var stream2 = "";
	stream2 = $('#stream2').val();
	var stream3 = "";
	stream3 = $('#stream3').val();

	var url = "index.php";
	var count = 0;
	if (stream1 != "")
	{
		var stream1Type = 0;
		if (stream1.includes("youtube.com/watch?v=") === true)
		{
			stream1Type = 1;
			stream1 = stream1.split("youtube.com/watch?v=")[1];
		}
		if (stream1.includes("twitch.tv/") === true)
		{
			stream1Type = 0;
			stream1 = stream1.split("twitch.tv/")[1];
		}

		if (count == 0) url += "?";
		else url += "&"
		url += "stream1=";
		url += stream1Type;
		url += stream1;
		count++;
	}
	if (stream2 != "")
	{
		var stream2Type = 0;
		if (stream2.includes("youtube.com/watch?v=") === true)
		{
			stream2Type = 1;
			stream2 = stream2.split("youtube.com/watch?v=")[1];
		}
		if (stream2.includes("twitch.tv/") === true)
		{
			stream2Type = 0;
			stream2 = stream2.split("twitch.tv/")[1];
		}

		if (count == 0) url += "?";
		else url += "&"
		url += "stream2=";
		url += stream2Type;
		url += stream2;
		count++;
	}
	if (stream3 != "")
	{
		var stream3Type = 0;
		if (stream3.includes("youtube.com/watch?v=") === true)
		{
			stream3Type = 1;
			stream3 = stream3.split("youtube.com/watch?v=")[1];
		}
		if (stream3.includes("twitch.tv/") === true)
		{
			stream3Type = 0;
			stream3 = stream3.split("twitch.tv/")[1];
		}

		if (count == 0) url += "?";
		else url += "&"
		url += "stream3=";
		url += stream3Type;
		url += stream3;
		count++;
	}
	if (chatonly == true) url += "&chatonly=1"
	window.location = url;
}
</script>