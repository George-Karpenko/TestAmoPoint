<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = run();
}


function run()
{
  if (!save_file()) {
    return [
      'status' => 'error'
    ];
  }
  $current = read_file();

  $explode_character = $_POST['explode_character'] ? $_POST['explode_character'] : PHP_EOL;
  $array = explode($explode_character, $current);

  $view = [];

  foreach ($array as $value) {
    $col = strlen(preg_replace("/[^0-9]/", '', $value));
    $view[] = "$value = $col";
  }

  return [
    'status' => 'success',
    'view' => $view,
  ];
}

function read_file()
{
  return file_get_contents(basename($_FILES['userfile']['name']));
}

function save_file()
{
  if ($_FILES) {
    $uploaddir = dirname(__FILE__);

    $uploadfile = $uploaddir  . '/files/' . basename($_FILES['userfile']['name']);

    $file_name = $_FILES['userfile']['name'];
    $tmp = explode('.', $file_name);
    $file_extension = end($tmp);
    if (strtolower($file_extension) === 'txt' && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
      return true;
    }
  }
  return false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="/src/assets/css.css" rel="stylesheet">
</head>

<body>
  <main class="container">
    <div class="row">
      <form enctype="multipart/form-data" action="/" method="POST" class="form">
        <!-- Поле MAX_FILE_SIZE требуется указывать перед полем загрузки файла -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Название элемента input определяет название элемента в суперглобальном массиве $_FILES -->
        <div class="form-floating">
          <label>Отправить файл:</label>
          <input name="userfile" type="file" accept=".txt" />
        </div>
        <div class="form-floating">
          <label>Символ для разделения, без него будет перенос строки</label>
          <input name='explode_character' type="text" maxlength="1" />
        </div>
        <input type="submit" value="Отправить файл" />
      </form>
      <?php
      if (!empty($data) && array_key_exists('status', $data)) {
      ?>
        <div class="<?php echo ($data['status']) ?>"></div>
      <?php
      }
      ?>
    </div>

    <?php
    if (!empty($data) && array_key_exists('view', $data)) {
      foreach ($data['view'] as $key => $value) {
        echo ($value);
        echo ('<br>');
      }
    }
    ?>
  </main>
</body>

</html>