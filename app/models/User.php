<?php

namespace App\models;

class User
{
    private int $id;
    private string $name;
    private string $firstname;
    private string $realname;
    private string $user_dn;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the value of realname
     */ 
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * Get the value of user_dn
     */ 
    public function getUser_dn()
    {
        return $this->user_dn;
    }
}
