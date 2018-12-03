<?php

class Images extends Model {

    /**
     * @description Upload images
     * @return array $images
     */
    public static function upload($file_name, $file_dest){
        $db = Database::getInstance();
        
        $sql = $db->prepare("insert into images_meme (
                                name,
                                url) values (
                                :name,
                                :url)"
        );

        $sql->bindValue(':name', $file_name, PDO::PARAM_STR);
        $sql->bindValue(':url', $file_dest, PDO::PARAM_STR);
        $sql->execute();

        return true;
    }


  /* Recuperer la dernière image uploadée dans la BDD  */

    public static function getImage(){
        
        $db = Database::getInstance();
        $sql = "SELECT `NAME` FROM `images_meme` ORDER BY id DESC LIMIT 0,1";

        $image = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $image;
    }

     /* Recuperer toutes les images par défault  */
    public static function getAllImageDefault(){
        
        $db = Database::getInstance();
        $sql = "SELECT * FROM `images_default`";

        $imagedefault = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $imagedefault;
    }

 /* Recuperer l'image par default sélectionnée  */
 public static function getImageDefault($id_imagedefault){
    $db = Database::getInstance();
    $sql = $db->prepare("select * from images_default
                         where id = :id");
    $sql->bindValue(':id', $id_imagedefault, PDO::PARAM_INT);
    $sql->execute();

    $imagedefault = $sql->fetch(PDO::FETCH_ASSOC); 

    return $imagedefault;
}


    

}

    ?>