<? class Contact extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_contact';
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
    
    function hapus($input){
        $this->whereIn('id',$input)->delete();
    }
}
