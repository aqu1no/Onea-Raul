<?php

namespace Repository;

interface Interface_repository {
    public function load($id);
    public function save($entity);
    public function loadAll();
    public function search($id);
}
