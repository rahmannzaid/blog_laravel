<? class Category extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_category';
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
    
    function get_all_except($id){
        return $this->where('prnt',0)->where('id','!=',$id)->orderBy('name','asc')->get();
    }
    
    function get_sub($id){
        return $this->where('prnt',$id)->orderBy('name','asc')->get();
    }
    
    function add($input){
        $this->prnt = $input['prnt'];
        $this->name = $input['category'];
        $this->save();
    }
    
    function edit($id){
        return $this->where('id',$id)->get();
    }
    
    function simpan($input){
        $category   = self::find($input['id']);
        $category->prnt = $input['prnt'];
        $category->name = $input['category'];
        $category->update();
    }
    
    function hapus($input){
        $this->whereIn('id',$input)->delete();
    }
}
