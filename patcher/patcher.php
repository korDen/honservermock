<?php

// can be either 4.10.1.0 or 4.10.1.4
$latest_version = "4.10.1.4";

file_put_contents('get.txt', json_encode($_GET));
file_put_contents('post.txt', json_encode($_POST));

if (isset($_POST['latest']))
{
	// only want latest version number and nothing else
	echo serialize(array('latest' => $latest_version));
	return;
}

$manifest_checksums = array(
	"4.10.1.0" => "aef6af7754a386219c88a6128cb9df4f8c1cb84d",
	"4.10.1.4" => "99739f4f51f6bc3df039ccc851ed429dea865d19",
);

$manifest_sizes = array(
	"4.10.1.0" => "322",
	"4.10.1.4" => "334",
);

$current_version = $_POST['current_version'];
$current_version_full = $current_version;
if (substr_count($current_version_full, '.') == 2)
{
	// 4.10.1 -> 4.10.1.0
	$current_version_full = $current_version_full . ".0";
}

$response = array(
	"0" => array(
        "url" => "http://kongor.online:555/patch/",
        "url2" => "http://kongor.online:555/patch/",
        "latest_version" => $latest_version,
        "latest_manifest_checksum" => $manifest_checksums[$latest_version],
        "latest_manifest_size" => $manifest_sizes[$latest_version],
    ),
    "version" => $latest_version,
    "current_version" => $current_version,
    "current_manifest_checksum" => $manifest_checksums[$current_version_full],
    "current_manifest_size" => $manifest_sizes[$current_version_full],
);

echo serialize($response);

?>
