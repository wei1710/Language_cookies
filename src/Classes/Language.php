<?php

require_once 'src/Interfaces/ReadLanguage.php';

class Language implements ReadLanguage {
    private $language;
    private $defaultLanguage = 'en';

    public function __construct($language) {
        $this->language = in_array($language, ['en', 'da']) ? $language : $this->defaultLanguage;
    }

    public function readLanguage() {
        $filePath = "data/kea_{$this->language}.json";

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            return json_decode($jsonContent, true);
        }

        return [];
    }
}