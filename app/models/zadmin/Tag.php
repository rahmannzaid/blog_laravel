<? class Tag extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_tag';
    private $paging = 10;
    
    function get_data(){
        return self::paginate($this->paging);
    }
    
   function filter($filter){
        return $this->where('name','like','%'.$filter.'%')->paginate($this->paging);
    }
    
    function get_all(){
        return $this->where('prnt',0)->orderBy('name','asc')->get();
    }
    
    function add($input){
        $this->name = $input['tag'];
        $this->save();
    }
    
    function edit($id){
        return $this->where('id',$id)->get();
    }
    
    function simpan($input){
        $category   = self::find($input['id']);
        $category->name = $input['tag'];
        $category->update();
    }
    
    function hapus($input){
        $this->whereIn('id',$input)->delete();
    }
}
