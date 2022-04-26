<?php

namespace Models;

class NoteModel
{
    /**
     * @var \mysqli
     */
    protected $db;
    public function __construct()
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($db->connect_errno != 0){
            //TODO log
            throw new \Exception($db->connect_error,$db->connect_errno);
        }
    }

    /**
     * @return all notes
     * @return array|mixed
     */
    public function all(){
        $sql = "SELECT * FROM notes;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}