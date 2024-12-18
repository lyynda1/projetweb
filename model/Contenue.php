<?php 


class contenue
{
    private int $id;
    private string $path;
    private string $description;
    private int $id_formation;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of id_formation
     */ 
    public function getId_formation()
    {
        return $this->id_formation;
    }

    /**
     * Set the value of id_formation
     *
     * @return  self
     */ 
    public function setId_formation($id_formation)
    {
        $this->id_formation = $id_formation;

        return $this;
    }
}