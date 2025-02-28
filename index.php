<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Landing Page</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">Built on dreams, driven by excellence</h1>
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">300+</div>
                    <div class="stat-text">Happy Customers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5+</div>
                    <div class="stat-text">Properties for clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">6+</div>
                    <div class="stat-text">Years of Experience</div>
                </div>
            </div>
        </section>

        <script>
        document.querySelectorAll('.value-card, .achievement-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>

        <section class="section values-section">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create value.</p>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">⭐</div>
                    <h3 class="value-title">Trust</h3>
                    <p class="value-description">Trust is the foundation of every successful real estate transaction.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🏆</div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">We set the bar high for ourselves, from the properties we list to the services we provide.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">👥</div>
                    <h3 class="value-title">Client-Centric</h3>
                    <p class="value-description">Your dreams and needs are at the center of our universe. We listen, understand.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3 class="value-title">Commitment</h3>
                    <p class="value-description">We are dedicated to providing you with the highest level of service, professionalism, and support.</p>
                </div>
            </div>
        </section>

        <section class="section achievements-section">
            <h2 class="section-title">Our Achievements</h2>
            <p class="section-subtitle">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.</p>
            <div class="achievements-grid">
                <div class="achievement-card">
                    <h3 class="achievement-title">3+ Years of Excellence</h3>
                    <p class="achievement-description">With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.</p>
                </div>
                <div class="achievement-card">
                    <h3 class="achievement-title">Happy Clients</h3>
                    <p class="achievement-description">Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.</p>
                </div>
                <div class="achievement-card">
                    <h3 class="achievement-title">Industry Recognition</h3>
                    <p class="achievement-description">We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.</p>
                </div>
            </div>
        </section>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll('.value-card, .achievement-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
                card.style.boxShadow = '0px 10px 15px rgba(255, 215, 0, 0.3)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = 'none';
            });
        });

        // Scroll Animation
    //     const sections = document.querySelectorAll('.values-section, .achievements-section');

    //     const observer = new IntersectionObserver((entries) => {
    //         entries.forEach(entry => {
    //             if (entry.isIntersecting) {
    //                 entry.target.style.opacity = "1";
    //                 entry.target.style.transform = "translateY(0)";
    //             }
    //         });
    //     }, { threshold: 0.2 });

    //     sections.forEach(section => {
    //         section.style.opacity = "0";
    //         section.style.transform = "translateY(50px)";
    //         section.style.transition = "all 0.6s ease-out";
    //         observer.observe(section);
    //     });
    // });

    </script>

    <section id="about">
        
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="image-grid">
                <div class="image-item">
                    <img src="../assets/images/about1.jpg" alt="Aerial view of a modern building">
                </div>
                <div class="image-item large">
                    <img src="../assets/images/about2.jpg" alt="Tall contemporary building">
                </div>
                <div class="image-item">
                    <img src="../assets/images/about3.jpg" alt="Detailed architectural design">
                </div>
            </div>
            <div class="about-content">
                <h2>About Us</h2>
                <div class="about-text">
                    <p>Welcome to Sri Samhitha Enterprises, where innovation meets excellence in real estate development and many other requirements. We are dedicated to crafting premium residential and commercial spaces that redefine luxury and comfort. With a focus on quality, transparency, and customer satisfaction, we aim to provide world-class living environments.
                        Our mission is to create thoughtfully designed real estate projects that offer both aesthetic appeal and functional value. We are committed to delivering top-tier infrastructure and modern amenities to enhance our customers’ lifestyles.
                        Our vision is to set new benchmarks in the real estate industry by integrating cutting-edge technology and sustainable building practices. We strive to build vibrant communities that stand the test of time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const imageItems = document.querySelectorAll(".image-item img");

        // Hover effect for desktops
        imageItems.forEach((img) => {
            img.addEventListener("mouseenter", () => {
                img.style.transform = "scale(1.05)";
            });

            img.addEventListener("mouseleave", () => {
                img.style.transform = "scale(1)";
            });
        });

        // Click effect for mobile users (optional)
        imageItems.forEach((img) => {
            img.addEventListener("click", () => {
                img.style.transform = "scale(1.05)";
                setTimeout(() => img.style.transform = "scale(1)", 300);
            });
        });
    });

    </script>


        <div class="container">
            <div class="header">
                <h1>Meet the Team</h1>
                <p>At Sri Samhitha, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.</p>
            </div>

            <div class="team-grid">
                <div class="team-member">
                    <img src="../assets/images/team1.jpg" alt="Max Mitchell - Founder">
                    <div class="member-info">
                        <h3>Max Mitchell</h3>
                        <p>Founder</p>
                    </div>
                </div>

                <div class="team-member">
                    <img src="../assets/images/team2.jpg" alt="Sarah Johnson - Chief Real Estate Officer">
                    <div class="member-info">
                        <h3>Sarah Johnson</h3>
                        <p>Chief Real Estate Officer</p>
                    </div>
                </div>

                <div class="team-member">
                    <img src="../assets/images/team3.jpg" alt="David Brown - Head of Property Management">
                    <div class="member-info">
                        <h3>David Brown</h3>
                        <p>Head of Property Management</p>
                    </div>
                </div>

                <div class="team-member">
                    <img src="../assets/images/team4.jpg" alt="Michael Turner - Legal Counsel">
                    <div class="member-info">
                        <h3>Michael Turner</h3>
                        <p>Legal Counsel</p>
                    </div>
                </div>
            </div>
        </div>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
            const teamMembers = document.querySelectorAll(".team-member");

            // Hover effect for desktop
            teamMembers.forEach(member => {
                member.addEventListener("mouseenter", () => {
                    member.style.transform = "translateY(-5px)";
                });

                member.addEventListener("mouseleave", () => {
                    member.style.transform = "translateY(0)";
                });
            });

            // Tap effect for mobile users
            teamMembers.forEach(member => {
                member.addEventListener("touchstart", () => {
                    member.style.transform = "translateY(-5px)";
                });

                member.addEventListener("touchend", () => {
                    setTimeout(() => {
                        member.style.transform = "translateY(0)";
                    }, 300);
                });
            });
        });

    </script>

    <section class="hero1">
        <div class="hero-container">
            <div class="content">
                <h1>Start your real estate journey today</h1>
                <div class="text-button-wrapper">
                    <p>Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Explore our properties or get in touch for personalized assistance.</p>
                    <a href="project.php" class="explore-btn" id="exploreBtn">Explore Properties</a>
                    <script>
                        document.getElementById("exploreBtn").addEventListener("click", function () {
                            window.location.href = "project.php";
                        });
                    </script>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('exploreBtn').addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
            top: window.innerHeight - 50, // Adjusted to avoid exact viewport edge
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', function () {
        const hero = document.querySelector('.hero1');
        const scrolled = window.pageYOffset;

        // Only apply background movement on larger screens (disable for mobile)
        if (window.innerWidth > 768) {
            hero.style.backgroundPositionY = scrolled * 0.5 + 'px';
        } else {
            hero.style.backgroundPositionY = 'center';
        }
    });

    </script>

<?php include 'includes/footer.php'; ?>

    
</body>
</html>