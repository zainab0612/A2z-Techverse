<?php
include('./src/header.php');
include('./src/navbar.php');
?>
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url(../library/assets/img/hero-carousel/1.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">We got you</h2>
                            <p class="animate__animated animate__fadeInUp">We are always happy to help.</p>
                            <a href="register.php" class="btn-get-started scrollto animate__animated animate__fadeInUp">Signup</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url(../library/assets/img/hero-carousel/2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Professional Environment</h2>
                            <p class="animate__animated animate__fadeInUp">We tries to keep the thing professional, to prevent time wastage .</p>
                            <a href="register.php" class="btn-get-started scrollto animate__animated animate__fadeInUp">Signup</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url(../library/assets/img/hero-carousel/3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">As simple as it gets</h2>
                            <p class="animate__animated animate__fadeInUp">We tried to keep thing as simple as possible.</p>
                            <a href="register.php" class="btn-get-started scrollto animate__animated animate__fadeInUp">Signup</a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <section id="featured-services">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 box">
                    <i class="bi bi-briefcase"></i>
                    <h4 class="title"><a href="">Easier</a></h4>
                    <p class="description">A2z Techverse makes it easier to connect customers to developers and developers to customer as easily as possible</p>
                </div>

                <div class="col-lg-4 box bg-danger">
                    <i class="bi bi-card-checklist text-white"></i>
                    <h4 class="title"><a href="">Better</a></h4>
                    <p class="description">A2z Techverse makes communication better and more comfortable between clients and developers</p>
                </div>

                <div class="col-lg-4 box">
                    <i class="bi bi-binoculars"></i>
                    <h4 class="title"><a href="">Professional</a></h4>
                    <p class="description">A2z Techverse makes working on projects feels like professional atmosphere with easier and comfortable to use UI</p>
                </div>

            </div>
        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>About Us</h3>
            </header>

            <div class="row about-cols">

                <div class="col-sm-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-col">
                        <div class="img">
                            <img src="../library/assets/img/about-mission.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Mission</a></h2>
                        <p>
                            To create a platform that connects businesses and individuals with talented and skilled freelancers from around the world. Our mission is to empower freelancers to showcase their abilities and find meaningful work opportunities while providing businesses with easy access to top-quality talent. We are committed to creating a secure and transparent platform that fosters trust and promotes long-term relationships between freelancers and clients.
                        </p>
                    </div>
                </div>

                <div class="col-sm-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-col">
                        <div class="img">
                            <img src="../library/assets/img/about-plan.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Plan</a></h2>
                        <p>
                            Develop a user-friendly platform with project management tools and messaging features.
                            Attract and retain top talent by offering training, access to high-quality projects, and a collaborative community.
                            Develop strategies for attracting clients to the platform, such as partnerships with businesses and marketing campaigns.
                            Implement security measures to ensure the platform is secure and prevent fraud.
                            Provide excellent customer support to ensure a positive experience for users.
                        </p>
                    </div>
                </div>

                <div class="col-sm-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-col">
                        <div class="img">
                            <img src="../library/assets/img/about-vision.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Vision</a></h2>
                        <p>
                            To be the premier global platform for freelancers and businesses to connect, collaborate, and succeed. Our vision is to create a world where talented freelancers have the freedom to work on projects that inspire them and businesses can easily access the right talent for their needs. We aspire to be the go-to destination for clients and freelancers who value quality, transparency, and professionalism in their work. We are committed to empowering freelancers and businesses to reach their full potential and create a positive impact on the world.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Our Skills</h3>
                <p>Thing we are proud of doing and are continuously working hard to improving it to the Perfection!!</p>
            </header>

            <div class="skills-content">

                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Web Development <i class="val">100%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Mobile Development <i class="val">90%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Graphics Designing <i class="val">80%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Animation<i class="val">70%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Digital Marketing<i class="val">60%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Logo Design<i class="val">55%</i></span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">Language Translation <i class="val">50%</i></span>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Facts</h3>
            </header>

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="421" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1364" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Hours Of Support</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="38" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Hard Workers</p>
                </div>

            </div>

            <!-- <div class="facts-img">
                <img src="../library/assets/img/facts-img.png" alt="" class="img-fluid">
            </div> -->

        </div>
    </section><!-- End Facts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3 class="section-title">Our Portfolio</h3>
            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100"">
      <div class=" col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Development</li>
                    <li data-filter=".filter-card">Media</li>
                    <li data-filter=".filter-web">Designing</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/app1.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>App Development</h4>
                        <p>App Development</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/card1.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Photography</h4>
                        <p>Photography</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/web3.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Web Development</h4>
                        <p>Web Development</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/web1.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>SEO</h4>
                        <p>SEO</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/card2.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Graphics Designing</h4>
                        <p>Graphics Designing</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/web2.jpg" class="img-fluid" alt="">
                    </figure>
                    <div class="portfolio-info">
                        <h4>Software Development</h4>
                        <p>Software Development</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/web3.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Digital Marketing</h4>
                        <p>Digital Marketing</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/portfolio/design.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Logo Design</h4>
                        <p>Logo Design</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="../library/assets/img/animation.jpg" class="img-fluid" alt="">
                    </figure>

                    <div class="portfolio-info">
                        <h4>Animations</h4>
                        <p>Animations</p>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients">
        <div class="container" data-aos="zoom-in">

            <header class="section-header">
                <h3>Our Clients</h3>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="../library/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="section-bg">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Testimonials</h3>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="../library/assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <img src="../library/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                I've been using this freelancing website for months now, and it has completely transformed my career! The platform is user-friendly, the clients are reputable, and the payment system is efficient. I highly recommend it to any freelancer looking for quality gigs and a supportive community.
                                <img src="../library/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="../library/assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <img src="../library/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                This freelancing website has been a game-changer for my career! The platform's user-friendly interface, diverse range of projects, and secure payment system have allowed me to easily connect with clients and showcase my skills. Highly recommended for freelancers looking to grow their business!
                                <img src="../library/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="../library/assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <img src="../library/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                I couldn't be happier with this freelancing website! It has provided me with a steady stream of high-quality projects and clients, helping me establish a thriving freelance business. The support team is responsive and professional, ensuring a smooth and enjoyable experience. A fantastic platform for freelancers seeking success and flexibility!
                                <img src="../library/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="../library/assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <img src="../library/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                I highly recommend this freelancing website to any freelancer out there. It offers a wide range of job opportunities across various industries, allowing me to find projects that match my expertise and interests. The payment system is secure, and I've never faced any issues receiving my earnings. It has truly been a game-changer for my freelance career!
                                <img src="../library/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="../library/assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <img src="../library/assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                I absolutely love this freelancing website! It has provided me with a platform to connect with clients from around the world and showcase my skills. The interface is user-friendly, and the support team is always responsive and helpful. Thanks to this platform, I've been able to grow my freelance business and increase my earnings.
                                <img src="../library/assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Team</h3>
                <p>The dream team that made this possible</p>
            </div>

            <div class="row">

                <div class="col-lg-6 col-md-6 bg-white">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <img src="../library/assets/img/ayesha.jpeg" class="img-fluid border border-5 border-dark rounded-circle" style="width:330px" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Ayesha Shafi </h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 bg-white">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <img src="../library/assets/img/zainab.png" class="img-fluid border border-5 border-dark rounded-circle" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Zainab Naeem</h4>
                                <span>Project Manager</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h3>Contact Us</h3>
            </div>

            <div class="row contact-info">

                <div class="col-sm-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <address>A22 Shams Street, Karachi, Pakistan</address>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="contact-phone">
                        <i class="bi bi-phone"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+92 333 1234567</a></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="contact-email">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">a2ztechverse@gmail.com</a></p>
                    </div>
                </div>

            </div>

            <form action="../database/comments.php" method="post" role="form">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="text" name="name" class="form-control form-control-lg mb-3" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control form-control-lg mb-3" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg mb-3" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg mb-3" onkeypress="return /[0-9a-zA-Z ,'-.:/?!$@()]/i.test(event.key)" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center"><input type="submit" class="btn btn-danger" value='Send Message' /></div>
            </form>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php
include('./src/footer.php')
?>