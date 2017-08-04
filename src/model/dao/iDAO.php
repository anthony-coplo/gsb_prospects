<?php
namespace gsb_prospects\model\dao;

interface iDAO {
    function delete($object);
    function find($id);
    function findAll();
    function insert($object);
    function update($object);
}
?>