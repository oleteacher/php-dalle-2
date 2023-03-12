<!DOCTYPE html>
<html>
<head>
    <title>DALL·E 2 Image Generator</title>
</head>
<body>
    <h1>DALL·E 2 Image Generator</h1>
    <form action="checkbox-download.php" method="post">
      <label for="prompt">Prompt:</label>
      <input type="text" name="prompt" id="prompt">
      <br>
      <label for="num-images">Number of Images:</label>
      <select name="num-images" id="num-images">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <br>
      <label for="image-size">Image Size:</label>
      <select name="image-size" id="image-size">
        <option value="256x256">256x256</option>
        <option value="512x512">512x512</option>
        <option value="1024x1024">1024x1024</option>
      </select>
      <br>
      <button type="submit" name="submit">Generate Images</button>
    </form>
  </body>
</html>
