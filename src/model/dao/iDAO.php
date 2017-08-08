<?php
namespace gsb_prospects\model\dao;

interface IDAO {
    function delete($object);
    function find($id);
    function findAll();
    function insert($object);
    function update($object);
}
?>