<?php 

namespace App\Services;
use App\Repositories\ProductRepositoryInterface;

class ProductService 
{
    private $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    // AQUI FAZ A VALIDAÇÃO DOS DADOS EX: O VALIDADE
    public function store(array $data)
    {
        
        $file = $data['image'];

        if($file) {
            $nameFile = $file->getClientOriginalName();
            $file = $file->storeAs('products', $nameFile);
            $data['image'] = $file;
        }

        return $this->repo->store($data);
       
        // if($file) 
        // {
        //     foreach ($images as  $image) 
        //     {
        //         $nameFile = $image->getClientOriginalName();

        //         $files = $image->storeAs('products', $nameFile);
        //         $list[] = $files;
        //     }
        //     return $list;
        // }
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
        return $this->repo->destroy($id);
    }
}

?>