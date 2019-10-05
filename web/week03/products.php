<?php
    class Product {
        public $price;
        public $imagelink;
        public $desc;
        public $title;
    }

    $light = new Product();
    $light->price = 20;
    $light->imagelink = 'light.jpg';
    $light->desc = "The best light for your new Smart Home!";
    $light->title = "Smart Home Light";

    $hub = new Product();
    $hub->price = 30;
    $hub->imagelink = 'hub.jpg';
    $hub->desc = "Google's Hub with Google Assistant will give you the control you want for your Smart Home";
    $hub->title = "Google Hub";

    $alexa = new Product();
    $alexa->price = 30;
    $alexa->imagelink = 'alexa.jpg';
    $alexa->desc = "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*";
    $alexa->title = "Amazon Alexa";

?>