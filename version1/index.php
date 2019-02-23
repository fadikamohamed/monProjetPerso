<?php
require_once 'views/header.php';
?>
<div id="container" class="container">
    <!-- Routeur -->
    <div id="content" class="large-8 medium-8">
        <?php
        require_once 'router.php';
        ?>
    </div>
    <!-- LeftSide -->
    <div id="leftSide">
        <div class="large-12">
            <?php
            require_once 'views/profilConnection.php';
            ?>
        </div>
        <div class="large-12">
            <?php
            require_once 'views/favorites.php';
            ?>
        </div>
    </div>
    <!-- RightSide -->
    <div class="grid-x">
        <div class="large-12">
            <?php
            require_once 'views/lastPost.php';
            ?>
        </div>
        <div class="large-12">
            <?php
            require_once 'views/topPop.php';
            ?>
        </div>
    </div>
</div>
</div>
<?php
require_once 'views/footer.php';
?>
<script src="assets/frameworks/foundation/js/vendor/jquery.js"></script>
<script src="assets/frameworks/foundation/js/vendor/what-input.js"></script>
<script src="assets/frameworks/foundation/js/vendor/foundation.min.js"></script>
<script src="assets/js/scriptProfil.js"></script>
<script src="assets/js/folderSystem.js"></script>
<script src="assets/js/scriptTeam.js"></script>
<script src="assets/js/scriptManga.js"></script>
<script src="assets/js/scriptCommentManga.js"></script>
</body>
</html>