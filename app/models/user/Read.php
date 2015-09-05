<? class Read extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_article';
    private $paging = 2;
    
    function get_article(){
        return DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'b.name as category', 'b.id as cat', 'a.*')
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->paginate($this->paging);
    }
    
    function get_data($mode,$date=null,$id=null){
        if($mode == 'all'){
            $data = DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'c.avatar','c.name', 'c.description', 'b.name as category', 'a.*')
            ->where('a.id','=',$id)
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->get();
        }elseif($mode == 'cat'){
            $data = DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'c.avatar','c.name', 'c.description', 'b.name as category', 'b.id as cat', 'a.*')
            ->where('a.created_at','like',$date.'%')
            ->where('a.category_id','=',$id)
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->paginate($this->paging);
        }elseif($mode == 'date'){
            $data = DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'c.avatar','c.name', 'c.description', 'b.name as category', 'b.id as cat', 'a.*')
            ->where('a.created_at','like',$date.'%')
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->paginate($this->paging);
        }
        return $data;
    }
    
    function get_comment($id){
        $data = DB::table('tb_messages')
            ->where('status','=',1)
            ->where('article_id','=',$id)
            ->orderBy('id','asc')
            ->get();
            
        return $data;
    }
    
    function get_category($name){
         return DB::table('tb_article as a')
             ->join('tb_category as b', 'a.category_id','=','b.id')
             ->join('users as c', 'a.user_id', '=','c.id')
             ->select('c.username as user', 'b.name as category', 'b.id as cat', 'a.*')
             ->where('b.name','=',$name)
             ->where('status','=',1)
             ->orderBy('id','desc')
             ->paginate($this->paging);
         
    }
     
    function get_tags($name){
        $tag = DB::table('tb_tag')->where('name','=',$name)->first();
        $data = array();
        if(count($tag) > 0){
            $data = DB::table('tb_article as a')
                ->join('tb_category as b', 'a.category_id','=','b.id')
                ->join('users as c', 'a.user_id', '=','c.id')
                ->select('c.username as user', 'b.name as category', 'b.id as cat', 'a.*')
                
                ->where(function ($query) use ($tag) {
                    $query->Where('a.tag','=',$tag->id)
                    ->orWhere('a.tag','like',$tag->id.';%')
                    ->orWhere('a.tag','like','%;'.$tag->id)
                    ->orWhere('a.tag','like','%;'.$tag->id.';%');
                })
                ->where('status','=',1)
                ->orderBy('id','desc')
                ->paginate($this->paging);
         
        }
        return $data;
    }
     
    function add_view($id){
         $article = DB::table('tb_article')->where('id', $id)->first();
         if(count($article) >0){
              $count = $article->read + 1;
              DB::table('tb_article')->where('id', $id)->update(array('read' => $count));
              echo 'sukses';
         }
    }
     
    function get_search($search){
        return DB::table('tb_article as a')
            ->join('tb_category as b', 'a.category_id','=','b.id')
            ->join('users as c', 'a.user_id', '=','c.id')
            ->select('c.username as user', 'b.name as category', 'b.id as cat', 'a.*')
			->whereRaw("MATCH(title,content) AGAINST(? IN BOOLEAN MODE)", array($search))
			->where('status','=',1)
            ->paginate($this->paging);
    }
    
    function message($input){
        $save = DB::table('tb_messages')->insert(
            array(
                'article_id'    => base64_decode($input['id']),
                'message'       => $input['message'],
                'name'          => $input['name'],
                'email'         => $input['email'],
                'gender'        => $input['gender'],
            )
        );
        if($save){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}
