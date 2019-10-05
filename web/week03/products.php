<?php
include 'collections.php';
//product class
    class Product {
        public $price;
        public $imagelink;
        public $desc;
        public $title;
        public $detailLink;
        public static $count=0;

        public function __construct($price, $imagelink, $desc, $title, $detailLink)
        {
            $this->price= $price;
            $this->imagelink= $imagelink;
            $this->desc= $desc;
            $this->title= $title;
            $this->$detailLink = $detailLink;
            Product::$count++;
            return true;
        }
        public function _construct()
        {
            return true;
        }
    }

    $allProducts = new Collection();

    $allProducts->addItem(new Product(20, 'light.jpg', "The best light for your new Smart Home!", "Smart Home Light", 'light.php'), 0);
    $allProducts->addItem(new Product(30, 'hub.jpg', "Google's Hub with Google Assistant will give you the control you want for your Smart Home", "Google Hub", 'hub.php'), 1);
    $allProducts->addItem(new Product(30, 'alexa.jpg', "Amazon Alexa gives you complete control. Better than our competitors, who will remain nameless *cough*Google*cough*", "Amazon Alexa", 'alexa.php'), 2);


?>