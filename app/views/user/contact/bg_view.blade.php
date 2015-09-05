@extends('user.template.tp_content')
@section('content')
    
    <section id='contact-info'>
        <div class='center'>                
            <h2>How to Reach Us?</h2>
            <p class='lead'>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>
        <div class='gmap-area'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-5 text-center'>
                        <div class='gmap'>
                            <iframe frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.co.id/maps/@-7.7906573,110.8791344,14z?hl=id'></iframe>
                        </div>
                    </div>

                    <div class='col-sm-7 map-content'>
                        <ul class='row'>
                            <li class='col-sm-6'>
                                <address>
                                    <h5>Head Office</h5>
                                    <p>Dukuh 3/6, Gemantar<br>
                                    Selogiri, Wonogiri, 57652</p>
                                    <p>Phone: 085728434446 <br>
                                    Email Address:rahmannzaid@gmail.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id='contact-page'>
        <div class='container'>
            <div class='center'>        
                <h2>Drop Your Message</h2>
                <p class='lead'>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> 
            <div class='row contact-wrap'> 
                <div class='status alert alert-success' style='display: none'></div>
                <form id='main-contact-form' class='contact-form' name='contact-form' method='post' action='sendemail.php'>
                    <div class='col-sm-5 col-sm-offset-1'>
                        <div class='form-group'>
                            <label>Name *</label>
                            <input type='text' name='name' class='form-control' required='required'>
                        </div>
                        <div class='form-group'>
                            <label>Email *</label>
                            <input type='email' name='email' class='form-control' required='required'>
                        </div>
                        <div class='form-group'>
                            <label>Phone</label>
                            <input type='number' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Company Name</label>
                            <input type='text' class='form-control'>
                        </div>                        
                    </div>
                    <div class='col-sm-5'>
                        <div class='form-group'>
                            <label>Subject *</label>
                            <input type='text' name='subject' class='form-control' required='required'>
                        </div>
                        <div class='form-group'>
                            <label>Message *</label>
                            <textarea name='message' id='message' required='required' class='form-control' rows='8'></textarea>
                        </div>                        
                        <div class='form-group'>
                            <button type='submit' name='submit' class='btn btn-primary btn-lg' required='required'>Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
@stop
