<? class Article extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_article';
    private $paging = 10;
    
   function get_data(){
        return DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'b.name as category', 'a.*')
            ->orderBy('id','desc')
            ->paginate($this->paging);
    }
    
    function filter($filter){
        return DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'b.name as category', 'a.*')
            ->where('title','like','%'.$filter.'%')
            ->orderBy('id','desc')
            ->paginate($this->paging);
    }
    
    function get_all(){
        return $this->where('prnt',0)->orderBy('name','asc')->get();
    }
    
    function get_all_except($id){
        return $this->where('prnt',0)->where('id','!=',$id)->orderBy('name','asc')->get();
    }
    
    function add($input){
        $dir = base_path().'/assets/img/article';
        $foto= Input::file('picture');
        $new_name = 'Article_'.date('Ymd').'_'.str_replace(' ','_',substr($input['title'],0,10)).'_'.str_random(10).'.'.$foto->getClientOriginalExtension();
        $upl = $foto->move($dir,$new_name);
        if($upl){
            $path= $dir.'/';
            $img = Image::make($path.$new_name);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path.'thumb/'.$new_name);
            
            $tags=array();
            if(isset($input['tags'])){
                $tags = $input['tags'];
            }
            
            $this->category_id  = $input['category'];
            $this->user_id      = Session::get('blog.id');
            $this->tag          = implode(';',$tags);
            $this->title        = $input['title'];
            $this->content      = $input['content'];
            $this->picture      = $new_name;
            $save = $this->save();
        }else{
            
        }
    }
    
    function string_change($dest,$to,$text){
        $input = str_replace($dest,$to,$text);
        return $input;
    }
    
    function string_cut($text,$long=15){
        $input = substr($text,0,$long);
        return $input;
    }
    
    
    
    function edit($id){
        return $this->where('id',$id)->get();
    }
    
    function simpan($input){
        $dir = base_path().'/assets/img/article';
        $foto= Input::file('picture_edit');
        $new_name='';
        $article               = self::find($input['id']);
        if($foto != ''){
            $new_name = 'Article_'.date('Ymd').'_'.str_replace(' ','_',substr($input['title_edit'],0,10)).'_'.str_random(10).'.'.$foto->getClientOriginalExtension();
            $upl = $foto->move($dir,$new_name);
            if($upl){
                $path= $dir.'/';
                $img = Image::make($path.$new_name);
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($path.'thumb/'.$new_name);
                $id     = $input['id'];
                $get    = $this->edit($id);
                foreach($get as $row){
                    $old= $row->picture;
                }
                File::delete(base_path().'/assets/img/article/'.$old);
                File::delete(base_path().'/assets/img/article/thumb/'.$old);
                $article->picture      = $new_name;
            }
        }
        
        if($input['remove_picture_edit'] == 'remove'){
            $article->picture      = '';
            File::delete(base_path().'/assets/img/article/'.$old);
            File::delete(base_path().'/assets/img/article/thumb/'.$old);
        }
        $tags=array();
        if(isset($input['tags'])){
            $tags = $input['tags'];
        }
        
        $article->category_id  = $input['category_edit'];
        $article->tag          = implode(';',$tags);
        $article->title        = $input['title_edit'];
        $article->content      = $input['content_edit'];
        $save = $article->update();
        
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
