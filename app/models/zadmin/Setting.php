<? class Setting extends Eloquent{
    protected $primaryKey = 'id';
    protected $table = 'tb_config';
    private $paging = 1;
    private $id = 1;
    
    function get_data(){
        return self::find($this->id);
    }
    
    function edit(){
        return $this->where('id',$this->id)->get();
    }
    
    function simpan($input){
        $Setting            = self::find($this->id);
        $Setting->domain    = $input['domain'];
        $Setting->sitename  = $input['sitename'];
        $Setting->title     = $input['title'];
        $Setting->slogan    = $input['slogan'];
        
        $Setting->phone1    = $input['phone'];
        $Setting->facebook  = $input['facebook'];
        $Setting->twitter   = $input['twitter'];
        $Setting->linkedin  = $input['linkedin'];
        $Setting->skype     = $input['skype'];
        
        
        $Setting->description= $input['description'];
        $Setting->author    = $input['author'];
        $Setting->keyword   = $input['keyword'];
        $Setting->update();
    }
    
    function image($input){
        $Setting            = self::find($this->id);
        
        $dir = base_path().'/assets/img/other';
        $icon= Input::file('icon');
        $logo= Input::file('logo');
        $new_icon='';
        $new_logo='';
        $get    = $this->edit();
        foreach($get as $row){
            $old_icon= $row->img_icon;
            $old_logo= $row->img_logo;
        }
        if($icon != ''){
            $new_icon   = 'Icon_'.date('Ymd_His').'_'.str_random(10).'.'.$icon->getClientOriginalExtension();
            $upl        = $icon->move($dir,$new_icon);
            if($upl){
                $path= $dir.'/';
                $img = Image::make($path.$new_icon);
                $img->resize(16, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($path.'thumb/'.$new_icon);
                
                File::delete(base_path().'/assets/img/other/'.$old_icon);
                File::delete(base_path().'/assets/img/other/thumb/'.$old_icon);
                $Setting->img_icon      = $new_icon;
            }
        }
        
        if($input['remove_icon'] == 'remove'){
            $Setting->img_icon      = '';
            File::delete(base_path().'/assets/img/other/'.$old_icon);
            File::delete(base_path().'/assets/img/other/thumb/'.$old_icon);
        }
        
        if($logo != ''){
            $new_logo   = 'Icon_'.date('Ymd_His').'_'.str_random(10).'.'.$logo->getClientOriginalExtension();
            $upl        = $logo->move($dir,$new_logo);
            if($upl){
                $path= $dir.'/';
                $img = Image::make($path.$new_logo);
                $img->resize(115, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($path.'thumb/'.$new_logo);
                
                File::delete(base_path().'/assets/img/other/'.$old_logo);
                File::delete(base_path().'/assets/img/other/thumb/'.$old_logo);
                $Setting->img_logo      = $new_logo;
            }
        }
        
        if($input['remove_logo'] == 'remove'){
            $Setting->img_logo      = '';
            File::delete(base_path().'/assets/img/other/'.$old_logo);
            File::delete(base_path().'/assets/img/other/thumb/'.$old_logo);
        }
        
        $Setting->update();
    }
}
