<?php

class ImageRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllImages() {
        $stmt = $this->db->prepare("SELECT * FROM images ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addImage($imagePath) {
        $stmt = $this->db->prepare("INSERT INTO images (path) VALUES (:path)");
        $stmt->bindParam(':path', $imagePath);
        return $stmt->execute();
    }

    public function deleteImage($imageId) {
        $stmt = $this->db->prepare("DELETE FROM images WHERE id = :id");
        $stmt->bindParam(':id', $imageId);
        return $stmt->execute();
    }

    public function getImageById($imageId) {
        $stmt = $this->db->prepare("SELECT * FROM images WHERE id = :id");
        $stmt->bindParam(':id', $imageId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}