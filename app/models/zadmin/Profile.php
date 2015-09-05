<? class Profile extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'users';
    private $paging = 1;
    
    function password($input){
        $profile   = self::find(Session::get('blog.id'));
        $profile->password = Hash::make($input['new_pass']);
        $profile->update();
    }
    
    function get_data(){
        return self::find(Session::get('blog.id'));
    }
    
    function filter($filter){
        return $this->where('name','like','%'.$filter.'%')->paginate($this->paging);
    }
    
    function edit($id){
        return $this->where('id',$id)->get();
    }
    
    function simpan($input){
        $profile            = self::find(Session::get('blog.id'));
        
        $dir = base_path().'/assets/img/profile';
        $foto= Input::file('picture');
        $new_name='';
        $get    = $this->edit(Session::get('blog.id'));
        foreach($get as $row){
            $old= $row->avatar;
        }
        if($foto != ''){
            $new_name = 'Avatar_'.date('Ymd').'_'.str_replace(' ','_',substr($input['name'],0,10)).'_'.str_random(10).'.'.$foto->getClientOriginalExtension();
            $upl = $foto->move($dir,$new_name);
            if($upl){
                $path= $dir.'/';
                $img = Image::make($path.$new_name);
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($path.'thumb/'.$new_name);
                
                File::delete(base_path().'/assets/img/profile/'.$old);
                File::delete(base_path().'/assets/img/profile/thumb/'.$old);
                $profile->avatar      = $new_name;
            }
        }
        
        if($input['remove_picture'] == 'remove'){
            $profile->avatar      = '';
            File::delete(base_path().'/assets/img/profile/'.$old);
            File::delete(base_path().'/assets/img/profile/thumb/'.$old);
        }
        
        $profile->name      = $input['name'];
        $profile->address   = $input['address'];
        $profile->description= $input['description'];
        $profile->phone     = $input['phone'];
        $profile->whatsapp  = $input['whatsapp'];
        $profile->bbm       = $input['bbm'];
        $profile->facebook  = $input['facebook'];
        $profile->twitter   = $input['twitter'];
        $profile->update();
    }
    
    function hapus($input){
        $this->whereIn('id',$input)->delete();
    }
}
