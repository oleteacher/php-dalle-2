<?php
if (isset($_POST['submit'])) {
  $prompt = $_POST['prompt'];
  $num_images = $_POST['num-images'];
  $image_size = $_POST['image-size'];

  $url = 'https://api.openai.com/v1/images/generations';

  $api_key = 'sk-YOUR-KEY-HERE';
  
  $data = array(
    'model' => 'image-alpha-001',
    'prompt' => $prompt,
    'num_images' => (int)$num_images,
    'size' => $image_size
  );
  $data_string = json_encode($data);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
));

  $result = curl_exec($ch);
  curl_close($ch);

  $response = json_decode($result, true);
  $images = $response['data'];

if (is_array($images)) {
	echo '<form method="post">';
	foreach ($images as $index => $image) {
	echo '<div>
	<img src="' . $image['url'] . '">
	<label for="image-' . $index . '">Download Image</label>
	<input type="checkbox" name="images[]" id="image-' . $index . '" value="' . $image['url'] . '">
	</div>';
	}
	echo '<button type="submit" name="download">Download Selected Images</button>
	</form>';
	} else {
	echo 'No images found.';
	}

	if (isset($_POST['download'])) {
	$images = $_POST['images'];
	if (is_array($images)) {
	foreach ($images as $image) {
	$filename = basename($image);
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	readfile($image);
			}
		}
	}
}
?>
<p><a href="demo.php">return</a></p>
