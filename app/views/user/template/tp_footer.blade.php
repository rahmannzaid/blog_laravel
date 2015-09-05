<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="{{ URL::asset('templates/user/js/jquery.js') }}"></script>
<script src="{{ URL::asset('templates/user/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('templates/user/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ URL::asset('templates/user/js/jquery.isotope.min.js') }}"></script>
<script src="{{ URL::asset('templates/user/js/main.js') }}"></script>
<script src="{{ URL::asset('templates/user/js/wow.min.js') }}"></script>
<script>var base_url = '<?= Url(); ?>'</script>
<script src="{{ URL::asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('assets/js/additional-methods.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/user.js') }}"></script>

<script src="{{ URL::asset('assets/js/ambiance/jquery.ambiance.js') }}"></script>
<link href="{{ URL::asset('assets/js/ambiance/jquery.ambiance.css') }}" rel="stylesheet">

<link href="{{ URL::asset('assets/js/highlight/styles/xcode.css') }}" rel="stylesheet">
<script src="{{ URL::asset('assets/js/highlight/highlight.pack.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>
<?
if(Request::segment(1) == 'read'){
    echo "
        <script type='text/javascript'>var switchTo5x=true;</script>
        <script type='text/javascript' src='http://w.sharethis.com/button/buttons.js'></script>
        <script type='text/javascript'>stLight.options({publisher: '1c39a06d-e0f9-4fe3-aa0c-30cba5ed3d2c', doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    ";
}
?>

