<?php

namespace Models;

class MyDB
{
    /** @var \PDO  */
    private $db;
    public function __construct()
    {
        $this->db = new \PDO('sqlite:/' . __DIR__ . '/../db/mysqlitedb.db');
        $this->initTable();
    }
    public function initTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS `comment` (`user` VARCHAR(50), `email` VARCHAR(50), `comment` VARCHAR(255), `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP)';
        $this->db->exec($query);
    }
    public function insertComment($user, $email, $comment)
    {
        $query = $this->db->prepare('INSERT INTO `comment` (`user`, `email`, `comment`) VALUES (:user, :email, :comment)');
        $query->bindParam(':user', $user);
        $query->bindParam(':email', $email);
        $query->bindParam(':comment', $comment);
        $result = $query->execute();
        return $result;
    }
    public function loadAllComments()
    {
        return $this->db->query('SELECT * FROM `comment` ORDER BY `created_at` DESC')->fetchAll();
    }
}