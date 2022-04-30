<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script>
    <?php 
        include_once __DIR__.'/../../js/footer.js';
    ?>
</script>
<style>
    <?php 
        include_once __DIR__.'/../../css/footer.css';
    ?>
</style>
<hr size="3">
<div class="container">
    <div class="row justify-content-center" id="content">
        <div class="col-md-9 text-center">
        <ul class="list-unstyled nav-links mb-5">
            <li><a href="/templates/footer-contents/about.php">About</a></li>|
            <li><a href="javascript:void(0);" onclick="overlay1();">Copyright</a></li>|
            <li><a href="/templates/footer-contents/privacy.php">Privacy</a></li>|
            <li><a href="javascript:void(0);" onclick="overlay2();">Help</a></li>
        </ul>
        <div class="popup" id="popup_copyright" onclick="off()">
            <div class="popup_text">
              <p class="mb-0"><small>Instakilogram &copy; 2022</small><br><span>All rights reserved.</span></p>
            </div>
        </div>
        <div class="popup" id="popup_help" onclick="off()">
            <div class="popup_text">
                <h1 class="helping_text">Instagram is an SNS website that communicates with people by posting pictures.<br> You can use freely after signing up for membership.<br>
                If you have any questions, please email to lgtwins0302@gmail.com.</h1>
            </div>
        </div>
            <div class="copyright">
                <p class="mb-0"><small>&copy; 2022. Instakilogram. All Rights Reserved.</small></p>
            </div>
        </div>
    </div>
</div>