<? class Comment extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_messages';
    private $paging = 10;
    
    function get_data(){
        return self::paginate($this->paging);
    }
    
   function filter($filter){
        return $this->where('name','like','%'.$filter.'%')->paginate($this->paging);
    }
    
    function edit($id){
        return $this->where('id',$id)->get();
    }
    
    function change_status($id,$status){
        $article    = self::find($id);
        if($status == 1){
            $article->status = 0;
        }
        if($status == 0){
            $article->status = 1;
        }
        
        $save = $article->update();
        if($save){
            $response = "success";
        }else{
            $response = "failed";
        }
        
        return $response;
    }
    
    function hapus($input){
        $this->whereIn('id',$input)->delete();
    }
}
