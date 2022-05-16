<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // AQUI FAZ A CONEXAO COM O BANCO OU COM A API QUE VOCÊ DESEJA PUXA OS DADOS
    // EX: METODO QU PODERIA ESTA ENVIANDO OU PEGANDO ALGO DA API
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}

?>