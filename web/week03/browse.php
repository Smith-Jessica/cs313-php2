<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="week3.js"></script>
  <title>Browse Items</title>
</head>

<body>
  <h1>Shop Here</h1>
  <div class="container">
<?php
    class Collection 
    {
        private $items = array();
    
        public function addItem($obj, $key = null) {
                if ($key == null) {
                    $this->items[] = $obj;
                }
                else {
                    if (isset($this->items[$key])) {
                        return; //throw new KeyHasUseException("Key $key already in use."); -- can add this file later
                    }
                    else {
                        $this->items[$key] = $obj;
                    }
                }
        }
    
      /*  public function deleteItem($key) {
            if (isset($this->items[$key])) {
                unset($this->items[$key]);
            }
            else {
                throw new KeyInvalidException("Invalid key $key.");
            }
        } --can add this functionality later*/
    
        public function getItem($key) {
            if (isset($this->items[$key])) {
                return $this->items[$key];
            }
            else {
                return; //throw new KeyInvalidException("Invalid key $key.");
            }
        }
        public function keys() {
            return array_keys($this->items);
        }
        public function length() {
            return count($this->items);
        }
        
    }
    
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
  //  $y = new Product();
    $y = Collection::$allProducts->getItem($x);
 
  //  echo var_dump($y);

    /*  for($x = 0; $x < Collection::$allProducts.length(); $x++){
        // will need a for loop to instantiate $y and then probably need to delete it at the end of each iteration -- This is my backup plan if the below does not work. 
        //$y = $allProducts[$x];
        //echo var_dump($y);
        $y = new Product();
        $y = Collection::$allProducts.getItem($x);

        echo "<div class=\"card\" style=\"width:400px\">" .
            "<img class=\"card-img-top\" src= alt=\"Card image\" style=\"width:100%\">" .
            "<div class=\"card-body\">" .
              "<h4 class=\"card-title\">" . $y->title . "</h4>" .
              "<p class=\"card-text\">" . $y->desc . "</p>" .
              "<a href=\"" . $y->detailLink . "\" class=\"btn btn-primary\">See Profile</a>" .
            "</div> </div>";

    echo <<<EOT 
        <div class="card" style="width:400px">
        <img class="card-img-top" src= alt="Card image" style="width:100%">
        <div class="card-body">
        <h4 class="card-title">$y->title</h4>
        <p class="card-text">$y->desc</p>
        <a href="$y->detailLink" class="btn btn-primary">See Profile</a>
        </div> 
        </div>
    EOT;          
          unset($y);
      }
      */
  ?>
  </div>
</body>