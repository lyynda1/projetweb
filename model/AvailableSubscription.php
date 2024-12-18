<?php 
include_once("../../Config.php");

//require_once $_SERVER['DOCUMENT_ROOT'] . '/subs_project/config.php';
require_once('../../controller/AvailableSubscriptionC.php');

class AvailableSubscription
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?float $price = null;
    private ?string $image_path	= null;

    public function __construct($id = null, $name, $description, $price, $image_path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image_path = $image_path;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getimage_path()
    {
        return $this->image_path;
    }
    public function setimage_path($image_path)
    {
        $this->image_path = $image_path;
        return $this;
    }
}
?>
