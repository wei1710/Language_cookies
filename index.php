<?php
require_once 'src/Classes/Language.php';

$lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';

if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'da'])) {
    $lang = $_GET['lang'];
    setcookie('language', $lang, time() + (60 * 60 * 24 * 30), "/");
    header("Location: index.php");
    exit;
}

$language = new Language($lang);
$texts = $language->readLanguage();
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title><?= $texts['title'] ?? 'Language' ?></title>
</head>
<body>

    <form id="languageForm">
        <label for="language">Choose Language:</label>
        <select id="language" name="lang">
            <option value="en" <?= $lang === 'en' ? 'selected' : '' ?>>English</option>
            <option value="da" <?= $lang === 'da' ? 'selected' : '' ?>>Dansk</option>
        </select>
    </form>

    <h1><?= $texts['title'] ?? '' ?></h1>
    <p><?= $texts['content'] ?? '' ?></p>

    <script src="assets/script.js"></script>

</body>
</html>