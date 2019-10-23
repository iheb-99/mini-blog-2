<?php

class Post
{
    private $id;
    private $title;
    private $content;
	private $id_cat;
    
    public function getID(): int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
	public function getid_cat(): int
    {
        return $this->id_cat;
    }

    public function setid_cat(int $id_cat): self
    {
        $this->id_cat = $id_cat;
        return $this;
    }
}
