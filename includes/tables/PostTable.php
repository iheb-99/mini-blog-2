<?php

class PostTable
{
    protected $table = 'posts';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
    $sth = $this->db->prepare("SELECT * FROM {$this->table} where id=:id");
	$sth->bindParam(':id', $post->getID());
	$result = $sth->fetch();
	$post = new Post();
	$post->setTitle($result['title']);
	$post->setContent($result['content']);
	$post->setID($result['id']);
	$post->setid_cat($result['id_cat']);
	return $post;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT p.id as id, p.title as title, content, id_cat, c.title as cat_title FROM posts as p, categorie as c WHERE id_cat = c.id");
        return $sth->fetchAll();
    }

    public function create(Post $post): void
    {
		var_dump($post);
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content, id_cat) VALUES (:title, :content, :id_cat)");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
		$sth->bindParam(':id_cat', $post->getid_cat());
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    public function update(Post $post,int $id): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} set title= :title, content= :content, id_cat=:id_cat WHERE id = :id");
        $sth->bindParam(':title', $post->getTitle());
	$sth->bindParam(':id', $id);
        $sth->bindParam(':content', $post->getContent());
		$sth->bindParam(':id_cat', $post->getid_cat());
        $result = $sth->execute();
	if (!$result) {
            throw new Exception("Error during updating with the table {$this->table}");
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
