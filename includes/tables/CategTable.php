<?php

class CategTable
{
    protected $table = 'categorie';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Categ
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} where id=:id");
	$sth->bindParam(':id', $post->getID());
	$result = $sth->fetch();
	$categ = new Categ();
	$categ->setTitle($result['title']);
	return $categ;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM categorie ");
        return $sth->fetchAll();
    }

    public function create(Categ $categ): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title) VALUES (:title)");
        $sth->bindParam(':title', $categ->getTitle());
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

	public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
	$sth->bindParam(':id', $id);
        $result = $sth->execute();
		if (!$result) {
            throw new Exception("Error during deleting with the table {$this->table}");
        }
    }

}
