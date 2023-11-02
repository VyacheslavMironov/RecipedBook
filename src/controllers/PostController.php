<?php

require_once 'vendor/autoload.php';
require_once 'src/repository/recipedsRepository.php';
require_once 'src/services/uploadFileService.php';

class PostController
{
    private RecipedsRepository $_repository;
    private UploadFileService $_service;

    public function __construct(RecipedsRepository $repository, UploadFileService $service)
    {

        $this->_repository = $repository;
        $this->_service = $service;
    }
    
    public function create()
    {
        return $this->_repository->create($_POST, [
            "image" => $this->_service->set_file($_FILES['image'])
        ]);
    }
}