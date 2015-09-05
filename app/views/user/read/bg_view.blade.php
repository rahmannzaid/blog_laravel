@extends('user.template.tp_content')
@section('content')
    
    <pre>
        <code >
            $(document).ready(function() {
                $('pre code').each(function(i, block) {
                  hljs.highlightBlock(block);
                });
              });
        </code>
    </pre>
    <?
    
    foreach($data as $row){
    echo "
    <div class='col-md-8'>
        <div class='blog-item'>
            <img class='img-responsive img-blog' src='".Url()."/assets/img/article/".$row->picture."' width='100%' alt='".$row->title."' />
            <div class='row'>  
                <div class='col-xs-12 col-sm-2 text-center'>
                    <div class='entry-meta'>
                        <span id='publish_date'>".date('d M', strtotime($row->created_at))."</span>
                        <span><i class='fa fa-user'></i> <a href='#'> ".$row->user."</a></span>
                        <span><i class='fa fa-clock-o'></i> <a href='#'>".date('H:i:s', strtotime($row->created_at))."</a></span>
                        <span><i class='fa fa-eye'></i><a href='#'>".$row->read." View</a></span>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-10 blog-content'>
                    <h2>".$row->title."</h2>
                    <h3>".$row->content."</h3>
                    <div class='post-tags'>
                        <strong>Tag:</strong> ";
                        $exp    = explode(';',$row->tag);
                        $tag    = '';
                        for($i=0; $i < count($exp) ; $i++){
                            $id = DB::table('tb_tag')->where('id','=',$exp[$i])->first();
                            if(count($id) > 0){
                                $tag .= "<a href='".Url()."/tags/".strtolower($id->name)."'>".$id->name."</a> / ";
                            }
                        }
                        echo substr($tag,0,-2)."
                    </div>

                </div>
            </div>
        </div><!--/.blog-item-->
        
        <div class='media reply_section' style='padding-bottom:10px'>
            <div class='pull-left post_reply text-center'>
                <img src='".Url()."/assets/img/profile/thumb/".$row->avatar."' class='img-circle' alt='' />
            </div>
            <div class='media-body post_reply_content'>
                <h3>".$row->name."</h3>
                <p class='lead'>".$row->description."</p>
                
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                <span class='st_email_hcount' displayText='Email'></span>
            </div>
            
        </div> 
        
        
        <h1 id='comments_title'>".count($comment)." Comments</h1>
        <div class='container wow fadeInDown' data-wow-duration='1000ms' data-wow-delay='600ms'>";
        foreach($comment as $item){
            $pic = 'girl.png';
            if($item->gender == 0){
                $pic = 'boy2.png';
            }
            echo "
                <div class='media comment_section'>
                    <div class='pull-left post_comments'>
                        <a href='#'><img src='".Url()."/templates/user/images/blog/$pic' class='img-circle' alt='' /></a>
                    </div>
                    <div class='media-body post_reply_comments'>
                        <h3>".$item->name."</h3>
                        <h4>".Convert_date::english(date('D, d M Y    H:i', strtotime($item->created_at)))."</h4>
                        <p>".$item->message."</p>
                    </div>
                </div> 
            ";
        }
        echo "
        
        <div id='contact-page clearfix'>
            <div class='status alert alert-success' style='display: none'></div>
            <div class='message_heading'>
                <h4>Leave a Replay</h4>
                <p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p>
            </div> 

            <form id='main-contact-form' class='contact-form' name='contact-form' role='form'>
                <div class='row'>
                    <div class='col-sm-5'>
                        <input type='hidden' name='id' value='".base64_encode($row->id)."'/>
                        <div class='form-group'>
                            <label>Name *</label><label class='error' generated='true' for='name'></label>
                            <input type='text' class='form-control' name='name'>
                        </div>
                        <div class='form-group'>
                            <label>Email *</label><label class='error' generated='true' for='email'></label>
                            <input type='email' class='form-control' name='email'>
                        </div>
                        <div class='form-group'>
                            <label>Gender</label><br>
                            <label for='man'><input type='radio' name='gender' value='0' id='man' checked > Male</label> &nbsp;&nbsp;
                            <label for='woman'><input type='radio' class='' name='gender' value='1' id='woman'> Female</label>
                        </div>                    
                    </div>
                    <div class='col-sm-7'>                        
                        <div class='form-group'>
                            <label>Message *</label><label class='error' generated='true' for='message'></label>
                            <textarea name='message' id='message' class='form-control' rows='8'></textarea>
                        </div>                        
                        <div class='form-group'>
                            <button type='button' class='btn btn-primary btn-lg' required='required' onclick=javascript:submit_form('#main-contact-form','/read/send_message')>Submit Message</button>
                        </div>
                    </div>
                </div>
            </form>     
        </div><!--/#contact-page-->
        </div>
    </div><!--/.col-md-8-->";
    }
    
    
    
    ?>
@include('user.template.tp_right')
@stop
