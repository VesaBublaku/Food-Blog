<style>
    .nav {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: black;
    }

    #searchInput {
        padding: 10px;
        font-size: 15px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        border: 1px solid #ddd;
        border-radius: 4px;
        flex: 1;
        display: none;
    }


    .list {
        display: flex;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        font-size: 18px;
    }

    .list li {
        margin: 0 20px;
    }

    .list li:not(:last-child)::after {
        content: "|";
        margin-left: 30px;
    }

    .logo {
        font-size: 30px;
        color: #636b54;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<div class="nav">
    <div class="logo">Bite by Bite</div>
    <ul class="list" type="none">
        <li><a href="/index.php">Home</a></li>
        <li><a href="/recipe/list.php">Recipes</a></li>
        <li><a href="/shop/index.php">Shop</a></li>
        <li><a href="/cookbook/index.php">Cookbooks</a></li>
        <?php if (isset($_SESSION['user'])): ?>
            <li><a href="/box/index.php">My Recipe Box</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
            <li><a href="/admin/index.php">Admin</a></li>
        <?php endif; ?>
    </ul>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Enter your search term" />
        <div class="searchIcon" id="searchIcon">
            <i class="fas fa-search"></i>
        </div>
    </div>
</div>

<!--<script>-->
<!--    {-->
<!--        window.location.href = `/search/index.php?q=texti_ne_input`;-->
<!--    }-->
<!--</script>-->