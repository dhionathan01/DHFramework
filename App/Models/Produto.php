<? 
    namespace App\Models;

    use DHF\Model\Model;

    class Produto extends Model{

        public function getProdutos(){
            $query="SELECT 
                        id, 
                        descricao,
                        preco
                    FROM 
                        tb_produtos";
                
            return $this->db->query($query)->fetchAll();
        }
    }
?>