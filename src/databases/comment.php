<?php
function addComment($userId, $movieId, $title, $review, $rating){
    $connexion=getConnexion();
    $sql = "INSERT INTO comments (user_id, movie_id, title, review, rating) VALUES (?, ?, ?, ?, ?)";
    $requetePDO=$connexion->prepare($sql);
    $requetePDO->bindParam(1, $userId);
    $requetePDO->bindParam(2, $movieId);
    $requetePDO->bindParam(3, $title);
    $requetePDO->bindParam(4, $review);
    $requetePDO->bindParam(5, $rating);
    $requetePDO->execute();
}

function getCommentsByMovieId($movieId){
    $connexion = getConnexion();
    $sql = "SELECT * FROM comments WHERE movie_id = ?";
    $requetePDO = $connexion->prepare($sql);
    $requetePDO->bindParam(1, $movieId);
    $requetePDO->execute();
    return $requetePDO->fetchAll(PDO::FETCH_ASSOC);
}
function getAverageRatingByMovieId($movieId){
    $connexion = getConnexion();
    $sql = "SELECT AVG(rating) as average_rating FROM comments WHERE movie_id = ?";
    $requetePDO = $connexion->prepare($sql);
    $requetePDO->bindParam(1, $movieId);
    $requetePDO->execute();
    $result = $requetePDO->fetch(PDO::FETCH_ASSOC);
    return $result['average_rating'];
}
function getCommentCountByMovieId($movieId){
    $connexion = getConnexion();
    $sql = "SELECT COUNT(*) as comment_count FROM comments WHERE movie_id = ?";
    $requetePDO = $connexion->prepare($sql);
    $requetePDO->bindParam(1, $movieId);
    $requetePDO->execute();
    $result = $requetePDO->fetch(PDO::FETCH_ASSOC);
    return $result['comment_count'];
}