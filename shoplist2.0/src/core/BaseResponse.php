<?php

namespace Core;

use App\Einkauf\Shop\Repository\MainSettingsRepository AS Shop;
use App\Einkauf\Category\Repository\MainSettingsRepository AS Cat;
use Config\AppConfig;
use Foundation\Bootstrap\FlashMessage;

class BaseResponse
{
    private string $content;
    private string $title;
    private string $contentPath;
    private array $output = [];

    public function setContentTemplate($class, $content, $title = "")
    {
        $this->title = ($title == "") ? AppConfig::get('default_site_title') : $title;

        $class = strstr($class, 'Service', TRUE);
        $class .= "Response" . "\\";
        $this->contentPath = str_replace("\\", "/", $class);
        $this->content = $content;
    }

    public function __set(string|array $name, string|array $value): void
    {
        $this->output[$name] = $value;
    }

    public function __get($name): string|array
    {
        return $this->output[$name];
    }

    public function render(): void
    {
        extract($this->output);

        ob_start();

        $fullPath = SRC . DS . $this->contentPath . $this->content . ".phtml";

        if (file_exists($fullPath)) {
            include($fullPath);
        } else {
            echo "<br /><b>Fehler:</b> Content wurde nicht gefunden";
            #ToDo Weiterleitung auf Error;
        }
    }

    public function renderPart(string $name): void
    {
        if ($name == 'Navigation') {
            $this->__set('navigationInformation', $this->getNavigationInformation());
        }
        $fullPath = SRC . DS . 'app' . DS . 'Response' . DS . $name . '.phtml';
        if (file_exists($fullPath)) {
            include($fullPath);
        } else {
            echo "<br /><b>Fehler:</b> Part wurde nicht gefunden";
            #ToDo Weiterleitung auf Error;
        }
    }

    public function displayMSG(): void
    {
        foreach (FlashMessage::get() as $key => $values) {
            echo '<div id=flash-container>';
            foreach ($values as $value) {
                require SRC . DS . 'app' . DS . 'Response' . DS . 'flash.phtml';
            }
            echo "</div>";
        }
        FlashMessage::delete();
    }

    public function getNavigationInformation(): array
    {
        //EinkaufShop
        $repository = new Shop();
        $result = $repository->getAll();
        foreach ($result as $value) {
            $return['shop'][] = [
                'id' => $value->getId(),
                'name' => $value->getName()
            ];
        }
        $repository = new Cat;
        $result = $repository->getAll();
        foreach ($result as $value) {
            $return['cat'][] = [
                'id' => $value->getId(),
                'name' => $value->getName()
            ];
        }
        return $return;
    }

}
