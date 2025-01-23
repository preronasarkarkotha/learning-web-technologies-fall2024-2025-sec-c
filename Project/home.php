<?php
include 'header.php';
?>

        <!----========= END OF NAV ========-->
        
        <section class="search__bar">
    <form class="container search__bar-container" action="eventguide.php" method="GET">
        <div>
            <i class="fas fa-search"></i>
            <input type="search" name="query" placeholder="Search" required>
        </div>
        <button type="submit" class="btn">GO</button>
    </form>
</section>
        <section class="featured">
            <div class="container featured__container">
                <div class="post__thumbnail">
                    <img src="./images/unnamed.jpg">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Event Catagory</a>
                    <h2 class="post__title"><a href="post.html">Post the photo and event</a></h2>
                    <p class="post__body">Write Something Bout the blog </p>
                    <div class="post__author">
                        
                        
                    </div>
                </div>
            </div>
        </section>
<!----========= END OF FEATURE ========-->
        <section class="posts">
            <div class="container posts__container">
                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/logo 2.jpg">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Personal Event</a>
                        <h3 class="post__title">
                            <a href="posts.php">Make your cherished moments even more special. Turn your occasions into memories etched in the heart forever.</a>

                        </h3>
                       
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/cultural4.jpg">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Cultural Event</a>
                        <h3 class="post__title">
                            <a href="posts.php">From soulful concerts to vibrant performances and inspiring exhibitions, we bring your events to life.</a>

                        </h3>
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/alumni.webp">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Alumni Meets</a>
                        <h3 class="post__title">
                            <a href="post.html">Rekindle old memories with your friends through our seamless arrangements.</a>

                        </h3>
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/festivals.jpg">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Festivals Event</a>
                        <h3 class="post__title">
                            <a href="post.html">Pohela Boishakh, Durga Puja, Eid, and Social Awareness events—celebrate traditions and causes with us in unforgettable ways.</a>

                        </h3>
                        
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/Social.webp">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Social Awareness Event</a>
                        <h3 class="post__title">
                            <a href="post.html">Charity drives, health camps, and environmental campaigns—join us in creating awareness and making a difference in unforgettable ways.</a>

                        </h3>
                        
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/sports.jpg">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Sports Event</a>
                        <h3 class="post__title">
                            <a href="post.html">Tournaments, marathons, and sports fests—experience the thrill and spirit of sportsmanship with us.</a>

                        </h3>
                        
                    </div>
                </article>

                <article class="posts">
                    <div class="post__thumbnail">
                        <img src="./images/photography.jpg">

                    </div>
                    <div class="post__info">
                        <a href="" class="category__button">Photography Exhibitions</a>
                        <h3 class="post__title">
                            <a href="post.html">Discover creativity through captivating frames at our photography exhibition—where every picture tells a story.</a>

                        </h3>
                       
                    </div>
                </article>
            </div>
        </section>
        <!----========= END OF POSTS ========-->
        <section class="category__buttons">
            <div class="container category__buttons-container">
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
                <a href="" class="category__button">Category</a>
            </div>
        </section>
        <!----========= END OF CATEGORY ========-->
        <?php
        include 'footer.php';
        ?>