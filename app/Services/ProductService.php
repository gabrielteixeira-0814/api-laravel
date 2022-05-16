<?php 
    namespace App\Services;


class ProductService 
{
    private $repo;

    public function __construct(repo $repo)
    {
        $this->repo = $repo;
    }

    // AQUI FAZ A VALIDAÇÃO DOS DADOS EX: O VALIDADE
    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update(array $data, $id)
    {
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy();
    }
}









?>