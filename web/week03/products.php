<?php
    class Product {
        public $price;
        public $imagelink;
        public $desc;
        public $title;
        public static $count=0;

        public function __construct($price, $imagelink, $desc, $title)
        {
            $this->price= $price;
            $this->imagelink= $imagelink;
            $this->desc= $desc;
            $this->title= $title;
            cars::$count++;
            return true;
        }
    }

    $light = new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light");

    $hub = new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub");

    $alexa = new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa");
 

?>