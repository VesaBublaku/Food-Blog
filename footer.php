<style>
    .footer {
        background-color: #a4ac86;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-right: 70px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .footer-1 {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }


    .info {
        display: flex;
        flex-wrap: wrap;
    }

    .info li {
        color: white;
        margin: 0 20px;
        font-size: 16px;
        padding: 5px;
    }

    .socialmedia {
        display: flex;
        flex-wrap: wrap;
        padding-top: 20px;
        padding-left: 70px;
        gap: 20px;
    }

    .footer-2 {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: space-evenly;
        margin-top: 10px;
        color: white;
        height: 300px;
    }

    #n1,
    #n2,
    #n3,
    #n4 {
        height: auto;
        padding: 13px 20px;
        box-sizing: border-box;
        width: 100%;
        max-width: 300px;
        background-color: #a4ac86;
        border-color: #636b54;
        color: white;
        font-size: 14px;
    }

    #n4 {
        background-color: #636b54;
    }
</style>


<div class="footer">

    <div class="footer-1">
        <div class="info">
            <div>
                <ul type="none">
                    <a href="">
                        <li>
                            <h4>Company</h4>
                        </li>
                    </a>
                    <a href="">
                        <li>Contact</li>
                    </a>
                    <a href="">
                        <li>Partner With Us</li>
                    </a>
                    <a href="">
                        <li>Press</li>
                    </a>
                </ul>
            </div>

            <div>
                <ul type="none">
                    <a href="">
                        <li>
                            <h4>Explore</h4>
                        </li>
                    </a>
                    <a href="/recipe/list.php">
                        <li>Recipes</li>
                    </a>
                    <a href="/shop/index.php">
                        <li>Shop</li>
                    </a>
                    <a href="/cookbook/index.php">
                        <li>Cookbooks</li>
                    </a>
                </ul>
            </div>

            <div>
                <ul type="none">
                    <a href="#">
                        <li>
                            <h4>Cookbook</h4>
                        </li>
                    </a>
                    <a href="/cookbook/index.php#cookbook-1">
                        <li>The First Mess Cookbook</li>
                    </a>
                    <a href="/cookbook/index.php#cookbook-2">
                        <li>WELL+GOOD</li>
                    </a>
                    <a href="/cookbook/index.php#cookbook-3">
                        <li>Zaika</li>
                    </a>
                    <a href="/cookbook/index.php#cookbook-4">
                        <li>Living Bread</li>
                    </a>
                </ul>
            </div>
        </div>

        <div class="socialmedia">
            <a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-twitter" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-brands fa-tiktok" style="color: #ffffff;"></i></a>

        </div>
    </div>

    <div class="footer-2">

        <h4>Sign up</h4>
        <select name="" id="n1">
            <option value="">Daily Recipe Updates</option>
            <option value="">Weekly Recipe Digest</option>
            <option value="">Weekly Meal Plan</option>
            <option value="">About Me</option>
            <option value="">Special Announcements</option>
        </select>
        <input id="n2" type="text" placeholder="First Name" required>
        <input id="n3" type="email" placeholder="Email Address" required>
        <a href="#footer2">
            <button id="n4">Subscribe</button>
        </a>
    </div>
</div>